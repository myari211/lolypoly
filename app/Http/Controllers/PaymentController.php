<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Helpers\GeneralFunction;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Promo;
use App\Models\CustomerPromo;
use App\Models\CartDelivery;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = $request->user_id;
            $shipping_method_id = $request->shipping_method;
            $carts = Cart::with('user', 'product', 'productType', 'productVariant')->orderBy('created_at','DESC')->where('user_id',$user_id)->get();
            $user = User::where('id',$user_id)->first();
            $promo = Promo::where('id',$request->promo_id)->first();
            $transaction_code = GeneralFunction::sessionCode('TRX_');
            $cart_delivery = CartDelivery::where('id', $shipping_method_id)->first();
            $data_transaction = [
                'transaction_code' => $transaction_code,
                'user_id' => $user_id,
                'customer_address_id' => $request->customer_address_id,
                'payment_method_id' => null,
                'shipping_method_id' => $shipping_method_id,
                'store_pickup_id' => $request->store_id,
                'status' => 1,
                'row_status' => 1,
            ];
            if(isset($cart_delivery)){
                $data_transaction['shipping_method_id'] = 'delivery';
                $data_transaction['shipping_name'] = $cart_delivery->courier_name;
                $data_transaction['shipping_code'] = $cart_delivery->courier_code;
                $data_transaction['shipping_service_name'] = $cart_delivery->courier_service_name;
                $data_transaction['shipping_service_code'] = $cart_delivery->courier_service_code;
                $data_transaction['shipping_duration'] = $cart_delivery->duration;
                $data_transaction['shipping_price'] = $cart_delivery->price;
            } else {
                $data_transaction['shipping_method_id'] = $shipping_method_id;
            }
            $transaction = Transaction::create($data_transaction);
            $transaction_id = $transaction->id;
            $transaction_created_at = $transaction->created_at;

            $item_details = [];
            $data_transaction_detail = [];
            $gross_amount = 0;
            foreach($carts as $cart){
                $price = (int)$cart->price;
                $stock = (int)$cart->stock;
                $weight = (int)$cart->product_weight;
                
                $data_transaction_detail = [
                    'transaction_id' => $transaction_id,
                    'product_id' => $cart->product->id,
                    'product_type_id' => isset($cart->productType) ? $cart->productType->id : null,
                    'product_variant_id' => isset($cart->productVariant) ? $cart->productVariant->id : null,
                    'stock' => $stock,
                    'weight' => $weight,
                    'price' => $price,
                ];
                $transaction_detail = TransactionDetail::create($data_transaction_detail);
                GeneralFunction::stockMinus($transaction_detail->id);

                $item = [
                    "id" => $cart->product_cart_id,
                    "name" => trim(substr($cart->product_name,0,40)," "),
                    "price" => $price,
                    "quantity" => $stock,
                    "brand" => "LolyPoly",
                    "category" => "Phone",
                    "merchant_name" => "LolyPoly"
                ];
                $gross_amount += $price * $stock;
                array_push($item_details, $item);
            }
            $customer_details = [
                "first_name" => $user->name,
                "last_name" => $user->name,
                "email" => $user->email,
                "phone" => $user->phone_number,
                "notes" => "Thank you for your purchase. Please follow the instructions to pay."
            ];
            $sub_total = $gross_amount;
            if($promo){
                $promo_id = $promo->id;
                if($promo->discount_type == 'P'){
                    $disc_val = ($promo->discount_value / 100) * $gross_amount;
                    $fix_disc = ((int)$disc_val <= (int)$promo->max_discount) ? $disc_val : $promo->max_discount;
                    $gross_amount = $gross_amount - (int)$fix_disc;
                } else{
                    $fix_disc = $promo->discount_value;
                    $gross_amount = $gross_amount - (int)$promo->discount_value;
                }
                $item = [
                    "id" => $promo_id,
                    "name" => trim(substr($promo->title,0,40)," "),
                    "price" => -(int)$fix_disc,
                    "quantity" => 1,
                    "brand" => "LolyPoly",
                    "category" => "Discount",
                    "merchant_name" => "LolyPoly"
                ];
                array_push($item_details, $item);
            } else {
                $fix_disc = 0;
            }

            if(isset($cart_delivery)){
                $item = [
                    "id" => $cart_delivery->id,
                    "name" => trim(substr($cart_delivery->courier_name,0,40)," "),
                    "price" => (int)$cart_delivery->price,
                    "quantity" => 1,
                    "brand" => "LolyPoly",
                    "category" => "Shipping",
                    "merchant_name" => "LolyPoly"
                ];
                array_push($item_details, $item);
                $sub_total = $sub_total + (int)$cart_delivery->price;
                $gross_amount = $gross_amount + (int)$cart_delivery->price;
            }
            $transaction_details = [
                "order_id" => $transaction_code,
                "gross_amount" => $gross_amount,
                "payment_link_id" => $transaction_id
            ];
            $data_cust_promo = [
                'customer_id' => $user_id,
                'promo_id' => $request->promo_id,
            ];
            $cust_promo = CustomerPromo::create($data_cust_promo);
            Transaction::where('id', $transaction_id)->update(['promo_id' => $request->promo_id,'sub_total' => $sub_total,'discount' => $fix_disc,'total' => $gross_amount]);
            try {
                $client = new Client();
            
                // Mengirim permintaan GET ke URL tertentu

                $headers = [
                    'Authorization' => 'Basic '.GeneralFunction::generalParameterValue('midtrans_auth_token'),
                    'Content-Type' => 'application/json',
                ];
                $body = [
                    'transaction_details' => $transaction_details,
                    "customer_required" => true,
                    "credit_card" => [
                        "secure" => true,
                        "bank" => "bca",
                        "installment" => [
                            "required" => false,
                            "terms" => [
                            "bni" => [3, 6, 12],
                            "mandiri" => [3, 6, 12],
                            "cimb" => [3],
                            "bca" => [3, 6, 12],
                            "offline" => [6, 12]
                            ]
                        ]
                    ],
                    "usage_limit" => 10,
                    "expiry" => [
                        "start_time" => $transaction_created_at.' +0700',
                        "duration" => 1,
                        "unit" => "days"
                    ],
                    "enabled_payments" => [
                        "credit_card",
                        "bca_va",
                        "bni_va",
                        "bri_va",
                        "gopay",
                        "echannel",
                        "permata_va",
                        "indomaret"
                    ],
                    "item_details" => $item_details,
                    "customer_details" => $customer_details,
                ];
                // dd($body);
                $options = [
                    'verify' => false,
                    'headers' => $headers,
                    'json' => $body,
                ];
                
                $midtrans_url = GeneralFunction::generalParameterValue('midtrans_url');
                $response = $client->request('POST', $midtrans_url.'/v1/payment-links', $options);
                // Mendapatkan kode status HTTP
                $statusCode = $response->getStatusCode();
            
                // Mendapatkan body response dalam bentuk string
                $body = json_decode($response->getBody()->getContents());
                Transaction::where('id', $transaction_id)->update(['payment_link' => $body->payment_url]);
                Cart::where('user_id',$user_id)->delete();
                CartDelivery::where('user_id',$user_id)->delete();
                DB::commit();
                return redirect($body->payment_url);
            
                // Lakukan pemrosesan lanjutan terhadap response
                // ...
            
            } catch (RequestException $e) {
                // Menangani kesalahan permintaan HTTP
                if ($e->hasResponse()) {
                    // Jika ada respons dari server, dapatkan respons tersebut
                    $response = $e->getResponse();
                    $statusCode = $response->getStatusCode();
                    $body = $response->getBody()->getContents();
                } else {
                    // Jika tidak ada respons dari server, tangani kesalahan lainnya
                    $statusCode = 500;
                    $body = 'Terjadi kesalahan dalam melakukan permintaan.';
                }
                Transaction::where('id', $transaction_id)->delete();
                if(isset($cust_promo)){
                    CustomerPromo::where('id', $cust_promo->id)->delete();
                }
                DB::rollback();
            } catch (\Exception $e) {
                // Menangani kesalahan umum
                $statusCode = 500;
                $body = 'Terjadi kesalahan dalam melakukan permintaan: ' . $e->getMessage();
                $response = $e->getMessage();

                // Lakukan penanganan kesalahan sesuai kebutuhan
                // ...
                Transaction::where('id', $transaction_id)->delete();
                if(isset($cust_promo)){
                    CustomerPromo::where('id', $cust_promo->id)->delete();
                }
                DB::rollback();
            }
        } catch (\Exception $e) {
            $statusCode = 500;
            $body = 'Terjadi kesalahan dalam melakukan permintaan: ' . $e->getMessage();
            $response = $e->getMessage();
            Transaction::where('id', $transaction_id)->delete();
            if(isset($cust_promo)){
                CustomerPromo::where('id', $cust_promo->id)->delete();
            }
            DB::rollback();
        }
        dd($body);
    }

    public function emailPayment(Request $request)
    {
        try {
            $user = Session::get('user');
            $check = User::where('id',$user->id)->first();

            $this->data['data_user'] = User::where('id',$user->id)->first();
            $this->data['data_transaction_detail'] = TransactionDetail::get();
            $data_transaction = Transaction::where('user_id', $user->id)
            ->whereDate('created_at', now()->toDateString())
            // ->whereBetween('created_at', [now()->subMinutes(5), now()])
            ->first();
            $detail_transactions = TransactionDetail::where('transaction_id', $data_transaction->id)->get();
            $data_products = [];
            foreach ($detail_transactions as $detail_transaction) {
                $product = Product::where('id', $detail_transaction->product_id)->first();
                $data_products[] = $product;
            }
            $this->data['data_product'] = $data_products;

            $formattedCreatedAt = $data_transaction->created_at->format('M d, Y \a\t h:i A');
            $transactioncode = $data_transaction->transaction_code;
            $this->data['formatted_created_at'] = $formattedCreatedAt;
            $this->data['transaction_code'] = $transactioncode;


            $totalPrice = $this->data['data_transaction_detail']->where('transaction_id', $data_transaction->id)->sum('price');
            $formattedPrice = number_format($totalPrice, 0, '.', ',');

            // Add the calculated price to the data array
            $this->data['formatted_price'] = $formattedPrice;


            Mail::send('emailpayment', $this->data, function($message) use ($check) {
                $message->to($check->email, $check->name)
                    ->subject('Payment Confirmation');
            });

            $message = 'Successfully Send Email';
            return response()->json(['code' => 200, 'message' => $message], 200);       
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);        
        }
    }
    
    public function paymentStatus()
    {
        $transaction = Transaction::where('status', 1)->get();
        
        $res = array();
        foreach ($transaction as $key => $value) {
            $startDate = $value->created_at;
            $endDate = date('Y-m-d H:i:s');
            $startDateTimestamp = strtotime($startDate);
            $endDateTimestamp = strtotime($endDate);
            $timeDiffInSeconds = $endDateTimestamp - $startDateTimestamp;
            $daysPassed = floor($timeDiffInSeconds / (60 * 60 * 24));

            if($daysPassed > 0){
                Transaction::where('transaction_code', $value->transaction_code)->update(['status' => 8]);
            } else {
                array_push($res,self::getStatus($value->transaction_code));
            }
        }

        return response()->json(['code' => 200, 'message' => "OK!", 'redirectTo' => '', 'data' => $res ], 200);
    }

    public function paymentStatusUpdate()
    {
        $transaction = Transaction::where('status', 2)->whereNotNull('midtrans_order_id')->whereNull('payment_method_name')->get();
        $res = array();
        foreach ($transaction as $key => $value) {
            array_push($res,self::getStatusMidtrans($value->midtrans_order_id));
        }

        return response()->json(['code' => 200, 'message' => "OK!", 'redirectTo' => '', 'data' => $res ], 200);
    }

    public function getStatus($order_id){
        try {
            $client = new Client();
        
            // Mengirim permintaan GET ke URL tertentu
            $headers = [
                'Authorization' => 'Basic '.GeneralFunction::generalParameterValue('midtrans_auth_token'),
                'Content-Type' => 'application/json',
            ];
            $options = [
                'verify' => false,
                'headers' => $headers,
            ];
            $midtrans_url = GeneralFunction::generalParameterValue('midtrans_url');
            $url = $midtrans_url.'/v1/payment-links/'.$order_id;
            $response = $client->request('GET', $url, $options);
            // Mendapatkan kode status HTTP
            $statusCode = $response->getStatusCode();
        
            // Mendapatkan body response dalam bentuk string
            $body = json_decode($response->getBody()->getContents());
            if($body->purchases != []){
                $data_purchases = $body->purchases[0];
                if(strtolower($data_purchases->payment_status) == "expire"){
                    self::getStatusMidtrans($data_purchases->order_id);
                    Transaction::where('transaction_code', $order_id)->update(['status' => 8 ,'midtrans_order_id' => $data_purchases->order_id  ,'payment_method_id' => $data_purchases->payment_method]);
                } elseif (strtolower($data_purchases->payment_status) == "settlement") {
                    self::getStatusMidtrans($data_purchases->order_id);
                    Transaction::where('transaction_code', $order_id)->update(['status' => 2 ,'midtrans_order_id' => $data_purchases->order_id  ,'verification_at' => date('Y-m-d H:i:s'),'payment_method_id' => $data_purchases->payment_method, 'payment_method_name' => $data_purchases->acquirer]);
                } elseif (strtolower($data_purchases->payment_status) == "capture") {
                    self::getStatusMidtrans($data_purchases->order_id);
                    Transaction::where('transaction_code', $order_id)->update(['status' => 2 ,'midtrans_order_id' => $data_purchases->order_id  ,'verification_at' => date('Y-m-d H:i:s'),'payment_method_id' => $data_purchases->payment_method, 'payment_method_name' => $data_purchases->credit_card_bank]);
                } elseif (strtolower($data_purchases->payment_status) == "pending") {
                    self::getStatusMidtrans($data_purchases->order_id);
                    Transaction::where('transaction_code', $order_id)->update(['status' => 1 ,'midtrans_order_id' => $data_purchases->order_id  ,'payment_method_id' => $data_purchases->payment_method, 'payment_method_name' => $data_purchases->acquirer]);
                } elseif (strtolower($data_purchases->payment_status) == "cancel") {
                    self::getStatusMidtrans($data_purchases->order_id);
                    GeneralFunction::stockPlus($order_id);
                    Transaction::where('transaction_code', $order_id)->update(['status' => 8 ,'midtrans_order_id' => $data_purchases->order_id  ,'payment_method_id' => $data_purchases->payment_method]);
                }
                $res = array(
                    'transcation_code' => $order_id,
                    'status' => $data_purchases->payment_status,
                );
            } else {
                $res = array(
                    'transcation_code' => $order_id,
                    'status' => "NOT CHOOSE PURCHASE",
                );
            }
            
            // return redirect($body->payment_url);
        
            // Lakukan pemrosesan lanjutan terhadap response
            // ...
        
        } catch (RequestException $e) {
            // Menangani kesalahan permintaan HTTP
            if ($e->hasResponse()) {
                // Jika ada respons dari server, dapatkan respons tersebut
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                $res = array(
                    'transcation_code' => $order_id,
                    'status' => "ERROR1",
                    'error_message' => $body,
                );
                // dd($body);
            } else {
                // Jika tidak ada respons dari server, tangani kesalahan lainnya
                $statusCode = 500;
                $body = 'Terjadi kesalahan dalam melakukan permintaan.';
                $res = array(
                    'transcation_code' => $order_id,
                    'status' => "ERROR2",
                    'error_message' => $body,
                );
            }

            // echo "TRANSCTION CODE : ".$order_id." (ERROR 1) || ";
        
            // Lakukan penanganan kesalahan sesuai kebutuhan
            // ...
        } catch (\Exception $e) {
            // Menangani kesalahan umum
            $statusCode = 500;
            $body = 'Terjadi kesalahan dalam melakukan permintaan: ' . $e->getMessage();
            $res = array(
                'transcation_code' => $order_id,
                'status' => "ERROR2",
                'error_message' => $body,
            );
            // echo "TRANSCTION CODE : ".$order_id." (ERROR 2) || ";
        
            // Lakukan penanganan kesalahan sesuai kebutuhan
            // ...
        }
        return (object)$res;
    }

    public function getStatusMidtrans($order_id){
        try {
            $client = new Client();
        
            // Mengirim permintaan GET ke URL tertentu
            $headers = [
                'Authorization' => 'Basic '.GeneralFunction::generalParameterValue('midtrans_auth_token'),
                'Content-Type' => 'application/json',
            ];
            $options = [
                'verify' => false,
                'headers' => $headers,
            ];
            $midtrans_url = GeneralFunction::generalParameterValue('midtrans_url');
            $url = $midtrans_url.'/v2/'.$order_id.'/status';
            $response = $client->request('GET', $url, $options);
            // Mendapatkan kode status HTTP
            $statusCode = $response->getStatusCode();
        
            // Mendapatkan body response dalam bentuk string
            $body = json_decode($response->getBody()->getContents());
            if($body->payment_type == 'bank_transfer'){
                Transaction::where('midtrans_order_id', $order_id)->update(['payment_method_name' => $body->va_numbers[0]->bank,'payment_virtual_number' => $body->va_numbers[0]->va_number]);
            } elseif($body->payment_type == 'bank_transfer'){
                Transaction::where('midtrans_order_id', $order_id)->update(['payment_method_name' => $body->acquirer]);
            } elseif($body->payment_type == 'credit_card'){
                Transaction::where('midtrans_order_id', $order_id)->update(['payment_method_name' => $body->bank]);
            } elseif($body->payment_type == 'cstore'){
                Transaction::where('midtrans_order_id', $order_id)->update(['payment_method_name' => $body->store, 'payment_virtual_number' => $body->payment_code]);
            }
            
            $res = array(
                'transcation_code' => $order_id,
                'status' => "OK",
                'error_message' => '',
            );
            // return redirect($body->payment_url);
        
            // Lakukan pemrosesan lanjutan terhadap response
            // ...
        
        } catch (RequestException $e) {
            // Menangani kesalahan permintaan HTTP
            if ($e->hasResponse()) {
                // Jika ada respons dari server, dapatkan respons tersebut
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                $res = array(
                    'transcation_code' => $order_id,
                    'status' => "ERROR1Mid",
                    'error_message' => $body,
                );
                // dd($body);
            } else {
                // Jika tidak ada respons dari server, tangani kesalahan lainnya
                $statusCode = 500;
                $body = 'Terjadi kesalahan dalam melakukan permintaan.';
                $res = array(
                    'transcation_code' => $order_id,
                    'status' => "ERROR2Mid",
                    'error_message' => $body,
                );
            }

            // echo "TRANSCTION CODE : ".$order_id." (ERROR 1) || ";
        
            // Lakukan penanganan kesalahan sesuai kebutuhan
            // ...
        } catch (\Exception $e) {
            // Menangani kesalahan umum
            $statusCode = 500;
            $body = 'Terjadi kesalahan dalam melakukan permintaan: ' . $e->getMessage();
            $res = array(
                'transcation_code' => $order_id,
                'status' => "ERROR2Mid",
                'error_message' => $body,
            );
            // echo "TRANSCTION CODE : ".$order_id." (ERROR 2) || ";
        
            // Lakukan penanganan kesalahan sesuai kebutuhan
            // ...
        }
        // dd($res);
        return (object)$res;
    }
}
