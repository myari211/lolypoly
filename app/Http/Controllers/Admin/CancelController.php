<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\Role;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\User;
use App\Models\Article;
use App\Models\Store;
use App\Helpers\GeneralFunction;
use GuzzleHttp\Client;

class CancelController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';

        return view('admin.transaction.cancel.index', $this->data);
    }

    

    public function store(Request $request){
        // dd($request->id);
        DB::beginTransaction();
        try { 
            $check = Transaction::find($request->id);
            // dd($check);
            $address = $check->address;
            $customer = $check->customer;
            $address_detail = $address->name .' <br> '. $address->address .', '. ucwords(strtolower($address->kelurahanDesa->kelurahan_desa_name)) .', '. ucwords(strtolower($address->kecamatan->kecamatan_name)) .', '. ucwords(strtolower($address->kabupatenKota->kabupaten_kota_name)) .', '. ucwords(strtolower($address->provinsi->provinsi_name)) .', '. $address->kode_pos;
            
                
            $item_details = array();
            foreach($check->detail as $val):
                $stock = (int)$val->stock;
                $weight = (int)$val->stock * (int)$val->weight;
                $price = (int)$val->price * (int)$val->stock;

                $item = [
                    "name" => trim(substr($val->product_name,0,40)," "),
                    "value" => $price,
                    "weight" => $weight,
                    "quantity" => $stock,
                ];
                array_push($item_details, (object)$item);
            endforeach;
            
            
            try {
                $client = new Client();
            
                // Mengirim permintaan GET ke URL tertentu

                $origin_postal_code = GeneralFunction::generalParameterValue('address_kodepos') ? GeneralFunction::generalParameterValue('address_kodepos') : '14450';
                $destination_postal_code = $address->kode_pos;
                $biteship_token = GeneralFunction::generalParameterValue('biteship_token');
                $origin_address = GeneralFunction::generalParameterValue('address');
                $origin_phone = GeneralFunction::generalParameterValue('phone');
                $origin_name = GeneralFunction::generalParameterValue('website_name');
                $delivery_date = date('Y-m-d');
                $delivery_time = date('H:i');

                $headers = [
                    'Authorization' => 'Bearer '.$biteship_token,
                    'Content-Type' => 'application/json',
                ];
                
                $body = [
                    'origin_contact_name' => $origin_name,
                    'origin_contact_phone' => $origin_phone,
                    'origin_address' => $origin_address,
                    'origin_note' => '',
                    'origin_postal_code' => $origin_postal_code, 
                    'destination_contact_name' => $customer->name,
                    'destination_contact_phone' => $customer->phone_number,
                    'destination_address' => $address_detail,
                    'destination_postal_code' => $destination_postal_code, 
                    'destination_note' => '',
                    'courier_company' => $check->shipping_code,
                    'courier_type' => $check->shipping_service_code,
                    'courier_insurance' => 0, 
                    'delivery_type' => 'later',
                    'delivery_date' => $delivery_date,
                    'delivery_time' => $delivery_time,
                    'order_note' => 'Please be carefull',
                    'items' => $item_details,
                ];
                
                $options = [
                    'verify' => false,
                    'headers' => $headers,
                    'json' => $body,
                ];
                
                $api_url = GeneralFunction::generalParameterValue('biteship_url');
                $response = $client->request('POST', $api_url.'/v1/orders', $options);
                $statusCode = $response->getStatusCode();
                $body = json_decode($response->getBody()->getContents());
                
                if($body->status){
                    $data = array(
                        "status" => "4",
                        'waiting_pickup_at' => date('Y-m-d H:i:s'),
                        'shipping_order_id' => $body->id,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => GeneralFunction::myId(),
                    );
                    $result = Transaction::where('id',$request->id)->update($data);
                    $body->message = 'Shipping Has Been Created!';
                }

                $res_delivery = array(
                    'success' => $body->success,
                    'code' => isset($body->code) ? $body->code : '',
                    'object' => $body->object,
                    'message' => $body->message,
                );

                $res = (object)$res_delivery;
                return response()->json(['code' => 200, 'message' => $res->message, 'redirectTo' => 'reload', 'data' => $result ], 200);
            
            } catch (RequestException $e) {
                // Menangani kesalahan permintaan HTTP
                if ($e->hasResponse()) {
                    // Jika ada respons dari server, dapatkan respons tersebut
                    $response = $e->getResponse();
                    $statusCode = $response->getStatusCode();
                    $body = $response->getBody()->getContents();
                    return response()->json(['code' => 500, 'message' => 'Wops, Something went wrong!!!', 'error_message' => $body,  'redirectTo' => '', 'data' => []], 200);
                    // dd($body);
                } else {
                    // Jika tidak ada respons dari server, tangani kesalahan lainnya
                    $statusCode = 500;
                    $body = 'Terjadi kesalahan dalam melakukan permintaan.';
                    return response()->json(['code' => 500, 'message' => 'Wops, Something went wrong!!', 'error_message' => $body,  'redirectTo' => '', 'data' => []], 200);
                }
            
                // Lakukan penanganan kesalahan sesuai kebutuhan
                // ...
            } catch (\Exception $e) {
                // Menangani kesalahan umum
                $statusCode = 500;
                $body = 'Terjadi kesalahan dalam melakukan permintaan: ' . $e->getMessage();
                $response = $e->getMessage();
                return response()->json(['code' => 500, 'message' => 'Wops, Something went wrong!!!!', 'error_message' => $body,  'redirectTo' => '', 'data' => []], 200);
                // Lakukan penanganan kesalahan sesuai kebutuhan
                // ...
            }
            $message = 'Successfully Update Status To Process';
            DB::commit();
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => 'reload', 'data' => $result ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function edit($id_encode)
    {
        try {        
            $id = json_decode(base64_decode($id_encode));
            $id = $id->id;
            $data = Transaction::with('detail','statusTransaction','address')
                    ->where('row_status','1')
                    ->where('id',$id)
                    ->first();
            $arr_detail = array();
            foreach($data->detail as $val):
                $detail = array(
                    'product_image' => $val->product_image,
                    'product_name' => $val->product_name,
                    'product_price' => $val->product_price,
                    'stock' => $val->stock,
                );
                array_push($arr_detail, (object)$detail);
            endforeach;
            $data->detail_product = $arr_detail;
            if ($data->address) {
                $address_detail = $data->address->name .' <br> '. $data->address->address .', '. ucwords(strtolower($data->address->kelurahanDesa->kelurahan_desa_name)) .', '. ucwords(strtolower($data->address->kecamatan->kecamatan_name)) .', '. ucwords(strtolower($data->address->kabupatenKota->kabupaten_kota_name)) .', '. ucwords(strtolower($data->address->provinsi->provinsi_name)) .', '. $data->address->kode_pos;
            } else {
                $address_detail = "";
            }
            $data->address_detail = $address_detail;
            
            $shipping_detail = $data->shipping_name .' ('. $data->shipping_service_name .') <br>'. $data->shipping_duration;
            $data->shipping_detail = $shipping_detail;

            $payment_detail = $data->payment_method_id .' ('. $data->payment_method_name .')';
            $data->payment_detail = $payment_detail;

            $res = $data;

            return response()->json(['code' => 200, 'message' => 'Successfully', 'redirectTo' => 'reload', 'data' => $res ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function view($id)
    {
        $this->data['data_config'] = '';
        $this->data['data_transaction_detail'] = TransactionDetail::orderBy('updated_at','ASC')->get();
        $this->data['data_image'] = ProductImage::orderBy('updated_at','ASC')->get();
        $data_product = Product::where('row_status','=','1')
        ->get();
        $this->data['data_product'] = $data_product;
        $this->data['data_transaction'] = Transaction::with('detail','statusTransaction','address')->where('row_status','1')->where('id',$id)->first();
        return view('admin.transaction.cancel.view', $this->data);
    }

    public function getAll(Request $request)
    {
        $data = Transaction::with('detail','statusTransaction','address')
        ->whereIn('status', array("8"))
        ->orderBy('packing_at','DESC')
        ->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('total', function($data) {
            return 'Rp ' . GeneralFunction::convertToCurrency($data->total);
        })
        ->editColumn('transaction_code', function($data) {
            return $data->transaction_code;
        })
        ->editColumn('address_detail', function($data) {
            if($data->address){
                $address_detail = $data->address->name .' - '. $data->address->address .', '. ucwords(strtolower($data->address->kelurahanDesa->kelurahan_desa_name)) .', '. ucwords(strtolower($data->address->kecamatan->kecamatan_name)) .', '. ucwords(strtolower($data->address->kabupatenKota->kabupaten_kota_name)) .', '. ucwords(strtolower($data->address->provinsi->provinsi_name)) .', '. $data->address->kode_pos;
                $data->address_detail = $address_detail;
            } else {
                $address_detail = '';
            }
            return $address_detail;
        })
        ->editColumn('shipping_method', function($data) {
            $shipping_method = $data->shipping_name .' ('. $data->shipping_service_name .')';
            return $shipping_method;
        })
        ->editColumn('customer_name', function($data) {
            return ($data->customer) ? $data->customer->name : '-';
        })
        ->editColumn('status_name', function($data) {
            return $data->statusTransaction->title;
        })
        ->editColumn('date', function($data) {
            return date("d-m-Y H:i:s", strtotime($data->created_at));
        })
        ->editColumn('action', function($data) {
            $id = (object)array(
                'id' => $data->id
            );
            $id_encode = base64_encode(json_encode($id));
            $url_view = route('transaction.cancel.view',$data->id);
            $url_edit = route('transaction.cancel.edit',$id_encode);
            $url_delete = route('transaction.cancel.destroy',$id_encode);
            $action = '<button type="button" class="btn btn-primary btn-process" data-url="'.$url_edit.'" data-id="'.$id_encode.'">Detail</button>';
            // $action = '<ul class="list-inline">';
            // // $action .= '<li class="list-inline-item"><a style="color:#4287f5" href="'.$url_view.'" data-id="'.$data->id.'"><i class="fa-solid fa-circle-check"></i></a></li>';
            // $action .= '<li class="list-inline-item"><div class="packing-button" data-url="'.$url_edit.'" data-id="'.$id_encode.'"><i class="fa-solid fa-truck"></i></div></li>';
            // $action .= '<li class="list-inline-item"><a style="color:#22bb33" href="'.$url_view.'" data-id="'.$data->id.'"><i class="fa-solid fa-eye"></i></a></li>';
            // // $action .= '<li class="list-inline-item"><div class="edit-button" data-url="'.$url_edit.'" data-id="'.$id_encode.'"><i class="fa-solid fa-pen-to-square"></i></div></li>';
            // $action .= '<li class="list-inline-item"><div class="delete-button" data-url="'.$url_delete.'" data-id="'.$id_encode.'"><i class="fa-solid fa-trash"></i></div></li>';
            // $action .= '</ul>';
            
            return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function destroy($id_encode)
    {
        DB::beginTransaction();
        try {
            $id = json_decode(base64_decode($id_encode));
            $id = $id->id;
            $result = Store::find($id);
            $result->updatedBy = GeneralFunction::myId();
            $result->delete();

            DB::commit();
            return response()->json(['metaData' => ['code' => 200, 'message' => 'Data Deleted Successfully.'], 'response' => $result], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['metaData' => ['code' => 500, 'message' => $e->getMessage()]], 200);
        }
    }
}
