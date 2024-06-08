<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CustomerPromo;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Promo;
use App\Models\Provinsi;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public $data = [];
    public function index()
    {
        $categories = Category::inRandomOrder()->where('parent_id', null)->limit(7)->get();

        $bestProduct = Product::where('stock', '>', 1)->whereNull('brand_id')->inRandomOrder()->limit(4)->get();
        $slider = Slider::inRandomOrder()->get();

        // $topCategories = Category::select('10_category.id', '10_category.title', DB::raw('count(10_product_category.id) as total'))
        //     ->leftjoin('10_product_category', '10_product_category.category_id', '=', '10_category.id')
        //     ->groupBy('10_category.title', '10_category.id')
        //     ->inRandomOrder()
        //     ->limit(2)
        //     ->get();
        $topCategories = Category::with('productCategory')->limit(2)->inRandomOrder()
            ->get();

        $dateNow = Carbon::now();
        $promo = Promo::where('is_popup', 1)
            ->where('start_date', '<=', $dateNow)
            ->where('end_date', '>=', $dateNow);
        $user = Session::get('user');
        if ($user && $user->type_user == 'CUST') {
            $customerPromos = CustomerPromo::where('customer_id', $user->id)->pluck('promo_id')->toArray();
            $promo = $promo->whereNotIn('id', $customerPromos);
        } elseif ($user && $user->type_user != 'CUST') {
            $promo = [];
            return view('lolypoly-view', compact('categories', 'bestProduct', 'topCategories', 'slider', 'promo'));
        }
        $promo = $promo->inRandomOrder()
            ->limit(1)
            ->first();
        return view('lolypoly-view', compact('categories', 'bestProduct', 'topCategories', 'slider', 'promo'));
    }

    public function aboutUsIndex()
    {
        return view('lolypoly-about-us');
    }

    public function loadMoreData(Request $request)
    {
        $limit = 10;
        $offset = ($request->filled('offset')) ? $request->get('offset') : 0;
        $skip = $offset * $limit;
        $stores = Store::select('title')->latest();

        $totalDataRetrieved = ($offset + 1) * $limit;
        $needLoadMore = $stores->get()->count() < $totalDataRetrieved;

        $stores = $stores->skip($skip)->take($limit)->get()->reverse();

        return response()->json(['data' => $stores, 'loadMore' => $needLoadMore]);
    }

    public function landingPagePromoIndex($id = '')
    {
        $this->data['promo'] = Promo::where('id', $id)->first();
        $this->data['categories'] = Category::with('productCategory.product')->limit(4)->inRandomOrder()
            ->get();

        return view('promo-detail', $this->data);
    }
}
