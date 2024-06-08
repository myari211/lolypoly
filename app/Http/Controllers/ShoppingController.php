<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralFunction;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\KelurahanDesa;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductType;
use App\Models\Provinsi;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CustomerAddress;
use App\Models\Store;
use App\Models\Promo;
use App\Models\CartDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use Session;

class ShoppingController extends Controller
{
    public function index($id = '', $page = 1, $name = '')
    {
        $categoryList = GeneralFunction::getAllCategory();
        if ($id == 'all') {
            $catId = '';
        } else {
            $catId = $id;
        }
        $page = $page;
        $qname = $name;
        return view('lolypoly-shopping-view', compact('categoryList', 'catId', 'page', 'qname'));
    }

    function productShopping(Request $request)
    {
        $productList = Product::query()->whereNull('brand_id');

        if ($request->filled('id')) {
            $productList->with('productCategory.category');
            $categoriesId = $request->get('id');
            $check = Category::where('id', $categoriesId)->pluck('parent_id')->first();
            if ($check == null) {
                $catList = Category::where('parent_id', $categoriesId)->where('deleted_at', null)->pluck('id')->toArray();
                $catList[] = $categoriesId;
            } else {
                $catList = [$categoriesId];
            }
            $productList->whereHas('productCategory.category', function ($query) use ($catList) {
                $query->whereIn('id', $catList);
            });
        }
        if ($request->filled('price_min')) {
            $productList->whereRaw('CAST(price AS DECIMAL(10,2)) >= ?', $request->get('price_min'));
        }
        if ($request->filled('price_max')) {
            $productList->whereRaw('CAST(price AS DECIMAL(10,2)) <= ?', $request->get('price_max'));
        }
        if ($request->filled('order_by')) {
            $productList->orderBy(explode(':', $request->get('order_by'))[0], explode(':', $request->get('order_by'))[1]);
        } else {
            $productList->orderBy('updated_at', 'asc');
        }

        if ($request->filled('name')) {
            $productList->where('title', 'like', '%' . $request->get('name') . '%');
        }

        $length = 9;
        if ($request->filled('page')) {
            $start = ($request->get('page') - 1) * $length;
        } else {
            $start = 0;
        }
        $productList = $productList->where('stock', '>', 1);

        $total = $productList->count();
        $productList = $productList
            ->limit($length)
            ->offset($start)
            ->get();
        $totalMoreThanList = $total > $productList->count();
        $currentPage = $request->get('page');
        $totalPage = ceil($total / $length);

        $links =  GeneralFunction::linkPagination($currentPage, $totalPage);

        if ($total > 0) {
            return response()->json(['render' => view('lolypoly.partials.product-list', compact('productList', 'totalMoreThanList', 'currentPage', 'totalPage', 'links'))->render(), 'total' => $total]);
        } else {
            return response()->json(['render' => view('lolypoly.partials.no-product-list')->render(), 'total' => $total]);
        }
    }

    public function checkoutIndex()
    {
        $provinsi = Provinsi::get();
        $kabupatenKota = KabupatenKota::get();
        $kelurahan = KelurahanDesa::inRandomOrder()->limit(100)->get();
        $kecamatan = Kecamatan::get();
        $carts = GeneralFunction::getCart();
        return view('lolypoly-checkout', compact('provinsi', 'kabupatenKota', 'kecamatan', 'kelurahan', 'carts'));
    }
    public function shippingIndex()
    {
        $user_id = GeneralFunction::myId();
        $now = date('Y-m-d H:i:s');
        $this->data['user'] = User::with('address')->where('id', $user_id)->first();
        $this->data['carts'] = GeneralFunction::getCart();
        $this->data['address'] = CustomerAddress::where('user_id', $user_id)->get();
        $this->data['data_promo'] = Promo::select('10_promo.*', 'cp.id as customer_promo_id')
                                            ->leftJoin('10_customer_promo as cp', 'cp.promo_id', '=', '10_promo.id')
                                            ->where(function($q) use ($user_id) {
                                                $q->where('cp.customer_id', '!=',$user_id)
                                                ->orwhereNull('cp.id');
                                            })
                                            ->where([
                                                ['10_promo.start_date','<=',$now],
                                                ['10_promo.end_date','>=',$now]
                                            ])
                                            ->get();
        $this->data['stores'] = Store::get();

        return view('lolypoly-shipping', $this->data);
    }

    public function checkoutshippingIndex(Request $request)
    {
        $user_id = GeneralFunction::myId();
        Cart::where('user_id', $user_id)->delete();
        $decodedData = base64_decode($request->id_encode);
        $data_product = json_decode($decodedData);
        if (isset($productVariant)) {
            $productVariant = ProductVariant::find($data_product->product_variant_id);
            $price = $productVariant->price;
        } elseif (isset($productType)) {
            $productType = ProductType::find($data_product->product_type_id);
            $price = $productType->price;
        } else {
            $product = Product::find($data_product->product_id);
            $price = $product->price;
        }
        $sub_total = $price * $data_product->product_stock;

        $data_cart = array(
            "user_id" => $user_id,
            "product_id" => $data_product->product_id,
            "product_type_id" => ($data_product->product_type_id == '') ? null : $data_product->product_type_id,
            "product_varian_id" => ($data_product->product_variant_id == '') ? null : $data_product->product_variant_id,
            "stock" => $data_product->product_stock,
            "price" => $price,
            "sub_total" => $sub_total,
            "row_status" => "1",
            "created_by" => GeneralFunction::myId(),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_by" => GeneralFunction::myId(),
            "updated_at" => date("Y-m-d H:i:s")
        );
        $result = Cart::create($data_cart);
        $this->data['user'] = User::with('address')->where('id', $user_id)->first();
        $this->data['carts'] = GeneralFunction::getCart();
        $this->data['address'] = CustomerAddress::where('user_id', $user_id)->get();
        $now = date('Y-m-d H:i:s');
        $this->data['data_promo'] = Promo::select('10_promo.*', 'cp.id as customer_promo_id')
                                            ->leftJoin('10_customer_promo as cp', 'cp.promo_id', '=', '10_promo.id')
                                            ->where(function($q) use ($user_id) {
                                                $q->where('cp.customer_id', '!=',$user_id)
                                                ->orwhereNull('cp.id');
                                            })
                                            ->where([
                                                ['10_promo.start_date','<=',$now],
                                                ['10_promo.end_date','>=',$now]
                                            ])
                                            ->get();
        $this->data['stores'] = Store::get();

        return view('lolypoly-shipping', $this->data);
    }

    public function calculatePromo($id)
    {
        try {
            $user_id = GeneralFunction::myId();
            $now = date('Y-m-d H:i:s');
            $promo = Promo::select('10_promo.*', 'cp.id as customer_promo_id')
                    ->leftJoin('10_customer_promo as cp', 'cp.promo_id', '=', '10_promo.id')
                    ->where('10_promo.id',$id)
                    ->where('cp.customer_id', '!=',$user_id)
                    ->orwhereNull('cp.id')
                    ->where('start_date','<=',$now)
                    ->where('end_date','>=',$now)
                    ->first();
            $res = GeneralFunction::getCart();
            $res->discount = 'Rp ' . GeneralFunction::convertToCurrency("0");
            $res->discount_num = 0;
            if(!$promo){
                return response()->json(['code' => 500, 'message' => 'Data Promo Tidak Ditemukan!', 'redirectTo' => 'reload', 'data' => $res], 200);
            }
            if($promo->discount_type == 'P'){
                $disc_val = ($promo->discount_value / 100) * $res->total_num;
                $fix_disc = ((int)$disc_val <= (int)$promo->max_discount) ? $disc_val : $promo->max_discount;
                $res->discount = 'Rp ' . GeneralFunction::convertToCurrency($fix_disc);
                $res->discount_num = $fix_disc;
                $res->total_num = $res->total_num - (int)$fix_disc;
                $res->total = 'Rp ' . GeneralFunction::convertToCurrency($res->total_num);
                $res->promo_id = $promo->id;
            } else{
                $res->discount = 'Rp ' . GeneralFunction::convertToCurrency($promo->discount_value);
                $res->discount_num = $promo->discount_value;
                $res->total_num = $res->total_num - (int)$promo->discount_value;
                $res->total = 'Rp ' . GeneralFunction::convertToCurrency($res->total_num);
                $res->promo_id = $promo->id;
            }
            return response()->json(['code' => 200, 'message' => 'OK!',  'redirectTo' => '', 'data' => $res], 200);
        } catch (Exception $e) {
            $res = GeneralFunction::getCart();
            $res->discount = 'Rp ' . GeneralFunction::convertToCurrency("0");
            $res->discount_num = 0;
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage(), 'data' => $res], 200);
        }
    }
    public function checkoutStore(Request $request)
    {
        try {
            $check_email = User::where('email', $request->customer_email)->first();
            if (isset($check_email)) {
                return response()->json(['code' => 404, 'message' => 'Email Has Been Registerd', 'error_message' => ['customer_email' => 'Email Has Been Registerd'], 'redirectTo' => '', 'data' => array()], 200);
            }
            $check_email = User::where('phone_number', $request->customer_phone)->first();
            if (isset($check_email)) {
                return response()->json(['code' => 404, 'message' => 'Phone Number Has Been Registerd', 'error_message' => ['customer_phone' => 'Phone Number Has Been Registerd'], 'redirectTo' => '', 'data' => array()], 200);
            }
            $data = array(
                'name' => $request->customer_name,
                'email' => $request->customer_email,
                'phone_number' => $request->customer_phone,
                'password' => Hash::make('LolyPoly100%!'),
                'type_user' => 'CUST',
                'active' => '0',
            );
            $result = User::create($data);
            $user_id = $result->id;
            $data_address = array(
                "user_id" => $user_id,
                "name" => $request->address_name,
                "address" => $request->address,
                "phone_number" => $request->address_phone_number,
                "provinsi_id" => $request->provinsi,
                "kabupaten_kota_id" => $request->kabupatenKota,
                "kecamatan_id" => $request->kecamatan,
                "kelurahan_desa_id" => $request->kelurahanDesa,
                "kode_pos" => $request->postal_code,
                "row_status" => "1",
                "created_by" => $user_id,
                "updated_by" => $user_id,
            );
            CustomerAddress::create($data_address);

            foreach (GeneralFunction::getCartGuest()->data as $cart) {
                $data_cart = array(
                    "user_id" => $user_id,
                    "product_id" => $cart->product_id,
                    "product_type_id" => $cart->product_type_id,
                    "product_varian_id" => $cart->product_variant_id,
                    "stock" => $cart->product_stock,
                    "price" => $cart->price,
                    "sub_total" => $cart->sub_total,
                    "row_status" => "1",
                    "created_by" => $user_id,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_by" => $user_id,
                    "updated_at" => date("Y-m-d H:i:s")
                );
                Cart::create($data_cart);
            }

            $credentials = [
                'email' => $result->email,
                'password' => 'LolyPoly100%!'
            ];
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                Session::put('user', $result);
                return response()->json(['code' => 200, 'message' => 'Succesfuly Checkout!',  'redirectTo' => route('lolypoly.shipping'), 'data' => []], 200);
            } else {
                return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => "Failed Login!"], 200);
            }
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function calculate(Request $request)
    {
        try {
            $user_id = GeneralFunction::myId();
            $now = date('Y-m-d H:i:s');
            $promo_id = $request->promo_id;
            $cart_delivery_id = $request->cart_delivery_id;
            $promo = Promo::select('10_promo.*', 'cp.id as customer_promo_id')
                    ->leftJoin('10_customer_promo as cp', 'cp.promo_id', '=', '10_promo.id')
                    ->where('10_promo.id',$promo_id)
                    ->where('cp.customer_id', '!=',$user_id)
                    ->orwhereNull('cp.id')
                    ->where('start_date','<=',$now)
                    ->where('end_date','>=',$now)
                    ->first();
            $res = GeneralFunction::getCart();
            $res->promo_id = $promo_id;
            $res->cart_delivery_id = $cart_delivery_id;
            $res->discount = 'Rp ' . GeneralFunction::convertToCurrency("0");
            $res->discount_num = 0;
            if(!$promo){
                return response()->json(['code' => 500, 'message' => 'Promo Sudah Tidak Berlaku Atau Sudah Anda Pakai!', 'redirectTo' => 'reload', 'data' => $res], 200);
            }

            $cart_delivery = CartDelivery::where('id', $cart_delivery_id)->first();
            if(!$cart_delivery){
                return response()->json(['code' => 500, 'message' => 'Pengiriman Yang Anda Pilih Tidak Ditemukan, Silahkan Pilih Pengiriman Lainnya!', 'redirectTo' => 'reload', 'data' => $res], 200);
            }

            $res->delivery = 'Rp ' . GeneralFunction::convertToCurrency($cart_delivery->price);
            $res->delivery_num = $cart_delivery->price;
            if($promo->discount_type == 'P'){
                $disc_val = ($promo->discount_value / 100) * $res->total_num;
                $fix_disc = ((int)$disc_val <= (int)$promo->max_discount) ? $disc_val : $promo->max_discount;
                $res->discount = 'Rp ' . GeneralFunction::convertToCurrency($fix_disc);
                $res->discount_num = $fix_disc;
                $res->total_num = $res->total_num - (int)$fix_disc + (int)$res->delivery_num;
                $res->total = 'Rp ' . GeneralFunction::convertToCurrency($res->total_num);
            } else{
                $res->discount = 'Rp ' . GeneralFunction::convertToCurrency($promo->discount_value);
                $res->discount_num = $promo->discount_value;
                $res->total_num = $res->total_num - (int)$promo->discount_value + (int)$res->delivery_num;
                $res->total = 'Rp ' . GeneralFunction::convertToCurrency($res->total_num);
            }

            return response()->json(['code' => 200, 'message' => 'OK!',  'redirectTo' => '', 'data' => $res], 200);
        } catch (Exception $e) {
            $res = GeneralFunction::getCart();
            $res->discount = 'Rp ' . GeneralFunction::convertToCurrency("0");
            $res->discount_num = 0;
            $res->delivery = 'Rp ' . GeneralFunction::convertToCurrency("0");
            $res->delivery_num = 0;
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage(), 'data' => $res], 200);
        }
    }
}
