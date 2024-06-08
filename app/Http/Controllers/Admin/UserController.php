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
use App\Helpers\GeneralFunction;

class UserController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_role'] = Role::orderBy('name','ASC')->where('id','!=', '7be3a1aa-4049-11ec-9356-0242ac130003')->get();

        return view('admin.users.index', $this->data);
    }

    

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $check = User::find($request->id);
            
            if($check){ 
                if($check->email != $request->email){
                    $check_email = User::where('email',$request->email)->first();
                    if(isset($check_email)){
                        return response()->json(['code' => 404, 'message' => 'Email Has Been Registerd', 'redirectTo' => 'reload', 'data' => array() ], 200);
                    }
                }
                
                if($check->phone_number != $request->phone_number){
                    $check_phone = User::where('phone_number',$request->phone_number)->first();
                    if(isset($check_phone)){
                        return response()->json(['code' => 404, 'message' => 'Phone Number Has Been Registerd', 'redirectTo' => 'reload', 'data' => array() ], 200);
                    }
                }
            } else {
                $check_email = User::where('email',$request->email)->first();
                if(isset($check_email)){
                    return response()->json(['code' => 404, 'message' => 'Email Has Been Registerd', 'redirectTo' => 'reload', 'data' => array() ], 200);
                }
                $check_phone = User::where('phone_number',$request->phone_number)->first();
                if(isset($check_phone)){
                    return response()->json(['code' => 404, 'message' => 'Phone Number Has Been Registerd', 'redirectTo' => 'reload', 'data' => array() ], 200);
                }
            }

            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'name' => $request->name,
                'type_user' => 'ADM',
                'role_id' => $request->role_id,
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
            );
            if($check){
                $result = User::where('id',$request->id)
                        ->update($data);
                $message = 'Successfully Updated Data';
            } else {
                $data['password'] = Hash::make('GreenCorp100%!');
                $result = User::create($data);
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
            $data = User::where('id',$id)
                ->first();
            $res = array(
                'id' => $data->id,
                'name' => $data->name,
                'email' => $data->email,
                'phone_number' => $data->phone_number,
                'role_id' => $data->role_id,
            );
            return response()->json(['code' => 200, 'message' => 'Successfully', 'redirectTo' => 'reload', 'data' => $res ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function getAll(Request $request)
    {
        $data = User::with('role')
                    ->where('role_id','!=', '7be3a1aa-4049-11ec-9356-0242ac130003')
                    ->orderBy('name','ASC')
                    ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('role_name', function($data) {
                return $data->role->name;
            })
            ->editColumn('action', function($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('users.edit',$id_encode);
                $url_delete = route('users.destroy',$id_encode);
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
