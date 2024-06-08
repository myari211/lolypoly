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
use App\Models\StatusPackaging;
use App\Helpers\GeneralFunction;
use DateTime;

class WarehouseListController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_lokasi_gudang'] = KabupatenKota::where('active','1')->orderBy('kabupaten_kota_name','ASC')->get();
        $this->data['data_driver'] = User::where('role_id','cef3c101-47ae-4eef-8e63-64a4a57d390f')->orderBy('name','ASC')->get();

        return view('admin.wh_list.index', $this->data);
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
                "real_jenis_kemasan" => $request->real_jenis_kemasan,
                "real_total_kemasan" => $request->real_total_kemasan,
                "real_quantity_kg" => $request->real_quantity_kg,
                "real_quantity_liter" => $request->real_quantity_l,
                "status_kemasan" => $request->status_kemasan,
                "warehouse_file_1" => $file_name_1,
                "warehouse_file_2" => $file_name_2,
                "warehouse_file_3" => $file_name_3,
                'warehouse_check_at' => date('Y-m-d H:i:s'),
                'warehouse_check_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
            );
            $result = Transaction::where('id',$request->id)
                    ->update($data);
            $message = 'Successfully Updated Data';
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
        $data = Transaction::with('customer','category','user_created','gudang')
            ->where('row_status','=','1')
            ->whereHas('status_category', function($q) {
                $q->where('status_category_code', '=', 'A0');
            })
            ->orderBy('updated_at', "DESC")
        	->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('date_place', function($data) {
                return date('d-m-Y', strtotime($data->created_at));
            })
            ->editColumn('id_pelanggan', function($data) {
                return $data->customer->pelanggan_code;
            })
            ->editColumn('category_name', function($data) {
                return $data->categoryBussines->title;
            })
            ->editColumn('status_code', function($data) {
                return $data->status_category->status_category_code;
            })
            ->editColumn('nama_usaha', function($data) {
                return $data->customer->nama_usaha;
            })
            ->editColumn('nama_pj', function($data) {
                return $data->customer->nama_pj;
            })
            ->editColumn('jabatan_pj', function($data) {
                return $data->customer->jabatan_pj;
            })
            ->editColumn('no_tlp', function($data) {
                return $data->customer->phone_number;
            })
            ->editColumn('gudang_name', function($data) {
                return isset($data->gudang) ? $data->gudang->kabupaten_kota_name : "-";
            })
            ->editColumn('alamat', function($data) {
                return $data->customer->alamat;
            })
            ->editColumn('status_ket', function($data) {
                return $data->status_category->keterangan;
            })
            ->editColumn('jenis_kemasan', function($data) {
                return $data->packaging->title;
            })
            ->editColumn('action', function($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('wh_list.edit',$id_encode);
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
