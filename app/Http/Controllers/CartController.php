<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralFunction;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\KelurahanDesa;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductType;
use App\Models\CustomerAddress;
use App\Models\Provinsi;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $categoryList = GeneralFunction::getAllCategory();
        $productList = Product::query();

        if ($request->filled('price_min')) {
            $productList->where('price', '>=', $request->get('price_min'));
        }
        if ($request->filled('price_max')) {
            $productList->where('price', '<=', $request->get('price_max'));
        }
        if ($request->filled('order_by')) {
            $productList->orderBy(explode(':', $request->get('order_by'))[0], explode(':', $request->get('order_by'))[1]);
        }
        $totalProduct = $productList->count();
        $productList = $productList->paginate(9);
        $numberOfPages = $productList->lastPage();
        $orderByStatus = $request->get('order_by');

        if ($request->ajax()) {
            return view('lolypoly.partials.product-list', compact('productList', 'numberOfPages', 'totalProduct','orderByStatus'))->render();
        }
        return view('lolypoly-shopping-view', compact('categoryList', 'productList', 'numberOfPages', 'totalProduct','orderByStatus'));
    }

    public function cartGuest(Request $request)
    {
        return response()->json(['code' => 500, 'message' => 'Silahkan Login Terlebih Dahulu!', 'error_message' => ""], 200);
        try {
            if(Session::has('cart')){
                $data_cart = Session::get('cart');
                if(isset($request->product_variant_id)){
                    $key = $request->product_variant_id;
                } elseif (isset($request->product_type_id)){
                    $key = $request->product_type_id;
                } else {
                    $key = $request->product_id;
                }

                if(isset($data_cart[$key])){
                    $data_cart[$key] = (object)array(
                        'product_stock' => $data_cart[$key]->product_stock + $request->product_stock,
                        'product_id' => $data_cart[$key]->product_id,
                        'product_variant_id' => $data_cart[$key]->product_variant_id,
                        'product_type_id' => $data_cart[$key]->product_type_id,
                    );
                } else {
                    $data_cart[$key] = (object)array(
                        'product_stock' => $request->product_stock,
                        'product_id' => $request->product_id,
                        'product_variant_id' => $request->product_variant_id,
                        'product_type_id' => $request->product_type_id,
                    );
                }
                Session::put('cart', $data_cart);
                Session::save();
            } else {
                if(isset($request->product_variant_id)){
                    $key = $request->product_variant_id;
                } elseif (isset($request->product_type_id)){
                    $key = $request->product_type_id;
                } else {
                    $key = $request->product_id;
                }

                $res_arr[$key] = (object)array(
                    'product_stock' => $request->product_stock,
                    'product_id' => $request->product_id,
                    'product_variant_id' => $request->product_variant_id,
                    'product_type_id' => $request->product_type_id,
                );
                Session::put('cart', $res_arr);
            }
            $result = Session::get('cart');
            return response()->json(['code' => 200, 'message' => "Berhasil Memasukan Ke Keranjang!", 'redirectTo' => 'reload', 'data' => $result ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }

    }

    public function addQtyCartGuest(Request $request)
    {
        // dd($request->all());
        try {
            if(Session::has('cart')){
                $data_cart = Session::get('cart');
                if(isset($request->product_variant_id)){
                    $key = $request->product_variant_id;
                } elseif (isset($request->product_type_id)){
                    $key = $request->product_type_id;
                } else {
                    $key = $request->product_id;
                }

                if(isset($data_cart[$key])){
                    $data_cart[$key] = (object)array(
                        'product_stock' => $request->product_stock,
                        'product_id' => $data_cart[$key]->product_id,
                        'product_variant_id' => $data_cart[$key]->product_variant_id,
                        'product_type_id' => $data_cart[$key]->product_type_id,
                    );
                }
                Session::put('cart', $data_cart);
                Session::save();
            } else {
                if(isset($request->product_variant_id)){
                    $key = $request->product_variant_id;
                } elseif (isset($request->product_type_id)){
                    $key = $request->product_type_id;
                } else {
                    $key = $request->product_id;
                }

                $res_arr[$key] = (object)array(
                    'product_stock' => $request->product_stock,
                    'product_id' => $request->product_id,
                    'product_variant_id' => $request->product_variant_id,
                    'product_type_id' => $request->product_type_id,
                );
                Session::put('cart', $res_arr);
            }
            $result = Session::get('cart');
            $result['total'] = GeneralFunction::getCartGuest()->total;
            return response()->json(['code' => 200, 'message' => "Berhasil Memasukan Ke Keranjang!", 'redirectTo' => 'reload', 'data' => $result ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }

    }

    public function addQtyCart(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = GeneralFunction::myId();
            $check = Cart::where([
                ['user_id', $user_id],
                ['product_id', $request->product_id],
                ['product_varian_id', $request->product_variant_id],
                ['product_type_id', $request->product_type_id],
            ])->first();
            if(isset($check)){
                $stok_new = $request->product_stock;
                $sub_total_new = $stok_new * $check->price;
                $data_cart = array(
                    "stock" => $stok_new,
                    "sub_total" => $sub_total_new,
                    "updated_by" => GeneralFunction::myId(),
                    "updated_at" => date("Y-m-d H:i:s"),
                );
                $result = Cart::where('id', $check->id)->update($data_cart);
            }
            $result = GeneralFunction::getCartNotGuest();
            DB::commit();
            return response()->json(['code' => 200, 'message' => "Berhasil Memasukan Ke Keranjang!", 'redirectTo' => 'reload', 'data' => $result ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }

    }

    public function addToCart(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = GeneralFunction::myId();
            $check_address = CustomerAddress::where([
                ['user_id', $user_id],
            ])->first();
            if(!$check_address){
                $redirect_url = route('lolypoly.account');
                return response()->json(['code' => 500, 'message' => 'Silahkan Input Alamat Terlebih Dahulu.',  'redirectTo' => $redirect_url, 'error_message' => array()], 200);
            }
            $check = Cart::where([
                ['user_id', $user_id],
                ['product_id', $request->product_id],
                ['product_varian_id', $request->product_variant_id],
                ['product_type_id', $request->product_type_id],
            ])->first();
            if(isset($check)){
                $stok_new = $request->product_stock + $check->stock;
                $sub_total_new = $stok_new * $check->price;
                $data_cart = array(
                    "stock" => $stok_new,
                    "sub_total" => $sub_total_new,
                    "updated_by" => GeneralFunction::myId(),
                    "updated_at" => date("Y-m-d H:i:s"),
                );
                $result = Cart::where('id', $check->id)->update($data_cart);
            } else {
                if(isset($productVariant)){
                    $productVariant = ProductVariant::find($request->product_variant_id);
                    $price = $productVariant->price;
                } elseif(isset($productType)){
                    $productType = ProductType::find($request->product_type_id);
                    $price = $productType->price;
                } else {
                    $product = Product::find($request->product_id);
                    $price = $product->price;
                }
                $sub_total = $price * $request->product_stock;

                $data_cart = array(
                    "user_id" => $user_id,
                    "product_id" => $request->product_id,
                    "product_type_id" => $request->product_type_id,
                    "product_varian_id" => $request->product_variant_id,
                    "stock" => $request->product_stock,
                    "price" => $price,
                    "sub_total" => $sub_total,
                    "row_status" => "1",
                    "created_by" => GeneralFunction::myId(),
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_by" => GeneralFunction::myId(),
                    "updated_at" => date("Y-m-d H:i:s")
                );
                $result = Cart::create($data_cart);
            }
            DB::commit();
            return response()->json(['code' => 200, 'message' => "Berhasil Memasukan Ke Keranjang!", 'redirectTo' => 'reload', 'data' => $result ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }

    }

    public function deleteCart(Request $request)
    {
        try {
            if(Session::has('user')){
                $user_id = GeneralFunction::myId();
                $check = Cart::where([
                    ['user_id', $user_id],
                    ['product_id', $request->product_id],
                    ['product_varian_id', $request->product_variant_id],
                    ['product_type_id', $request->product_type_id],
                ])->first();
                if(isset($check)){
                    Cart::where('id', $check->id)->delete();
                }
                $result = GeneralFunction::getCartNotGuest();
            } else {
                if(Session::has('cart')){
                    $data_cart = Session::get('cart');
                    if(isset($request->product_variant_id)){
                        $key = $request->product_variant_id;
                    } elseif (isset($request->product_type_id)){
                        $key = $request->product_type_id;
                    } else {
                        $key = $request->product_id;
                    }
                    // 26d18158-c05b-496c-a1cc-9d6a7bcce456
                    if(isset($data_cart[$key])){
                        unset($data_cart[$key]);
                    }
                    Session::put('cart', $data_cart);
                    Session::save();
                }
                $result = Session::get('cart');
                $result['total'] = GeneralFunction::getCartGuest()->total;
            }
            return response()->json(['code' => 200, 'message' => "Berhasil Menghapus Ke Keranjang!", 'redirectTo' => 'reload', 'data' => $result ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }

    }

    public function shippingIndex()
    {
        $user_id = GeneralFunction::myId();
        $this->data['user'] = User::with('address')->where('id', $user_id)->first();
        $this->data['carts'] = GeneralFunction::getCart();
        return view('lolypoly-shipping', $this->data);
    }
}
