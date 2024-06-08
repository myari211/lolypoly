<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\GeneralParameter;
use App\Helpers\GeneralFunction;

class SettingController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data_general = GeneralParameter::where('flag', 'G')
                        ->orderByRaw("LENGTH(98_general_parameter.order) ASC, 98_general_parameter.order ASC")
                        ->get();
        $this->data['data_general'] = $data_general;

        $data_aboutus = GeneralParameter::where('flag', 'A')
                        ->orderByRaw("LENGTH(98_general_parameter.order) ASC, 98_general_parameter.order ASC")
                        ->get();
        $this->data['data_aboutus'] = $data_aboutus;

        $data_home = GeneralParameter::where('flag', 'H')
                        ->orderByRaw("LENGTH(98_general_parameter.order) ASC, 98_general_parameter.order ASC")
                        ->get();
        $this->data['data_home'] = $data_home;

        return view('admin.setting.index', $this->data);
    }

    public function storeGeneral(Request $r)
    {
        DB::beginTransaction();
        try {
            $this->store($r->all());
            DB::commit();
            return response()->json(['code' => 200, 'message' => 'General Setting has been updated!', 'redirectTo' => 'reload', 'data' => array() ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }

    }
    
    public function storeHome(Request $r)
    {
        DB::beginTransaction();
        try {
            $this->store($r->all());
            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Home Setting has been updated!', 'redirectTo' => 'reload', 'data' => array() ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function storeAboutus(Request $r)
    {
        DB::beginTransaction();
        try {
            $this->store($r->all());
            DB::commit();
            return response()->json(['code' => 200, 'message' => 'About Us Setting has been updated!', 'redirectTo' => 'reload', 'data' => array() ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function store($data)
    {
        foreach ($data as $key => $value) {
            if ($key != '_token') :
                $check = GeneralParameter::where('name', $key)->first();
                if (isset($check)) {
                    if ($check->type == 'I') {
                        $file1 = $value;
                        $path1 = 'assets/uploads/config';
                        if (isset($file1)) {
                            $delete_image = GeneralFunction::deleteImage($path1, $check->value);
                            $value = GeneralFunction::uploadImage($path1, $file1);
                        }
                    }
                    $arr_data = [
                        'value' => $value,
                    ];
                    $settingupate = GeneralParameter::where('id', $check->id)->update($arr_data);
                }
            endif;
        }
    }
}
