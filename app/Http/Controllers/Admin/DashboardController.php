<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['total_pendapatan'] = Transaction::where('status', 2)->sum('total');
        $this->data['total_stock'] = Product::sum('stock');
        $this->data['total_customer'] = User::where('type_user', 'CUST')->count();

        return view('admin.dashboard.index', $this->data);
    }

    function bestSellingCategory(Request $request)
    {
        try {
            $trs = Transaction::with('detail.product.productCategory.category')
                ->get();

            $datas = [];

            foreach ($trs as $trans) {
                $details = $trans->detail;
                if ($details) {
                    foreach ($details as $detail) {
                        $prod = $detail->product;
                        if ($prod) {
                            $catlist = $prod->productCategory;
                            foreach ($catlist as $cats) {
                                $cat = $cats->category;
                                if ($cat) {
                                    $datas[]['title'] = $cat->title;
                                }
                            }
                        }
                    }
                }
            }
            $datas = collect($datas)->groupBy('title')->map(function ($group) {
                return $group->count();
            })->toArray();
            $catlist =  Category::pluck('title')->toArray();
            foreach ($catlist as $cat) {
                if (!array_key_exists($cat, $datas)) {
                    $datas[$cat] = 0;
                }
            }
            return response()->json(['code' => 200, 'message' => 'Successfully Data', 'redirectTo' => '', 'data' => $datas], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    function transactionStatistic(Request $request)
    {
        try {
            $date = Transaction::selectRaw('DATE(created_at) as created_date, COUNT(*) as count')
                ->groupBy('created_date')
                ->get()->toArray();

            return response()->json(['code' => 200, 'message' => 'Successfully Data', 'redirectTo' => '', 'data' => $date], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
}
