<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryBussines;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\KabupatenKota;
use App\Models\Purchase;
use App\Models\StatusPackaging;
use App\Helpers\GeneralFunction;
use DateTime;

class WarehousePurchaseController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_lokasi_gudang'] = KabupatenKota::where('active','1')->orderBy('kabupaten_kota_name','ASC')->get();
        $this->data['data_driver'] = User::where('role_id','cef3c101-47ae-4eef-8e63-64a4a57d390f')->orderBy('name','ASC')->get();

        return view('admin.wh_purchase.index', $this->data);
    }

    

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $path = 'uploads/picture/';
            $file_1 = $request->file_1;
            if (isset($file_1)) {
                $file_name_1 = GeneralFunction::uploadImage($path, $file_1);
            }
            $file_2 = $request->file_2;
            if (isset($file_2)) {
                $file_name_2 = GeneralFunction::uploadImage($path, $file_2);
            }
            $file_3 = $request->file_3;
            if (isset($file_3)) {
                $file_name_3 = GeneralFunction::uploadImage($path, $file_3);
            }
            $data = array(
                "order_code" => GeneralFunction::getOrderCode(),
                "gudang" => $request->gudang,
                "jenis_kemasan" => $request->jenis_kemasan,
                "total_kemasan" => $request->total_kemasan,
                "pic_1" => $file_name_1,
                "pic_2" => $file_name_2,
                "pic_3" => $file_name_3,
                "created_by" => GeneralFunction::myId(),
                "updated_by" => GeneralFunction::myId(),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            );
            $result = Purchase::create($data);
            $message = 'Successfully Created Data';
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
            $data = Transaction::with('customer','category','user_created','gudang','driver','packaging')
                ->where('id',$id)
                ->first();
            $res = array(
                'id' => $data->id,
                'id_pelanggan' => $data->customer->pelanggan_code,
                'order_id' => $data->order_code,
                'category_bussines_id' => $data->kategori_usaha,
                'category_bussines_name' => $data->categoryBussines->title,
                'status_category_id' => $data->status,
                'status_category_name' => $data->status_category->keterangan,
                'nama_usaha' => $data->customer->nama_usaha,
                'nama_pj' => $data->customer->nama_pj,
                'jabatan_pj' => $data->customer->jabatan_pj,
                'phone_number' => $data->customer->phone_number,
                'alamat' => $data->customer->alamat,
                'gudang' => $data->lokasi_gudang,
                'quantity_l' => $data->quantity_liter,
                'quantity_kg' => $data->quantity_kg,
                'total_kemasan' => $data->total_kemasan,
                'harga_satuan' => $data->harga_satuan,
                'jenis_kemasan' => $data->jenis_kemasan,
                'jenis_kemasan_name' => $data->packaging->title,
                'jenis_uco_name' => $data->jenis_uco_name,
                'pickup_time' => date('d-m-Y H:i:s', strtotime($data->pickup_end_time)),
                'salles_name' => $data->user_created->name,
                'driver_name' => isset($data->driver) ? $data->driver->name : '-',
            );
            return response()->json(['code' => 200, 'message' => 'Successfully', 'redirectTo' => 'reload', 'data' => $res ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function getAll(Request $request)
    {
        $data = Purchase::with('packaging','user_created','gudang')
            ->where('row_status','=','1')
            ->orderBy('updated_at', "DESC")
        	->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('gudang_name', function($data) {
                return $data->gudang->kabupaten_kota_name;
            })
            ->editColumn('jenis_kemasan', function($data) {
                return $data->packaging->title;
            })
            ->editColumn('created_by', function($data) {
                return $data->user_created->name;
            })
            ->editColumn('created_at', function($data) {
                return date('d-m-Y H:i:S', strtotime($data->created_at));
            })
            ->editColumn('action', function($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('wh_purchase.edit',$id_encode);
                $action = '<ul class="list-inline">';
				$action .= '<li class="list-inline-item"><div class="edit-button" style="color:#F70004" data-url="'.$url_edit.'" data-id="'.$id_encode.'"><i class="fa-solid fa-pen"></i></div></li>';
                $action .= '</ul>';
                
                return $action;
            })
            ->rawColumns(['action','keterangan'])
            ->make(true);
    }

    public function destroy($id_encode)
    {
        DB::beginTransaction();
        try {
            $id = json_decode(base64_decode($id_encode));
            $id = $id->id;
            $result = Category::find($id);
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
