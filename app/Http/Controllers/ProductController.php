<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralFunction;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Models\ProductVariant;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use Session;
class ProductController extends Controller
{
    public function index($id)
    {
        $product = Product::with('productCategory','productImage','productType','productVariant')->find(Crypt::decrypt($id));
        $otherProducts = Product::inRandomOrder()->whereNull('brand_id')->where('stock', '>', 1)->limit(15)->get();
        $user_has_address = 0;
        if(Session::has('user')){
            $user_id = GeneralFunction::myId();
            $check_address = CustomerAddress::where([
                ['user_id', $user_id],
            ])->first();
            if($check_address){
                $user_has_address = 1;
            }
        }
        return view('lolypoly-product-detail', compact('product', 'otherProducts', 'user_has_address'));
    }

    public function productVariant($id)
    {

        $result = ProductVariant::where('product_type_id',$id)->get();

        return response()->json(['code' => 200, 'message' => 'Success', 'data' => $result ], 200);

    }
}
