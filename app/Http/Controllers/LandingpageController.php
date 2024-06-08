<?php

namespace App\Http\Controllers;

use App\Models\landingpage;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Promo;
use App\Http\Requests\StorelandingpageRequest;
use App\Http\Requests\UpdatelandingpageRequest;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_encode)
    {
        // dd("TEST");
        $id = json_decode(base64_decode($id_encode));
        $id = $id->id;
        $this->data['promo'] = Promo::where('id', $id)->first();
        $this->data['data_testimonial'] = Testimonial::orderBy('created_at','DESC')->get();
        $this->data['data_category'] = Category::with('productCategory','productCategory.product')->orderBy('created_at','DESC')->get();
        
        return view('lolypoly-landing-page',$this->data);
    }
}
