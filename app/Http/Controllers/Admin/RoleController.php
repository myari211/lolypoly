<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\Role;
use App\Models\RolePrivilage;
use App\Models\Menus;
use App\Helpers\GeneralFunction;

class RoleController extends Controller
{
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_menus'] = GeneralFunction::getAllMenus();
        return view('admin.role.index', $this->data);
    }

    

    public function getAll(Request $request)
    {
        $data = Role::orderBy('name','ASC')
                    ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('action', function($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('roles.edit',$id_encode);
                $url_delete = route('roles.destroy',$id_encode);
                $action = '<ul class="list-inline">';
				$action .= '<li class="list-inline-item"><div class="edit-button" data-url="'.$url_edit.'" data-id="'.$id_encode.'"><i class="fa-solid fa-pen-to-square"></i></div></li>';
				$action .= '<li class="list-inline-item"><div class="delete-button" data-url="'.$url_delete.'" data-id="'.$id_encode.'"><i class="fa-solid fa-trash"></i></div></li>';
                $action .= '</ul>';

                return $action;
            })
            ->rawColumns(['name','action'])
            ->make(true);
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $check = Role::find($request->id);

            $data_insert = array(
                'name' => $request->name,
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
            );
            
            if($check){
                $result = Role::where('id',$request->id)
                        ->update($data_insert);
                $role_id = $request->id;
                $message = 'Successfully Updated Data';
            } else {
                $result = Role::create($data_insert);
                $role_id = $result->id;
                $message = 'Successfully Saved Data';
            }

            RolePrivilage::where('role_id', $role_id)->delete();
            
            foreach($request->menu_id as $menu_id){
                $data_insert_multi = array(
                    'role_id' => $role_id,
                    'menu_id' => $menu_id,
                    'created_by' => GeneralFunction::myId(),
                    'updated_by' => GeneralFunction::myId(),
                );
                $result_multi = RolePrivilage::create($data_insert_multi);
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
            $data = Role::where('id',$id)
                ->first();
            $data_privilage = RolePrivilage::where('role_id',$id)
                ->get();
            $menu_id = array();
            foreach($data_privilage as $privilage){
                array_push($menu_id,$privilage->menu_id);
            }
            $res = array(
                'id' => $data->id,
                'name' => $data->name,
                'menu_id' => $menu_id,
            );
            return response()->json(['code' => 200, 'message' => 'Successfully', 'redirectTo' => 'reload', 'data' => $res ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function destroy($id_encode)
    {
        DB::beginTransaction();
        try {
            $id = json_decode(base64_decode($id_encode));
            $id = $id->id;
            $result = Menus::find($id);
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
