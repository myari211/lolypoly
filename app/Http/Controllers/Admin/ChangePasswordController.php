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

class ChangePasswordController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';
        
        $id = GeneralFunction::myId();
        $data = User::where('id',$id)
                ->first();
        $this->data['data'] = $data;

        return view('admin.change_password.index', $this->data);
    }

    

    public function store(Request $request){
        DB::beginTransaction();
        try {
            if($request->old_password == ''){
                return response()->json(['code' => 404, 'message' => 'Old password can`t be empty', 'redirectTo' => 'reload', 'data' => array() ], 200);
            }else if($request->new_password == ''){
                return response()->json(['code' => 404, 'message' => 'New password can`t be empty', 'redirectTo' => 'reload', 'data' => array() ], 200);
            }else if($request->confirm_password == ''){
                return response()->json(['code' => 404, 'message' => 'Confirm password can`t be empty', 'redirectTo' => 'reload', 'data' => array() ], 200);
            }else if($request->new_password != $request->confirm_password){
                return response()->json(['code' => 404, 'message' => 'New password and confirm password must be same', 'redirectTo' => 'reload', 'data' => array() ], 200);
            }else{
                    $check = User::select([
                        'password',
                    ])
                        ->where('id', $request->id)
                        ->first();

                        $match = password_verify($request->old_password, $check->password);
                        if(!$match){
                            return response()->json(['code' => 404, 'message' => 'Old password isn`t correct', 'redirectTo' => 'reload', 'data' => array() ], 200);
                        } else {
                            $setPassword = User::where('id', '=', $request->id)
                            ->update([
                                'password' => Hash::make($request->confirm_password)
                            ]);
                        }
                    
                    if($setPassword){
                        DB::commit();
                        return response()->json(['code' => 200, 'message' => 'Password successfully changed', 'redirectTo' => 'reload', 'data' =>  $setPassword], 200);
                    }
            }
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
