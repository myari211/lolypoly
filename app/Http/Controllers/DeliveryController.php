<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralFunction;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\KelurahanDesa;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductType;
use App\Models\Provinsi;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CustomerAddress;
use App\Models\CartDelivery;
use App\Models\Transaction;
use App\Models\Store;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;

use Session;

class DeliveryController extends Controller
{
    public function delivery ($address_id)
    {
        $user_id = GeneralFunction::myId();
        $now = date('Y-m-d H:i:s');
        $address = CustomerAddress::where('id', $address_id)->where('user_id', $user_id)->first();
        if(!$address){
            return response()->json(['code' => 404, 'message' => 'Address Not Found, Please Choose Correct Address!',  'redirectTo' => '', 'data' => []], 200);
        }
        $origin_postal_code = GeneralFunction::generalParameterValue('address_kodepos') ? GeneralFunction::generalParameterValue('address_kodepos') : '14450';
        $destination_postal_code = $address->kode_pos;
        $biteship_couriers = GeneralFunction::generalParameterValue('biteship_couriers');
        $biteship_token = GeneralFunction::generalParameterValue('biteship_token');

        $carts = Cart::with('user', 'product', 'productType', 'productVariant')->orderBy('created_at','DESC')->where('user_id',$user_id)->get();
        $item_details = array();
        foreach($carts as $cart){
            $price = (int)$cart->price;
            $stock = (int)$cart->stock;
            $weight = (int)$cart->stock * (int)$cart->product_weight;

            $item = [
                "name" => trim(substr($cart->product_name,0,40)," "),
                "value" => $cart->sub_total,
                "weight" => $weight,
                "quantity" => $stock,
            ];
            array_push($item_details, $item);
        }
        try {
            $client = new Client();
        
            // Mengirim permintaan GET ke URL tertentu

            $headers = [
                'Authorization' => 'Bearer '.$biteship_token,
                'Content-Type' => 'application/json',
            ];
            $body = [
                'origin_postal_code' => $origin_postal_code,
                'destination_postal_code' => $destination_postal_code,
                'couriers' => $biteship_couriers,
                "items" => $item_details
            ];
            // dd($body);
            $options = [
                'verify' => false,
                'headers' => $headers,
                'json' => $body,
            ];
            // dd($options);
            $api_url = GeneralFunction::generalParameterValue('biteship_url');
            $check_delivery = CartDelivery::where('user_id', $user_id)
                                ->where('origin_postalcode', $origin_postal_code)
                                ->where('destination_postalcode', $destination_postal_code)
                                ->get();
            if(count($check_delivery) <= 0){
                $response = $client->request('POST', $api_url.'/v1/rates/couriers', $options);
                $statusCode = $response->getStatusCode();
                $body = json_decode($response->getBody()->getContents());
            
                // $body = GeneralFunction::biteshipStatic();
                
                $res_delivery = array(
                    'success' => $body->success,
                    'code' => $body->code,
                    'object' => $body->object,
                    'message' => $body->message,
                );
                if($body->code == '20001003'){
                    $arr_pricing = array();
                    foreach ($body->pricing as $pricing) {
                        $data_pricing = [
                            "user_id" => $user_id,
                            "origin_postalcode" => $origin_postal_code,
                            "destination_postalcode" => $destination_postal_code,
                            "courier_name" => $pricing->courier_name,
                            "courier_code" => $pricing->courier_code,
                            "courier_service_name" => $pricing->courier_service_name,
                            "courier_service_code" => $pricing->courier_service_code,
                            "duration" => $pricing->duration,
                            "price" => $pricing->price,
                        ];
                        $res_cartDelivery = CartDelivery::create($data_pricing);
                        $data_pricing['id'] = $res_cartDelivery->id;
                        array_push($arr_pricing,(object)$data_pricing);
                    }
                    $res_delivery['pricing'] = $arr_pricing;
                }
            } else {
                $res_delivery = array(
                    "success"=> true,
                    "object"=> "courier_pricing",
                    "message"=> "Success to retrieve courier pricing",
                    "code"=> 20001003,
                    'pricing' => $check_delivery,
                );
            }
            $res = (object)$res_delivery;
            return response()->json(['code' => 200, 'message' => 'OK!',  'redirectTo' => '', 'data' => $res], 200);
        
        } catch (RequestException $e) {
            // Menangani kesalahan permintaan HTTP
            if ($e->hasResponse()) {
                // Jika ada respons dari server, dapatkan respons tersebut
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                return response()->json(['code' => 500, 'message' => 'Wops, Something went wrong!', 'error_message' => $body,  'redirectTo' => '', 'data' => []], 200);
                // dd($body);
            } else {
                // Jika tidak ada respons dari server, tangani kesalahan lainnya
                $statusCode = 500;
                $body = 'Terjadi kesalahan dalam melakukan permintaan.';
                return response()->json(['code' => 500, 'message' => 'Wops, Something went wrong!', 'error_message' => $body,  'redirectTo' => '', 'data' => []], 200);
            }
        
            // Lakukan penanganan kesalahan sesuai kebutuhan
            // ...
        } catch (\Exception $e) {
            // Menangani kesalahan umum
            $statusCode = 500;
            $body = 'Terjadi kesalahan dalam melakukan permintaan: ' . $e->getMessage();
            $response = $e->getMessage();
            return response()->json(['code' => 500, 'message' => 'Wops, Something went wrong!', 'error_message' => $body,  'redirectTo' => '', 'data' => []], 200);
            // Lakukan penanganan kesalahan sesuai kebutuhan
            // ...
        }
    }
    
    public function calculate(Request $request)
    {
        try {
            $user_id = GeneralFunction::myId();
            $now = date('Y-m-d H:i:s');
            $promo_id = $request->promo_id;
            $cart_delivery_id = $request->cart_delivery_id;
            $promo = Promo::select('10_promo.*', 'cp.id as customer_promo_id')
                    ->leftJoin('10_customer_promo as cp', 'cp.promo_id', '=', '10_promo.id')
                    ->where('10_promo.id',$promo_id)
                    ->where(function($q) use ($user_id) {
                        $q->where('cp.customer_id', '!=',$user_id)
                        ->orwhereNull('cp.id');
                    })
                    ->where([
                        ['10_promo.start_date','<=',$now],
                        ['10_promo.end_date','>=',$now]
                    ])
                    ->first();
            $res = GeneralFunction::getCart();
            $res->promo_id = $promo_id;
            $res->cart_delivery_id = $cart_delivery_id;
            $res->discount = 'Rp ' . GeneralFunction::convertToCurrency("0");
            $res->discount_num = 0;
            $res->pass_promo = 1;
            $res->pass_delivery = 1;

            $cart_delivery = CartDelivery::where('id', $cart_delivery_id)->first();
            if(!$cart_delivery && isset($cart_delivery_id)){
                $res->pass_delivery = 0;
            }

            if(isset($cart_delivery_id) && $res->pass_delivery == 1){
                $res->delivery = 'Rp ' . GeneralFunction::convertToCurrency($cart_delivery->price);
                $res->delivery_num = $cart_delivery->price;
            } else {
                $res->delivery = 'Rp ' . GeneralFunction::convertToCurrency("0");
                $res->delivery_num = "0";
            }

            if(!$promo && isset($promo_id)){
                $res->pass_promo = 0;
            }
            if($res->pass_promo == 1 && isset($promo_id)){
                if($promo->discount_type == 'P'){
                    $disc_val = ($promo->discount_value / 100) * $res->total_num;
                    $fix_disc = ((int)$disc_val <= (int)$promo->max_discount) ? $disc_val : $promo->max_discount;
                    $res->discount = 'Rp ' . GeneralFunction::convertToCurrency($fix_disc);
                    $res->discount_num = $fix_disc;

                    $res->total_num = $res->total_num - (int)$fix_disc + (int)$res->delivery_num;
                    $res->total = 'Rp ' . GeneralFunction::convertToCurrency($res->total_num);
                } else{
                    $res->discount = 'Rp ' . GeneralFunction::convertToCurrency($promo->discount_value);
                    $res->discount_num = $promo->discount_value;

                    $res->total_num = $res->total_num - (int)$res->discount_num + (int)$res->delivery_num;
                    $res->total = 'Rp ' . GeneralFunction::convertToCurrency($res->total_num);
                }
            } else {
                $res->discount = 'Rp ' . GeneralFunction::convertToCurrency("0");
                $res->discount_num = "0";
                $res->total_num = $res->total_num - (int)$res->discount_num + (int)$res->delivery_num;
                $res->total = 'Rp ' . GeneralFunction::convertToCurrency($res->total_num);
            }

            if($res->pass_promo == 0){
                return response()->json(['code' => 500, 'message' => 'Promo Sudah Tidak Berlaku Atau Sudah Anda Pakai!', 'redirectTo' => 'reload', 'data' => $res], 200);
            }
            if($res->pass_delivery == 0){
                return response()->json(['code' => 500, 'message' => 'Pengiriman Yang Anda Pilih Tidak Ditemukan, Silahkan Pilih Pengiriman Lainnya!', 'redirectTo' => 'reload', 'data' => $res], 200);
            }

            return response()->json(['code' => 200, 'message' => 'OK!',  'redirectTo' => '', 'data' => $res], 200);
        } catch (Exception $e) {
            $res = GeneralFunction::getCart();
            $res->discount = 'Rp ' . GeneralFunction::convertToCurrency("0");
            $res->discount_num = 0;
            $res->delivery = 'Rp ' . GeneralFunction::convertToCurrency("0");
            $res->delivery_num = 0;
            $res->pass_promo = 0;
            $res->pass_delivery = 0;
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage(), 'data' => $res], 200);
        }
    }
    
    
    public function checkOrder ()
    {
        $transaction = Transaction::whereIn('status', ['4', '5'])
                                    ->whereNotNull('shipping_order_id')
                                    ->get();
        $res = array();
        foreach ($transaction as $key => $value) {
            $shipping_order_id = $value->shipping_order_id;
            array_push($res,self::BiteShipCheckOrder($shipping_order_id));
        }
        return response()->json(['code' => 200, 'message' => "OK!", 'redirectTo' => '', 'data' => $res ], 200);
        
    }

    public function BiteShipCheckOrder($order_id){
        try {
            $check = Transaction::where('shipping_order_id', $order_id)->first();
            $client = new Client();
        
            // Mengirim permintaan GET ke URL tertentu
            $biteship_token = GeneralFunction::generalParameterValue('biteship_token');
            $headers = [
                'Authorization' => 'Bearer '.$biteship_token,
                'Content-Type' => 'application/json',
            ];
            $options = [
                'verify' => false,
                'headers' => $headers,
            ];
            // dd($options);
            $api_url = GeneralFunction::generalParameterValue('biteship_url');
            
            $url = $api_url.'/v1/orders/'.$order_id;
            $response = $client->request('GET', $url, $options);
            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody()->getContents());
            if($body->success){
                $shipping_tracking_id = $body->courier->tracking_id;
                $shipping_resi = $body->courier->waybill_id;
                $data_update = array(
                    'shipping_tracking_id' => $shipping_tracking_id,
                    'shipping_resi' => $shipping_resi
                );
                if(!isset($check->shipping_resi_at) && isset($shipping_resi)){
                    $data_update['shipping_resi_at'] = date('Y-m-d H:i:s');
                }
                if($body->status == 'confirmed' || $body->status == 'allocated' || $body->status == 'pickingUp' || $body->status == 'picking_up' || $body->status == 'picked' || $body->status == 'on_hold' || $body->status == 'dropping_off'|| $body->status == 'droppingOff'){
                    $data_update['status'] = '5';
                    if($body->status == 'pickingUp' || $body->status == 'picking_up'){
                        if(!isset($check->pickup_at)){
                            $data_update['pickup_at'] = date('Y-m-d H:i:s');
                            $data_update['pickup_by'] = "SYSTEM";
                        }
                    }
                } elseif($body->status == 'delivered') {
                    $data_update['status'] = '7';
                    $data_update['finish_at'] = date('Y-m-d H:i:s');
                    $data_update['finish_by'] = "SYSTEM";
                } elseif($body->status == 'returnInTransit' || $body->status == 'returned') {
                    $data_update['status'] = '3';
                } else {
                    $data_update['status'] = '4';
                }
                Transaction::where('shipping_order_id', $order_id)->update($data_update);
                $res = array(
                    'transcation_code' => $order_id,
                    'status' => $body->status,
                    'message' => $body->message,
                );
            } else {
                $res = array(
                    'transcation_code' => $order_id,
                    'status' => $body->message,
                    'status' => $body->message,
                );
            }
        
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
}
