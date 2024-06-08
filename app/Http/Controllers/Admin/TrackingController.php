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

class TrackingController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';

        return view('admin.transaction.tracking.index', $this->data);
    }

    

    public function store(Request $request){
        // dd($request->id);
        DB::beginTransaction();
        try { 
            $check = Transaction::find($request->id);

            $data = array(
                "status" => "7",
                'finish_at' => date('Y-m-d H:i:s'),
                'finish_by' => GeneralFunction::myName(),
                'updated_by' => GeneralFunction::myId(),
            );
            $result = Transaction::where('id',$request->id)->update($data);

            return response()->json(['code' => 200, 'message' => 'Successfully Completed The Order!', 'redirectTo' => 'reload', 'data' => $result ], 200);
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
            $res = GeneralFunction::getTracking($id);
            if(isset($res->status)){
                return response()->json(['code' => 500, 'message' => $res->error_message, 'redirectTo' => 'reload', 'data' => $res ], 200);
            }
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
        return view('admin.transaction.tracking.view', $this->data);
    }

    public function getAll(Request $request)
    {
        $data = Transaction::with('detail','statusTransaction','address')
        ->whereIn('status', array("4","5","6"))
        ->whereNotNull('packing_at')
        ->where('shipping_method_id',"!=",'pckptstr')
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
            $address_detail = $data->address->name .' - '. $data->address->address .', '. ucwords(strtolower($data->address->kelurahanDesa->kelurahan_desa_name)) .', '. ucwords(strtolower($data->address->kecamatan->kecamatan_name)) .', '. ucwords(strtolower($data->address->kabupatenKota->kabupaten_kota_name)) .', '. ucwords(strtolower($data->address->provinsi->provinsi_name)) .', '. $data->address->kode_pos;
            $data->address_detail = $address_detail;
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
        ->editColumn('packing_at', function($data) {
            return date("d-m-Y H:i:s", strtotime($data->packing_at));
        })
        ->editColumn('action', function($data) {
            $id = (object)array(
                'id' => $data->id
            );
            $id_encode = base64_encode(json_encode($id));
            $url_view = route('transaction.tracking.view',$data->id);
            $url_edit = route('transaction.tracking.edit',$id_encode);
            $url_delete = route('transaction.tracking.destroy',$id_encode);
            if($data->status == '6'){
                $url_done = route('transaction.tracking.store');
                $action = '<button type="button" class="btn btn-primary btn-submit-done" data-action="'.$url_done.'" data-id="'.$data->id.'" style="width:100%" >Done</button>';
            } else {
                $action = '<button type="button" class="btn btn-info btn-process" data-url="'.$url_edit.'" data-id="'.$id_encode.'">Tracking</button>';
            }
            
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
