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
use App\Models\Category;
use App\Helpers\GeneralFunction;

class ArticleController extends Controller
{
    
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_category'] = Category::orderBy('title','ASC')->get();

        return view('admin.article.index', $this->data);
    }

    

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $check = Article::find($request->id);

            $data = array(
                'title' => $request->title,
                'slug' => GeneralFunction::slug($request->title),
                'category_id' => $request->category_id,
                'summary' => $request->summary,
                'description' => $request->description,
                'status' => 'P',
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
            );
            if($check){
                $result = Article::where('id',$request->id)
                        ->update($data);
                $message = 'Successfully Updated Data';
            } else {
                $result = Article::create($data);
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
                $url_edit = route('article.edit',$id_encode);
                $url_delete = route('article.destroy',$id_encode);
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
