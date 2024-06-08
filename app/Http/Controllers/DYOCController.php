<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class DYOCController extends Controller
{
    //

    public $data = [];
    public function index()
    {
        $this->data['brands'] = Brand::whereNull('parent_id')->get();
        $this->data['types'] = Brand::whereNotNull('parent_id')->get();

        return view('lolypoly-dyoc', $this->data);
    }

    public function getTypeByBrand(Request $request)
    {
        try {
            $types = Brand::where('parent_id', $request->brand_id)->get();
            $render = view('lolypoly.partials.type-list', compact('types'))->render();
            return response()->json(['code' => 200, 'message' => '',  'redirectTo' => '', 'data' => $render], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage(), 'data' => []], 200);
        }
    }
    public function getCaseByType(Request $request)
    {
        try {
            $data = Product::where('brand_id', $request->type_id)->get();
            $cases = [];
            foreach ($data as $dt) {
                $cases[] = (object)[
                    'id' => $dt->id,
                    'image' => $dt->image,
                    'price' => number_format($dt->price, 0, ',', '.'),
                    'title' => $dt->title,
                ];
            }
            $render = view('lolypoly.partials.case-list', ['data' => $cases])->render();
            return response()->json(['code' => 200, 'message' => '',  'redirectTo' => '', 'data' => $render], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage(), 'data' => []], 200);
        }
    }
}
