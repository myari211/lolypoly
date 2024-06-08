<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\Menus;
use App\Helpers\GeneralFunction;

class MenuController extends Controller
{
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_menus'] = Menus::orderBy('name','ASC')->whereNull('parent_id')->get();

        return view('admin.menu.index', $this->data);
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $check = Menus::find($request->id);
            
            $data = array(
                'name' => $request->name,
                'url' => $request->url,
                'icon' => $request->icon,
                'parent_id' => $request->parent_id,
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
            );
            if($check){
                $result = Menus::where('id',$request->id)
                        ->update($data);
                $message = 'Successfully Updated Data';
            } else {
                $result = Menus::create($data);
                $message = 'Successfully Saved Data';
            }
            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Successfully Saved Data', 'redirectTo' => 'reload', 'data' => $result ], 200);
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
            $data = Menus::with('parent')
                ->where('id',$id)
                ->first();
            $res = array(
                'id' => $data->id,
                'name' => $data->name,
                'icon' => $data->icon,
                'url' => $data->url,
                'parent_id' => $data->parent_id,
            );
            return response()->json(['code' => 200, 'message' => 'Successfully', 'redirectTo' => 'reload', 'data' => $res ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function getAll(Request $request)
    {
        $data = Menus::with('parent')
                    ->orderBy('name','ASC')
                    ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('name', function($data) {
                $icon = isset($data->icon) ? $data->icon : '<i class="far fa-circle nav-icon"></i>';
                $content = $icon.' '.$data->name;
                return $content;
            })
            ->editColumn('parent', function($data) {
                $icon = isset($data->parent) ? $data->parent->icon : '<i class="far fa-circle nav-icon"></i>';
                $content = isset($data->parent) ? $icon.' '.$data->parent->name : '-';
                return $content;
            })
            ->editColumn('action', function($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('menus.edit',$id_encode);
                $url_delete = route('menus.destroy',$id_encode);
                $action = '<ul class="list-inline">';
				$action .= '<li class="list-inline-item"><div class="edit-button" data-url="'.$url_edit.'" data-id="'.$id_encode.'"><i class="fa-solid fa-pen-to-square"></i></div></li>';
				$action .= '<li class="list-inline-item"><div class="delete-button" data-url="'.$url_delete.'" data-id="'.$id_encode.'"><i class="fa-solid fa-trash"></i></div></li>';
                $action .= '</ul>';
                
                return $action;
            })
            ->rawColumns(['name','parent','action'])
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
