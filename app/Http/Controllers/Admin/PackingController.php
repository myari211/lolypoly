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

class PackingController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';

        return view('admin.transaction.packing.index', $this->data);
    }

    

    public function store(Request $request){
        // dd($request->id);
        DB::beginTransaction();
        try { 
            $check = Transaction::find($request->id);
            
            $data = array(
                "status" => "3",
                'packing_at' => date('Y-m-d H:i:s'),
                'packing_by' => GeneralFunction::myName(),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => GeneralFunction::myId(),
            );
            $result = Transaction::where('id',$request->id)
            ->update($data);
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
        return view('admin.transaction.packing.view', $this->data);
    }

    public function getAll(Request $request)
    {
        $data = Transaction::with('customer','statusTransaction')
        ->where('status','2')
        ->where('shipping_method_id',"!=",'pckptstr')
        ->orderBy('updated_at','DESC')
        ->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('total', function($data) {
            return 'Rp ' . GeneralFunction::convertToCurrency($data->total);
        })
        ->editColumn('transaction_code', function($data) {
            return $data->transaction_code;
        })
        ->editColumn('payment_method', function($data) {
            $payment_method_name = ($data->payment_method_name) ? ' ('.$data->payment_method_name.')' : '';
            return $data->payment_method_id.' '.$payment_method_name;
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
            $url_view = route('transaction.packing.view',$data->id);
            $url_edit = route('transaction.packing.edit',$id_encode);
            $url_delete = route('transaction.packing.destroy',$id_encode);
            $action = '<button type="button" class="btn btn-primary btn-process" data-url="'.$url_edit.'" data-id="'.$id_encode.'">Process</button>';
            // $action = '<ul class="list-inline">';
            // // $action .= '<li class="list-inline-item"><a style="color:#4287f5" href="'.$url_view.'" data-id="'.$data->id.'"><i class="fa-solid fa-circle-check"></i></a></li>';
            // $action .= '<li class="list-inline-item"><div class="packing-button" data-url="'.$url_edit.'" data-id="'.$id_encode.'"><i class="fa-solid fa-circle-check"></i></div></li>';
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
