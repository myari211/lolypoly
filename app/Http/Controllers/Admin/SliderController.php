<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
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
use App\Models\Store;
use App\Helpers\GeneralFunction;

class SliderController extends Controller
{

    public function index()
    {
        $this->data['data_config'] = '';

        return view('admin.slider.index', $this->data);
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $path = 'uploads/slider/';
            $images_thumbnail_name = '';
            $images_thumbnail = $request->images_thumbnail;
            $images_thumbnail = $request->images_thumbnail;
            if (isset($images_thumbnail)) {
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
                $data = array(
                    "name" => $request->name,
                    "order" => $request->order,
                    "image" => $images_thumbnail_name,
                    "url" => $request->url,
                    'row_status' => '1',
                    'updated_by' => GeneralFunction::myId(),
                    'updated_at' => date('Y-m-d H:i:s'),
                );

                $result = Slider::where('id', $id)->update($data);
            }else{
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
                $data = array(
                    "name" => $request->name,
                    "order" => $request->order,
                    "url" => $request->url,
                    'row_status' => '1',
                    'updated_by' => GeneralFunction::myId(),
                    'updated_at' => date('Y-m-d H:i:s'),
                );

                $result = Slider::where('id', $id)->update($data);
            }
            

            $redirectTo = route('slider.index');
            $message = 'Successfully Updated Data';
            DB::commit();
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => $redirectTo, 'data' => $result], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something went wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
    

    public function create()
    {
        $this->data['data_config'] = '';

        return view('admin.slider.add', $this->data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $check = Slider::where('order', $request->order)->first();
            if($check){
                return response()->json(['code' => 500, 'message' => 'Order number already exist'], 200);
            }
            $path = 'uploads/slider';
            $images_thumbnail = $request->images_thumbnail;
            if (isset($images_thumbnail)) {
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
                $data['image'] = $images_thumbnail_name;
            }
            $data = array(
                "name" => $request->name,
                "order" => $request->order,
                "url" => $request->url,
                "image" => $images_thumbnail_name,
                'row_status' => '1',
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            
            $result = Slider::create($data);
            $id = $result->id;
            
            $redirectTo = route('slider.index');
            $message = 'Successfully Created Data';
            DB::commit();
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => $redirectTo, 'data' => $result ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function edit($id)
    {
        $this->data['data_config'] = '';
        $data_product = Slider::where('row_status','=','1')
        ->where('id',$id)
        ->first();
        $this->data['data_slider'] = $data_product;
        
        return view('admin.slider.edit', $this->data);
    }

    public function getAll(Request $request)
    {
        $data = Slider::orderBy('updated_at','ASC')
        ->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('name', function($data) {
            return $data->name;
        })
        ->editColumn('order', function($data) {
            return $data->order;
        })
        ->editColumn('image', function($data) {
            return asset($data->image);
        })
        ->editColumn('url', function($data) {
            if($data->url != null) {
                return "Taunted";
            }
            else {
                return "Not Taunted";
            }
        })
        ->editColumn('action', function($data) {
            $id = (object)array(
                'id' => $data->id
            );
            $id_encode = base64_encode(json_encode($id));
            $url_edit = route('slider.edit',$data->id);
            $url_delete = route('slider.destroy',$id_encode);
            $action = '<ul class="list-inline">';
            $action .= '<li class="list-inline-item"><a style="color:#22bb33" href="'.$url_edit.'" data-id="'.$data->id.'"><i class="fa-solid fa-pen"></i></a></li>';
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
            $result = Slider::find($id);
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
