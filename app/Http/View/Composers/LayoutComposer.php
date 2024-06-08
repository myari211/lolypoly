<?php

namespace App\Http\View\Composers;

use App\Helpers\GeneralFunction;
use App\Models\Category;
use App\Models\Store;
use Illuminate\View\View;

class LayoutComposer
{
    public function compose(View $view)
    {
        // Add data that you want to send to the layout view
        $categories = Category::orderByRaw('LENGTH(title) DESC')->whereNull('parent_id')->get();
        $categoriesNavBar = array();
        foreach ($categories as $category) {
            $get_child = Category::where('parent_id', $category->id)->get();
            $data_arr = array(
                'id' => $category->id,
                'title' => $category->title,
                'has_child' => count($get_child) > 0,
                'child' => $get_child
            );
            array_push($categoriesNavBar, (object)$data_arr);
        }
        $storeLocation = Store::with('provinsi')->select('provinsi_id')->groupBy('provinsi_id')->limit(20)->get();
        
        $view->with('categoriesNavBar', $categoriesNavBar);
        $view->with('storeLocation', $storeLocation);
    }
}
