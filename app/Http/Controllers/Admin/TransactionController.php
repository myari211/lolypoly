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

class TransactionController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';

        return view('admin.transaction.index', $this->data);
    }

    

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $check = Transaction::find($request->id);

            $data = array(
                "transaction_code" => $request->transaction_code,
                "user_id" => $request->user_id,
                "customer_address_id" => $request->customer_address_id,
                "payment_method_id" => $request->payment_method_id,
                "shipping_method_id" => $request->shipping_method_id,
                "payment_link" => $request->address,
                'status' => 1,
                'row_status' => 1,
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
            );
            if($check){
                $result = Transaction::where('id',$request->id)
                ->update($data);
                $message = 'Successfully Updated Data';
            } else {
                $result = Transaction::create($data);
                $message = 'Successfully Saved Data';
            }
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
            $data = Transaction::where('id',$id)
            ->first();
            $res = array(
                'id' => $data->id,
                "transaction_code" => $data->transaction_code,
                "customer_address_id" => $data->customer_address_id,
                "payment_link" => $data->payment_link,
                "total" => $data->total,
            );
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
        return view('admin.transaction.view', $this->data);
    }

    public function getAll(Request $request)
    {
        $data = Transaction::with('customer','statusTransaction')
        ->orderBy('updated_at','DESC')
        ->get();
        return DataTables::of($data)
        ->addIndexColumn()
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
            $url_view = route('transaction.view',$data->id);
            $url_edit = route('transaction.edit',$id_encode);
            $url_delete = route('transaction.destroy',$id_encode);
            $action = '<ul class="list-inline">';
            $action .= '<li class="list-inline-item"><a style="color:#4287f5" href="'.$url_view.'" data-id="'.$data->id.'"><i class="fa-solid fa-eye"></i></a></li>';
            $action .= '<li class="list-inline-item"><div class="edit-button" data-url="'.$url_edit.'" data-id="'.$id_encode.'"><i class="fa-solid fa-pen-to-square"></i></div></li>';
            $action .= '<li class="list-inline-item"><div class="delete-button" data-url="'.$url_delete.'" data-id="'.$id_encode.'"><i class="fa-solid fa-trash"></i></div></li>';
            $action .= '</ul>';
            
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
