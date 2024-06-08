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

class WarehouseOfflineController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_lokasi_gudang'] = KabupatenKota::where('active','1')->orderBy('kabupaten_kota_name','ASC')->get();
        $this->data['data_driver'] = User::where('role_id','cef3c101-47ae-4eef-8e63-64a4a57d390f')->orderBy('name','ASC')->get();
        $this->data['data_customer'] = GeneralFunction::getcustomerLastOrder();

        return view('admin.wh_offline.index', $this->data);
    }

    
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $res_cust = Customer::where('id','=',$request->id)->first();
            if(!isset($res_cust)){
                return response()->json(['status' => "404", 'message' => 'Pelanggan Tidak Ditemukan!', 'data' => array()], 200);
            }
            $status_kategori = app('db')->table('00_status_category')->where('id', 'FWeItJaF1248001593ItJaFqtL')->first();
            $category_bussines = app('db')->table('10_category_bussines')->where('id', $res_cust->category_bussines_id)->first();
            $category = app('db')->table('10_category')->where('id', $category_bussines->category_id)->first();
            $order_code = GeneralFunction::getOrderCode($status_kategori->keterangan,$category_bussines->title);
            $data = array(
                'order_code' => $order_code,
                'customer_id' => $res_cust->id,
                'kategori_master' => $category_bussines->category_id,
                'kategori_usaha' => $res_cust->category_bussines_id,
                'lokasi_gudang' => $request->gudang,
                'status_pelanggan' => 'O',
                'harga_satuan' => $request->harga_satuan,
                'jenis_uco' => $request->jenis_uco,
                'jenis_kemasan' => $request->jenis_kemasan,
                'quantity_kg' => $request->quantity_kg,
                'quantity_liter' => str_replace(",",".",$request->quantity_l),
                'status' => 'FWeItJaF1248001593ItJaFqtL',
                'followup_date' => $request->followup_date,
                'keterangan' => $request->keterangan,
                'total_biaya' => round($request->harga_satuan * $request->quantity_kg),
                // 'parent_id' => $request->parent_id,
                'updated_by' => GeneralFunction::myId(),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => GeneralFunction::myId(),
                'created_at' => date('Y-m-d H:i:s'),
            );
            $result = Transaction::create($data);
            
            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Successfully', 'redirectTo' => 'reload', 'data' => $result ], 200);
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

    public function getCustomer($id)
    {
        try {        
            $data = Customer::with('sales','category','categoryBussines', 'provinsi', 'kelurahanDesa', 'kabupatenKota', 'kecamatan')
                        ->where('id','=',$id)
                        ->where('row_status','=','1')
                        ->first();
            
            $provinsi_name = isset($data->provinsi) ? ', '.$data->provinsi->provinsi_name : '';
            $kabupaten_kota_name = isset($data->kabupatenKota) ? ', '.$data->kabupatenKota->kabupaten_kota_name : '';
            $kecamatan_name = isset($data->kecamatan) ? ', '.$data->kecamatan->kecamatan_name : '';
            $keluarahan_desa_name = isset($data->kelurahanDesa) ? ', '.$data->kelurahanDesa->keluarahan_desa_name : '';
            $res = array(
                'id' => $data->id,
                'input_start_call' => date('Y-m-d H:i:s'),
                'id_pelanggan' => $data->pelanggan_code,
                'nama_usaha' => $data->nama_usaha,
                'nama_pj' => $data->nama_pj,
                'jabatan_pj' => $data->jabatan_pj,
                'phone_number' => $data->phone_number,
                'alamat' => $data->alamat.$keluarahan_desa_name.$kecamatan_name.$kabupaten_kota_name.$provinsi_name,
                'category_name' => $data->category->title,
                'category_bussines_name' => $data->categoryBussines->title,
            );
            return response()->json(['code' => 200, 'message' => 'Successfully', 'redirectTo' => 'reload', 'data' => $res ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function getTransaction($order_code)
    {
        try {
            $data = Transaction::with('customer','category','categoryBussines','status_category','user_created','gudang','driver','packaging')
                ->where('order_code',$order_code)
                ->first();
            if(!isset($data)){
                return response()->json(['code' => 404, 'message' => 'Order Tidak Ditemukan!', 'redirectTo' => '', 'data' => $data ], 200);
            }
            if($data->status_category->status_category_code != 'A0'){
                return response()->json(['code' => 404, 'message' => 'Order Belum Menuju Gudang!', 'redirectTo' => '', 'data' => $data ], 200);
            }
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
        $filter_start_date = isset($request->filter_start_date) ? $request->filter_start_date.' 00:00:00' : '';
        $filter_end_date = isset($request->filter_end_date) ? $request->filter_end_date.' 23:59:59' : '';
        $filter_nama_usaha = $request->filter_nama_usaha;
        $filter_status_category_id = $request->filter_status_category_id;
        $filter_gudang = $request->filter_gudang;
        $filter_category_bussines_id = $request->filter_category_bussines_id;

        $data = Transaction::with('customer','category','categoryBussines','status_category','user_created','gudang')
            ->where('row_status','=','1')
            ->whereHas('status_category', function($q) {
                $q->where('status_category_code', '=', 'A11');
            })
            ->when($filter_start_date, function ($query, $filter_start_date) {
                return $query->where('created_at', '>=', $filter_start_date);
            })
            ->when($filter_end_date, function ($query, $filter_end_date) {
                return $query->where('created_at', '<=', $filter_end_date);
            })
            ->when($filter_nama_usaha, function ($query, $filter_nama_usaha) {
                return $query->whereHas('customer', function($q) use ($filter_nama_usaha){
                    $q->where('nama_usaha', 'like', "%" . $filter_nama_usaha . "%");
                });
            })
            ->when($filter_status_category_id, function ($query, $filter_status_category_id) {
                return $query->where('status', $filter_status_category_id);
            })
            ->when($filter_gudang, function ($query, $filter_gudang) {
                return $query->where('lokasi_gudang', $filter_gudang);
            })
            ->when($filter_category_bussines_id, function ($query, $filter_category_bussines_id) {
                return $query->whereHas('customer', function($q) use ($filter_category_bussines_id){
                    $q->where('category_bussines_id', $filter_category_bussines_id);
                });
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
                $url_approve = route('cro_approve.approve');
                $url_notapprove = route('cro_approve.notapprove');
                $url_delete = route('cro_approve.destroy',$id_encode);
                $action = '<ul class="list-inline">';
				$action .= '<li class="list-inline-item"><div class="approve-button approve-store" data-url="'.$url_approve.'" data-id="'.$id_encode.'"><i class="fa-solid fa-circle-check"></i></div></li>';
				$action .= '<li class="list-inline-item"><div class="notapprove-button approve-store" data-url="'.$url_notapprove.'" data-id="'.$id_encode.'"><i class="fa-solid fa-pen-to-square"></i></div></li>';
				$action .= '<li class="list-inline-item"><div class="delete-button" data-url="'.$url_delete.'" data-id="'.$id_encode.'"><i class="fa-solid fa-trash"></i></div></li>';
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
