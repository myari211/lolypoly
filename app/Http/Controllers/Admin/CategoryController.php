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
use Exception;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Helpers\GeneralFunction;

class CategoryController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_category'] = Category::orderBy('title','ASC')->whereNull('parent_id')->get();

        return view('admin.category.index', $this->data);
    }

    

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $check = Category::find($request->id);

            $path = 'images/categories';
            $images_thumbnail = $request->image;
            $images_update = $request->image_file;
            $images_thumbnail_name = null;
            if (isset($images_thumbnail)) {
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
            }elseif (isset($images_update)) {
                $images_thumbnail_name = $images_update;
            }


            $data = array(
                'title' => $request->title,
                'parent_id' => $request->parent_id,
                'image' => $images_thumbnail_name,
                'row_status' => 1,
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
            );
            if($check){
                $result = Category::where('id',$request->id)
                        ->update($data);
                $message = 'Successfully Updated Data';
            } else {
                $result = Category::create($data);
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
            $data = Category::where('id',$id)
                ->first();
            $res = array(
                'id' => $data->id,
                'parent_id' => $data->parent_id,
                'title' => $data->title,
                'image_file' => $data->image,
            );
            return response()->json(['code' => 200, 'message' => 'Successfully', 'redirectTo' => 'reload', 'data' => $res ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function getAll(Request $request)
    {
        $data = Category::with('parent')
                    ->orderBy('title','ASC')
                    ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('parent', function($data) {
                $content = isset($data->parent) ? $data->parent->title : '-';
                return $content;
            })
            ->editColumn('action', function($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('category.edit',$id_encode);
                $url_delete = route('category.destroy',$id_encode);
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
