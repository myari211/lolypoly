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
use App\Models\Article;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\Store;
use App\Helpers\GeneralFunction;

class StoreController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_provinsi'] = Provinsi::orderBy('provinsi_name','ASC')->get();
        $this->data['data_kabupaten'] = KabupatenKota::orderBy('kabupaten_kota_name','ASC')->get();
        return view('admin.store.index', $this->data);
    }

    

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $check = Store::find($request->id);

            $data = array(
                "title" => $request->title,
                "phone" => $request->phone,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude,
                "address" => $request->address,
                "provinsi_id" => $request->provinsi,
                "kabupaten_kota_id" => $request->kabupatenKota,
                'row_status' => 1,
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
            );
            if($check){
                $result = Store::where('id',$request->id)
                        ->update($data);
                $message = 'Successfully Updated Data';
            } else {
                $result = Store::create($data);
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
            $data = Store::where('id',$id)
                ->first();
            $res = array(
                'id' => $data->id,
                "title" => $data->title,
                "phone" => $data->phone,
                "latitude" => $data->latitude,
                "longitude" => $data->longitude,
                "provinsi" => $data->provinsi_id,
                "kabupatenKota" => $data->kabupaten_kota_id,
                "address" => $data->address,
            );
            return response()->json(['code' => 200, 'message' => 'Successfully', 'redirectTo' => 'reload', 'data' => $res ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function getAll(Request $request)
    {
        $data = Store::orderBy('title','ASC')
                    ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('action', function($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('store.edit',$id_encode);
                $url_delete = route('store.destroy',$id_encode);
                $action = '<ul class="list-inline">';
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
