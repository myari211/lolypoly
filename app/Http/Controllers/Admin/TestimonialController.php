<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralFunction;
use App\Http\Controllers\Controller;
use App\Models\CustomerPromo;
use App\Models\Promo;
use App\Models\Slider;
use App\Models\Testimonial;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public $data = [];

    function index()
    {
        $this->data['data_config'] = '';
        return view('admin.testimonial.index', $this->data);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $path = 'uploads/slider/';
            $images_thumbnail_name = '';
            $images_thumbnail = $request->images_thumbnail;
            $data = array(
                "name" => $request->name,
                "stars" => $request->stars,
                "description" => $request->description,
                'row_status' => '1',
                'updated_by' => GeneralFunction::myId(),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            if (isset($images_thumbnail)) {
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
                $data['image'] = $images_thumbnail_name;

            }

            $result = Testimonial::where('id', $id)->update($data);

            $redirectTo = route('testimonial.index');
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

        return view('admin.testimonial.add', $this->data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // $check = Promo::where('order', $request->order)->first();
            // if ($check) {
            //     return response()->json(['code' => 500, 'message' => 'Order number already exist'], 200);
            // }
            $path = 'uploads/promo';
            $images_thumbnail = $request->images_thumbnail;
            if (isset($images_thumbnail)) {
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
            }
            $data = array(
                "name" => $request->name,
                "stars" => $request->stars,
                "description" => $request->description,
                'image' => $images_thumbnail_name,
                'row_status' => '1',
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $result = Testimonial::create($data);
            $id = $result->id;

            $redirectTo = route('testimonial.index');
            $message = 'Successfully Created Data';
            DB::commit();
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => $redirectTo, 'data' => $result], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function updatePopup(Request $request)
    {
        DB::beginTransaction();
        try {
            $check = Promo::where('id', $request->promo_id)->first();

            if (!$check) {
                return response()->json(['code' => 500, 'message' => 'Promo data not found'], 200);
            }
            if ($check->is_popup == 0) {
                Promo::where('id', $request->promo_id)->update(['is_popup' => 1]);
            } else {
                Promo::where('id', $request->promo_id)->update(['is_popup' => 0]);
            }

            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Successfully update popup', 'redirectTo' => '', 'data' => $check], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function edit($id)
    {
        $this->data['data_config'] = '';
        $data_promo = Testimonial::where('row_status', '=', '1')
            ->where('id', $id)
            ->first();
        $this->data['data'] = $data_promo;

        return view('admin.testimonial.edit', $this->data);
    }

    public function getAll(Request $request)
    {
        $data = Testimonial::orderBy('updated_at', 'ASC')
            ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('action', function ($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('testimonial.edit', $data->id);
                $url_delete = route('testimonial.destroy', $id_encode);
                $action = '<ul class="list-inline">';
                $action .= '<li class="list-inline-item"><a style="color:#22bb33" href="' . $url_edit . '" data-id="' . $data->id . '"><i class="fa-solid fa-pen"></i></a></li>';
                $action .= '<li class="list-inline-item"><div class="delete-button" data-url="' . $url_delete . '" data-id="' . $id_encode . '"><i class="fa-solid fa-trash"></i></div></li>';
                $action .= '</ul>';

                return $action;
            })
            ->rawColumns(['action', 'description'])
            ->make(true);
    }

    public function destroy($id_encode)
    {
        DB::beginTransaction();
        try {
            $id = json_decode(base64_decode($id_encode));
            $id = $id->id;
            $result = Promo::find($id);
            $result->updatedBy = GeneralFunction::myId();
            $result->delete();

            DB::commit();
            return response()->json(['metaData' => ['code' => 200, 'message' => 'Data Deleted Successfully.'], 'response' => $result], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['metaData' => ['code' => 500, 'message' => $e->getMessage()]], 200);
        }
    }

    public function addCustomerPromos(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = Session::get('user');
            if (!$user) {
                return response()->json(['code' => 401, 'message' => 'Need Login'], 200);
            }
            $customerPromos = CustomerPromo::create([
                'customer_id' => GeneralFunction::myId(),
                'promo_id' => $request->promo_id,
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $url  = route('lolypoly.testimonial.detail', $request->promo_id);

            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Promo has been added', 'redirectTo' => '', 'response' => $customerPromos], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 500, 'message' => $e->getMessage()], 200);
        }
    }
}
