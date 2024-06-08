<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

// use App\Models\MenuAction;
use App\Models\RolePrivilage;
use App\Models\GeneralParameter;
use App\Models\Menus;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

// use Intervention\Image\Facades\Image;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Session;
use DateTime;
use Config;

class GeneralFunction
{
    public static function myId()
    {
        return Auth::user()->id;
    }

    public static function myName()
    {
        return Auth::user()->name;
    }

    public static function myAvatar()
    {
        return Auth::user()->avatar_url;
    }

    public static function myMail()
    {
        return Auth::user()->email;
    }

    public static function myRoleId()
    {
        return Auth::user()->role_id;
    }

    public static function myRoleName()
    {
        return Auth::user()->role->name;
    }

    public static function myRolePrivileges()
    {
        return Auth::user()->role->rolePrivileges;
    }

    public static function generalParameterValue($name)
    {
        $data = GeneralParameter::where('name', $name)->first();
        $res = null;
        if ($data) :
            if ($data->type == 'I') {
                $res = self::checkExistImage($data->value);;
            } else {
                $res = $data->value;
            }
        endif;
        return $res;
    }

    public static function checkWeekdays($date)
    {
        $date = new DateTime($date);
        $days_now = $date->format('N');
        if ($days_now > 5) {
            $res = false;
        } else {
            $res = true;
        }

        return $res;
    }

    public static function consServName($id)
    {
        $data = ConsultingService::where('id', $id)->first();

        return $data->title;
    }


    public static function isSuperAdmin()
    {
        if (self::myRoleName() == "Super Admin") {
            return true;
        }

        return false;
    }

    public static function getModulePath()
    {
        return Request::path();
    }

    public static function getModuleUrl($menuActionId = null, $actionName = null)
    {
        return MenuAction::join('menus', 'menu_actions.menuId', '=', 'menus.id')
            ->join('actions', 'menu_actions.actionId', '=', 'actions.id')
            ->where([
                ['menu_actions.id', $menuActionId],
                ['actions.name', $actionName]
            ])
            ->select('menus.url')
            ->first();
    }

    public static function isView()
    {
        if (self::isSuperAdmin()) {
            return true;
        }

        $roles = self::myRolePrivileges();
        foreach ($roles as $role) {
            $data = self::getModuleUrl($role->menuActionId, 'View');
            if ($data) {
                if ($data->url == self::getModulePath()) {
                    return true;
                }
            }
        }

        return false;
    }

    public static function isCreate()
    {
        if (self::isSuperAdmin()) {
            return true;
        }

        $roles = self::myRolePrivileges();
        foreach ($roles as $role) {
            $data = self::getModuleUrl($role->menuActionId, 'Create');
            if ($data) {
                if ($data->url == self::getModulePath()) {
                    return true;
                }
            }
        }

        return false;
    }

    public static function isRead()
    {
        if (self::isSuperAdmin()) {
            return true;
        }

        $roles = self::myRolePrivileges();
        foreach ($roles as $role) {
            $data = self::getModuleUrl($role->menuActionId, 'Read');
            if ($data) {
                if ($data->url == self::getModulePath()) {
                    return true;
                }
            }
        }
    }

    public static function isUpdate()
    {
        if (self::isSuperAdmin()) {
            return true;
        }

        $roles = self::myRolePrivileges();
        foreach ($roles as $role) {
            $data = self::getModuleUrl($role->menuActionId, 'Update');
            if ($data) {
                if ($data->url == self::getModulePath()) {
                    return true;
                }
            }
        }
    }

    public static function isDelete()
    {
        if (self::isSuperAdmin()) {
            return true;
        }

        $roles = self::myRolePrivileges();
        foreach ($roles as $role) {
            $data = self::getModuleUrl($role->menuActionId, 'Delete');
            if ($data) {
                if ($data->url == self::getModulePath()) {
                    return true;
                }
            }
        }
    }

    public static function getMenuAction($menuId = null, $actionId = null)
    {
        return MenuAction::where([['menuId', $menuId], ['actionId', $actionId]])->first();
    }

    public static function getRolePrivileges($roleId = null, $menuActionId = null)
    {
        return RolePrivileges::where([['roleId', $roleId], ['menuActionId', $menuActionId]])->first();
    }

    public static function sidebarMenu()
    {
        if (self::isSuperAdmin()) {
            $menus = self::getAllMenus();
        } else {
            $menus = self::getAllMenuPrivilage();
        }

        return $menus;
    }

    public static function getAllMenus()
    {
        $menus = Menus::orderBy('name', 'ASC')->whereNull('parent_id')->get();
        $res = array();
        foreach ($menus as $menu) {
            $get_child = Menus::where('parent_id', $menu->id)->get();
            $data_arr = array(
                'id' => $menu->id,
                'name' => $menu->name,
                'icon' => $menu->icon,
                'link_url' => $menu->link_url,
                'has_child' => count($get_child) > 0,
                'child' => $get_child
            );
            array_push($res, (object)$data_arr);
        }

        return (object)$res;
    }

    public static function getAllMenuPrivilage()
    {
        $role_id = Auth::user()->role_id;
        $data_privilage = RolePrivilage::with('menu', 'role')->where('role_id', Auth::user()->role_id)->get();
        $res = array();
        foreach ($data_privilage as $privilage) {
            if (isset($privilage->menu->parent)) {
                $parent_id = $privilage->menu->parent->id;
                $parent_name = $privilage->menu->parent->name;
                $parent_icon = $privilage->menu->parent->icon;
                $parent_link_url = $privilage->menu->parent->link_url;
                $child = array($privilage->menu);
            } else {
                $parent_id = $privilage->menu->id;
                $parent_name = $privilage->menu->name;
                $parent_icon = $privilage->menu->icon;
                $parent_link_url = $privilage->menu->link_url;
                $child = array();
            }
            if ($res == array()) {
                $res[$parent_id] = (object)array(
                    'id' => $parent_id,
                    'name' => $parent_name,
                    'icon' => $parent_icon,
                    'link_url' => $parent_link_url,
                    'child' => $child
                );
            } else {
                if (isset($res[$parent_id])) {
                    array_push($res[$parent_id]->child, $privilage->menu);
                } else {
                    $res[$parent_id] = (object)array(
                        'id' => $parent_id,
                        'name' => $parent_name,
                        'icon' => $parent_icon,
                        'link_url' => $parent_link_url,
                        'child' => $child
                    );
                }
            }
        }
        return (object)$res;
    }

    public static function featherIcon($name = null, $print = false)
    {
        $icons = new \Feather\Icons();

        return $icons->get($name, ['width' => 18, 'height' => 18], $print);
    }

    public static function convertToCurrency($number)
    {
        $number = explode(".", $number);
        if (count($number) > 1) {
            $numberBefore = $number[0];
            $numberSparator = ',';
            $numberAfter = (strlen($number[1]) > 1) ? $number[1] : $number[1] . '0';
        } else {
            $numberBefore = $number[0];
            $numberSparator = '';
            $numberAfter = '';
        }
        $converted_string = "";
        $string = (string)$numberBefore;
        $total = strlen($string);
        for ($b = 0; $b < strlen($string); $b++) {
            $total -= 1;
            $converted_string .= $string[$b];
            if ($total > 0 && $total % 3 == 0) {
                $converted_string .= ".";
            }
        }
        $res = $converted_string . '' . $numberSparator . '' . $numberAfter;
        return $res;
    }

    public static function dateFormatDB($date)
    {
        $date = new DateTime($date);
        return $date->format(Config::get('Y-m-d H:i'));
    }

    public static function uploadImage($path = null, $image = null)
    {
        if (isset($image)) {
            $filetype1 = $image->getClientOriginalExtension();
            $filename1 = uniqid(time()) . '.' . $filetype1;
            $image->move($path, $filename1);
            $dataImage1 = $path . '/' . $filename1;
            // dd($dataImage1);
            $value = $dataImage1;
            return $value;
        } else {
            return null;
        }
    }

    public static function deleteImage($path = null, $image = null)
    {
        if (isset($image)) {
            $filename = $image;
            if (file_exists($filename)) {
                unlink($filename);
                return 'Success';
            } else {
                return 'file tidak ada';
            }
        } else {
            return 'image kosong';
        }
    }



    public static function noInv($type)
    {

        // $no_trx_shuffle = str_shuffle(strtotime(date("Y-m-d H:m:i")));
        // $no_trx_first = substr($no_trx_shuffle,0,3);
        // $no_trx_last = substr($no_trx_shuffle,-3);

        $data_trx = Transaction::count();
        $data_id = $data_trx + 1;
        $no_trx_id = str_pad($data_id, 6, "0", STR_PAD_LEFT);

        if ($type == "INV") {
            $result = $type . "/" . date('Ymd') . "/" . $no_trx_id;
        } else {
            $result = $type . "" . $no_trx_id;
        }

        return $result;
    }

    public static function sessionCode($type)
    {

        $no_trx_shuffle = str_shuffle(strtotime(date("Y-m-d H:m:i")));
        $no_trx_first = substr($no_trx_shuffle,0,3);
        $no_trx_last = substr($no_trx_shuffle,-3);

        // $data_trx = Transaction::count();
        // $data_id = $data_trx + 1;
        // $no_trx_id = str_pad($data_id, 6, "0", STR_PAD_LEFT);
        // $result = $type . "" . $no_trx_id;
        $result = $type . $no_trx_first . $no_trx_last;

        return $result;
    }

    public static function getDays($date)
    {
        $date = new DateTime($date);
        $days_now = $date->format('N');
        // Misal hari ini adalah sabtu
        return Config::get('constants.days_indo')[$days_now];
    }

    public static function tgl_indo($tanggal)
    {
        $tanggal = date('Y-m-d', strtotime($tanggal));
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public static function month_indo($tanggal)
    {
        $tanggal = date('Y-m-d', strtotime($tanggal));
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $bulan[(int)$pecahkan[1]];
    }

    public static function user_log($name)
    {
        UserLog::create([
            'id' => time(),
            'name' => $name,
            'user_id' => Session::get('user')->id
        ]);
    }

    public static function slug($name)
    {
        return Str::slug($name);
    }

    public static function checkExistImage($img)
    {
        $img_default = asset('/assets/images/default.jpg');
        if (file_exists($img)) {
            $res = asset($img);
        } else {
            $res = $img_default;
        }
        return $res;
    }

    public static function durationTime($assigned_time, $completed_time)
    {
        $d1 = new DateTime($assigned_time);
        $d2 = new DateTime($completed_time);
        $interval = $d2->diff($d1);
        $res = $interval->format('%H:%I:%S');

        return $res;
    }

    public static function getOrderCode($status_category_ket = "Purchase", $bussines_category = "Order")
    {
        $first_code = substr($status_category_ket, 0, 1);
        $sec_code = substr($bussines_category, 0, 1);
        $result = $first_code . $sec_code . '-' . rand(100000, 999999);

        return $result;
    }
    public static function getAllCategory()
    {
        $categories = Category::orderBy('title', 'ASC')->whereNull('parent_id')->get();
        $res = array();
        foreach ($categories as $category) {
            $get_child = Category::where('parent_id', $category->id)->get();
            $data_arr = array(
                'id' => $category->id,
                'title' => $category->title,
                'has_child' => count($get_child) > 0,
                'child' => $get_child
            );
            array_push($res, (object)$data_arr);
        }

        return (object)$res;
    }

    public static function getAllBrand()
    {
        $categories = Brand::orderBy('title', 'ASC')->whereNull('parent_id')->get();
        $res = array();
        foreach ($categories as $category) {
            $get_child = Brand::where('parent_id', $category->id)->get();
            $data_arr = array(
                'id' => $category->id,
                'title' => $category->title,
                'has_child' => count($get_child) > 0,
                'child' => $get_child
            );
            array_push($res, (object)$data_arr);
        }

        return (object)$res;
    }

    public static function getAllCategoryProduct($id)
    {
        $categories = Category::orderBy('title', 'ASC')->whereNull('parent_id')->get();
        $res = array();
        foreach ($categories as $category) {
            $get_child = Category::where('parent_id', $category->id)->get();
            $product_category = ProductCategory::where([['row_status', '1'], ['product_id', $id], ['category_id', $category->id]])->first();
            $data_arr = array(
                'id' => $category->id,
                'title' => $category->title,
                'has_child' => count($get_child) > 0,
                'selected' => (isset($product_category)),
            );
            $res_child = array();
            if (count($get_child) > 0) {
                foreach ($get_child as $child) {
                    $product_category = ProductCategory::where([['row_status', '1'], ['product_id', $id], ['category_id', $child->id]])->first();
                    $data_child = array(
                        'id' => $child->id,
                        'title' => $child->title,
                        'selected' => (isset($product_category)),
                    );
                    array_push($res_child, (object)$data_child);
                }
            }
            $data_arr['child'] = (object)$res_child;
            array_push($res, (object)$data_arr);
        }

        return (object)$res;
    }

    public static function generateID($regID)
    {
        $mix_str_8 = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
        $mix_str_3 = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 3)), 0, 3);

        $replaceMicro = self::microTime();

        $substrMicroTime = substr($replaceMicro, 3, 10);

        $substr = substr($regID, 0, 3);

        return str_shuffle(strtoupper($substr)) . $mix_str_8 . $substrMicroTime . $mix_str_8 . $mix_str_3;
    }

    public static function getCart()
    {
        if (Session::has('user')) {
            $res = self::getCartNotGuest();
        } else {
            $res = self::getCartGuest();
        }
        return $res;
    }

    public static function getCartNotGuest()
    {
        $user_id  = self::myId();
        $carts = Cart::with('user', 'product', 'productType', 'productVariant')->orderBy('created_at', 'DESC')->where('user_id', $user_id);
        $res = (object)array(
            'data' => $carts->get(),
            'total' => 'Rp ' . GeneralFunction::convertToCurrency($carts->sum('sub_total')),
            'total_num' => $carts->sum('sub_total'),
        );
        return $res;
    }

    public static function getCartGuest()
    {
        $data = array();
        $total = 0;
        if (Session::has('cart')) :
            $data_cart = Session::get('cart');
            foreach ($data_cart as $cart) {
                if (isset($cart->product_variant_id)) {
                    $productVariant = ProductVariant::find($cart->product_variant_id);
                }
                if (isset($cart->product_type_id)) {
                    $productType = ProductType::find($cart->product_type_id);
                }

                $product = Product::find($cart->product_id);

                $product_name = $product->title;
                $product_name .= isset($productType) ? ' / ' . $productType->title : '';
                $product_name .= isset($productVariant) ? ' / ' . $productVariant->title : '';
                $product_image = $product->image_url;

                if (isset($productVariant)) {
                    $price = $productVariant->price;
                    $product_price = 'Rp ' . GeneralFunction::convertToCurrency($productVariant->price);
                } elseif (isset($productType)) {
                    $price = $productType->price;
                    $product_price = 'Rp ' . GeneralFunction::convertToCurrency($productType->price);
                } else {
                    $price = $product->price;
                    $product_price = 'Rp ' . GeneralFunction::convertToCurrency($product->price);
                }
                $sub_total = $price * $cart->product_stock;
                $sub_total_price = 'Rp ' . GeneralFunction::convertToCurrency($sub_total);
                $res_arr = array(
                    'id' => rand(),
                    'product_id' => $cart->product_id,
                    'product_variant_id' => $cart->product_variant_id,
                    'product_type_id' => $cart->product_type_id,
                    'product_stock' => $cart->product_stock,
                    'stock' => $cart->product_stock,
                    'product' => $cart->product,
                    'price' => $price,
                    'product_price' => $product_price,
                    'product_image' => $product_image,
                    'product_name' => $product_name,
                    'sub_total' => $sub_total,
                    'sub_total_price' => $sub_total_price,
                );
                $total += $sub_total;
                array_push($data, (object)$res_arr);
            }
        endif;

        $res = (object)array(
            'data' => $data,
            'total' => 'Rp ' . GeneralFunction::convertToCurrency($total),
            'total_num' => $total,
        );
        return $res;
    }

    public static function redirectCheck($type, $redirect_to)
    {
        switch ($type) {
            case 'SA':
                $redirectTo = route('dashboard.index');
                break;
            case 'ADM':
                $redirectTo = route('dashboard.index');
                break;
            case 'CUST':
                $redirectTo = route('lolypoly.home');
                if ($redirect_to != '') {
                    $redirectTo = $redirect_to;
                }
                break;
            default:
                $redirectTo = route('lolypoly.home');
                break;
        }
        return $redirectTo;
    }

    public static function getPriceProduct($product_id)
    {
        $lowestPrice = DB::table(function ($query) use ($product_id) {
            $query->select('price')
                ->from('10_product')
                ->where('id', $product_id)
                ->union(function ($query) use ($product_id) {
                    $query->select('price')
                        ->where('product_id', $product_id)
                        ->from('10_product_type');
                })
                ->union(function ($query) use ($product_id) {
                    $query->select('price')
                        ->where('product_id', $product_id)
                        ->from('10_product_variant');
                });
        }, 'combined_prices')
            ->min('price');

        return $lowestPrice;
    }

    public static function getMinStockProduct($product_id)
    {
        $lowest = DB::table(function ($query) use ($product_id) {
            $query->select('min_stock')
                ->from('10_product')
                ->where('id', $product_id)
                ->union(function ($query) use ($product_id) {
                    $query->select('min_stock')
                        ->where('product_id', $product_id)
                        ->from('10_product_type');
                })
                ->union(function ($query) use ($product_id) {
                    $query->select('min_stock')
                        ->where('product_id', $product_id)
                        ->from('10_product_variant');
                });
        }, 'combined_min_stocks')
            ->min('min_stock');

        return $lowest;
    }

    public static function getPriceProductType($product_type_id)
    {
        $lowestPrice = DB::table(function ($query) use ($product_type_id) {
            $query->select('price')
                ->from('10_product_type')
                ->where('id', $product_type_id)
                ->union(function ($query) use ($product_type_id) {
                    $query->select('price')
                        ->where('product_type_id', $product_type_id)
                        ->from('10_product_variant');
                });
        }, 'combined_prices')
            ->min('price');

        return $lowestPrice;
    }
    
    public static function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
    
        foreach ($string as $key => &$value) {
            if ($diff->$key) {
                $value = $diff->$key . ' ' . $value . ($diff->$key > 1 ? 's' : '');
            } else {
                unset($string[$key]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    

    public static function linkPagination($currentPage, $totalPage)
    {
        if ($currentPage - 1 == 0) {
            $links = [$currentPage, $currentPage + 1, $currentPage + 2, $currentPage + 3, $currentPage + 4];
        } elseif ($currentPage - 1 == 1) {
            $links = [$currentPage - 1, $currentPage, $currentPage + 1, $currentPage + 2, $currentPage + 3];
        } elseif ($currentPage + 1 > $totalPage) {
            $links = [$currentPage - 4, $currentPage - 3, $currentPage - 2, $currentPage - 1, $currentPage];
        } elseif ($currentPage + 2 > $totalPage) {
            $links = [$currentPage - 3, $currentPage - 2, $currentPage - 1, $currentPage, $currentPage + 1];
        } else {
            $links = [$currentPage - 2, $currentPage - 1, $currentPage, $currentPage + 1, $currentPage + 2];
        }
        return $links;
    }

    public static function getTracking($id){
        $data = Transaction::with('detail','statusTransaction','address')
                ->where('row_status','1')
                ->where('id',$id)
                ->first();
        $shipping_code = $data->shipping_code;
        $shipping_resi = $data->shipping_resi;
        $msg_first = (object)array(
            'date' => $data->waiting_pickup_at,
            'msg' => 'Waiting Pickup.',
        );
        $res = array($msg_first);
        if($shipping_resi){
            $msg_resi = (object)array(
                'date' => $data->shipping_resi_at,
                'msg' => 'Get Waybill "'.$shipping_resi.'".',
            );
            array_push($res,$msg_resi);
            try {
                $client = new Client();
            
                // Mengirim permintaan GET ke URL tertentu
                $biteship_token = GeneralFunction::generalParameterValue('biteship_token');
                $headers = [
                    'Authorization' => 'Bearer '.$biteship_token,
                    'Content-Type' => 'application/json',
                ];
                $options = [
                    'verify' => false,
                    'headers' => $headers,
                ];
                // dd($options);
                $api_url = GeneralFunction::generalParameterValue('biteship_url');
                
                $url = $api_url.'/v1/trackings/'.$shipping_resi.'/couriers/'.$shipping_code;
                $response = $client->request('GET', $url, $options);
                $statusCode = $response->getStatusCode();
                $body = json_decode($response->getBody()->getContents());
                $tracking = $body->history;
                if(count($tracking) > 0){
                    foreach($tracking as $track){
                        $event_date = isset($track->eventDate) ? $track->eventDate : $track->updated_at;
                        $msg_resi = (object)array(
                            'date' => date ( 'Y-m-d H:i:s' , strtotime ( $event_date ) ),
                            'msg' => $track->note,
                        );
                        array_push($res,$msg_resi);
                    }
                }
                $shipping_tracking_id = $body->id;
                $shipping_resi = $body->waybill_id;
                $data_update = array(
                    'shipping_tracking_id' => $shipping_tracking_id,
                    'shipping_resi' => $shipping_resi
                );
                if(!isset($data->shipping_resi_at) && isset($shipping_resi)){
                    $data_update['shipping_resi_at'] = date('Y-m-d H:i:s');
                }
                if($body->status == 'confirmed' || $body->status == 'allocated' || $body->status == 'on_hold' || $body->status == 'dropping_off'){
                    $data_update['status'] = '4';
                } elseif($body->status == 'picking_up' || $body->status == 'picked') {
                    if(!isset($data->pickup_at)){
                        $data_update['pickup_at'] = date('Y-m-d H:i:s');
                        $data_update['pickup_by'] = $body->courier->name . '- '. $body->courier->phone . '('.$data->shipping_name.')';
                    }
                    $data_update['status'] = '5';
                } elseif($body->status == 'delivered') {
                    $data_update['status'] = '7';
                } else {
                    $data_update['status'] = '4';
                }
                Transaction::where('id', $id)->update($data_update);
            } catch (RequestException $e) {
                // Menangani kesalahan permintaan HTTP
                if ($e->hasResponse()) {
                    // Jika ada respons dari server, dapatkan respons tersebut
                    $response = $e->getResponse();
                    $statusCode = $response->getStatusCode();
                    $body = $response->getBody()->getContents();
                    $res = (object)array(
                        'transcation_code' => $id,
                        'status' => "ERROR1",
                        'error_message' => $body,
                    );
                    // dd($body);
                } else {
                    // Jika tidak ada respons dari server, tangani kesalahan lainnya
                    $statusCode = 500;
                    $body = 'Terjadi kesalahan dalam melakukan permintaan.';
                    $res = (object)array(
                        'transcation_code' => $id,
                        'status' => "ERROR2",
                        'error_message' => $body,
                    );
                }
    
                // echo "TRANSCTION CODE : ".$order_id." (ERROR 1) || ";
            
                // Lakukan penanganan kesalahan sesuai kebutuhan
                // ...
            } catch (\Exception $e) {
                // Menangani kesalahan umum
                $statusCode = 500;
                $body = 'Terjadi kesalahan dalam melakukan permintaan: ' . $e->getMessage();
                $res = (object)array(
                    'transcation_code' => $id,
                    'status' => "ERROR2",
                    'error_message' => $body,
                );
                // echo "TRANSCTION CODE : ".$order_id." (ERROR 2) || ";
            
                // Lakukan penanganan kesalahan sesuai kebutuhan
                // ...
            }
        }
        return $res;
    }

    public static function biteshipStatic()
    {
        $pricing = array(
            (object)[
                "available_for_cash_on_delivery" => true,
                "available_for_proof_of_delivery" => false,
                "available_for_instant_waybill_id" => true,
                "available_for_insurance" => true,
                "company" => "jne",
                "courier_name" => "JNE",
                "courier_code" => "jne",
                "courier_service_name" => "Reguler",
                "courier_service_code" => "reg",
                "description" => "Layanan reguler",
                "duration" => "1 - 2 days",
                "shipment_duration_range" => "1 - 2",
                "shipment_duration_unit" => "days",
                "service_type" => "standard",
                "shipping_type" => "parcel",
                "price" => 10000,
                "type" => "reg"
            ],
            (object)[
                "available_for_cash_on_delivery" => false,
                "available_for_proof_of_delivery" => false,
                "available_for_instant_waybill_id" => true,
                "available_for_insurance" => true,
                "company" => "jne",
                "courier_name" => "JNE",
                "courier_code" => "jne",
                "courier_service_name" => "Yakin Esok Sampai (YES)",
                "courier_service_code" => "yes",
                "description" => "Yakin esok sampai",
                "duration" => "1 - 1 days",
                "shipment_duration_range" => "1 - 1",
                "shipment_duration_unit" => "days",
                "service_type" => "overnight",
                "shipping_type" => "parcel",
                "price" => 18000,
                "type" => "yes"
            ],
            (object)[
                "available_for_cash_on_delivery" => true,
                "available_for_proof_of_delivery" => false,
                "available_for_instant_waybill_id" => true,
                "available_for_insurance" => true,
                "company" => "anteraja",
                "courier_name" => "AnterAja",
                "courier_code" => "anteraja",
                "courier_service_name" => "Next Day",
                "courier_service_code" => "next_day",
                "type" => "next_day",
                "description" => "Next day service delivery",
                "duration" => "1 days",
                "shipment_duration_range" => "1",
                "shipment_duration_unit" => "days",
                "service_type" => "overnight",
                "shipping_type" => "parcel",
                "price" => 15300
            ],
            (object)[
                "available_for_cash_on_delivery" => true,
                "available_for_proof_of_delivery" => false,
                "available_for_instant_waybill_id" => true,
                "available_for_insurance" => true,
                "company" => "anteraja",
                "courier_name" => "AnterAja",
                "courier_code" => "anteraja",
                "courier_service_name" => "Reguler",
                "courier_service_code" => "reg",
                "type" => "reg",
                "description" => "Regular shipment",
                "duration" => "2 - 4 days",
                "shipment_duration_range" => "2 - 4",
                "shipment_duration_unit" => "days",
                "service_type" => "standard",
                "shipping_type" => "parcel",
                "price" => 11500
            ],
            (object)[
                "available_for_cash_on_delivery" => true,
                "available_for_proof_of_delivery" => false,
                "available_for_instant_waybill_id" => true,
                "available_for_insurance" => true,
                "company" => "anteraja",
                "courier_name" => "AnterAja",
                "courier_code" => "anteraja",
                "courier_service_name" => "Same Day",
                "courier_service_code" => "same_day",
                "type" => "same_day",
                "description" => "Same day service for Jakarta Area",
                "duration" => "8 - 12 hours",
                "shipment_duration_range" => "8 - 12",
                "shipment_duration_unit" => "hours",
                "service_type" => "same_day",
                "shipping_type" => "parcel",
                "price" => 32500
            ],
            (object)[
                "available_for_cash_on_delivery" => true,
                "available_for_instant_waybill_id" => true,
                "available_for_insurance" => true,
                "available_for_proof_of_delivery" => false,
                "company" => "sicepat",
                "courier_name" => "SiCepat",
                "courier_code" => "sicepat",
                "courier_service_name" => "Besok Sampai Tujuan",
                "courier_service_code" => "best",
                "description" => "Besok sampai tujuan",
                "duration" => "1 days",
                "shipment_duration_range" => "1",
                "shipment_duration_unit" => "days",
                "service_type" => "overnight",
                "shipping_type" => "parcel",
                "price" => 14000,
                "type" => "best"
            ],
            (object)[
                "available_for_cash_on_delivery" => true,
                "available_for_instant_waybill_id" => true,
                "available_for_insurance" => true,
                "available_for_proof_of_delivery" => false,
                "company" => "sicepat",
                "courier_name" => "SiCepat",
                "courier_code" => "sicepat",
                "courier_service_name" => "Reguler",
                "courier_service_code" => "reg",
                "description" => "Layanan reguler",
                "duration" => "1 - 2 days",
                "shipment_duration_range" => "1 - 2",
                "shipment_duration_unit" => "days",
                "service_type" => "standard",
                "shipping_type" => "parcel",
                "price" => 11500,
                "type" => "reg"
            ]
        );
        $body = array(
            "success" => true,
            "object" => "courier_pricing",
            "message" => "Success to retrieve courier pricing",
            "code" => 20001003,
            "origin" => (object)[
                "location_id" => null,
                "latitude" => null,
                "longitude" => null,
                "postal_code" => 16962,
                "country_name" => "Indonesia",
                "country_code" => "ID",
                "administrative_division_level_1_name" => "Jawa Barat",
                "administrative_division_level_1_type" => "province",
                "administrative_division_level_2_name" => "Bogor",
                "administrative_division_level_2_type" => "city",
                "administrative_division_level_3_name" => "Gunung Putri",
                "administrative_division_level_3_type" => "district",
                "administrative_division_level_4_name" => "Tlajung Udik",
                "administrative_division_level_4_type" => "subdistrict",
                "address" => null
            ],
            "destination" => (object)[
                "location_id" => null,
                "latitude" => null,
                "longitude" => null,
                "postal_code" => 12240,
                "country_name" => "Indonesia",
                "country_code" => "ID",
                "administrative_division_level_1_name" => "DKI Jakarta",
                "administrative_division_level_1_type" => "province",
                "administrative_division_level_2_name" => "Jakarta Selatan",
                "administrative_division_level_2_type" => "city",
                "administrative_division_level_3_name" => "Kebayoran Lama",
                "administrative_division_level_3_type" => "district",
                "administrative_division_level_4_name" => "Kebayoran Lama Utara",
                "administrative_division_level_4_type" => "subdistrict",
                "address" => null
            ],
            "pricing" => $pricing,
        );
        return (object)$body;
    }

    public static function stockMinus($id)
    {
        $transaction_detail = TransactionDetail::find($id);
        $product_type_id = $transaction_detail->product_type_id;
        $product_variant_id = $transaction_detail->product_variant_id;
        $product_id = $transaction_detail->product_id;
        $stock = $transaction_detail->stock;
        if(isset($product_variant_id)){
            $product_variant = ProductVariant::find($product_variant_id);
            $product_variant_fixstock =  $product_variant->stock - $stock;
            ProductVariant::where('id', $product_variant_id)->update(['stock' => $product_variant_fixstock]);
            $total_variant_stock = ProductVariant::where('product_type_id', $product_type_id)->sum('stock');
            ProductType::where('id', $product_type_id)->update(['stock' => $total_variant_stock]);
            $total_type_stock = ProductType::where('product_id', $product_id)->sum('stock');
            Product::where('id', $product_id)->update(['stock' => $total_type_stock]);
        } elseif (isset($product_type_id)) {
            $product_type = ProductType::find($product_type_id);
            $product_type_fixstock =  $product_type->stock - $stock;
            ProductType::where('id', $product_type_id)->update(['stock' => $product_type_fixstock]);
            $total_type_stock = ProductType::where('product_id', $product_id)->sum('stock');
            Product::where('id', $product_id)->update(['stock' => $total_type_stock]);
        } else {
            $product = Product::find($product_id);
            $product_fixstock =  $product->stock - $stock;
            Product::where('id', $product_id)->update(['stock' => $product_fixstock]);
        }
    }
    
    public static function stockPlus($order_id)
    {
        $data_tansaction = Transaction::where('transaction_code', $order_id)->first();
        foreach ($data_tansaction as $transaction) {
            $transaction_detail = TransactionDetail::find($transaction->id);
            $product_type_id = $transaction_detail->product_type_id;
            $product_variant_id = $transaction_detail->product_variant_id;
            $product_id = $transaction_detail->product_id;
            $stock = $transaction_detail->stock;
            if(isset($product_variant_id)){
                $product_variant = ProductVariant::find($product_variant_id);
                $product_variant_fixstock =  $product_variant + $stock;
                ProductVariant::where('id', $product_variant_id)->update(['stock' => $product_variant_fixstock]);
                $total_variant_stock = ProductVariant::where('product_type_id', $product_type_id)->sum('stock');
                ProductType::where('id', $product_type_id)->update(['stock' => $total_variant_stock]);
                $total_type_stock = ProductType::where('product_id', $product_id)->sum('stock');
                Product::where('id', $product_id)->update(['stock' => $total_type_stock]);
            } elseif (isset($product_type_id)) {
                $product_type = ProductType::find($product_type_id);
                $product_type_fixstock =  $product_type + $stock;
                ProductType::where('id', $product_type_id)->update(['stock' => $total_variant_stock]);
                $total_type_stock = ProductType::where('product_id', $product_id)->sum('stock');
                Product::where('id', $product_id)->update(['stock' => $total_type_stock]);
            } else {
                $product = Product::find($product_id);
                $product_fixstock =  $product + $stock;
                Product::where('id', $product_id)->update(['stock' => $product_fixstock]);
            }
        }
    }   
}
