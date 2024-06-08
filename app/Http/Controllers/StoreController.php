<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Provinsi;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::query();

        if ($request->filled('name')) {
            $stores->where('title', 'LIKE', '%' .  $request->get('name') . '%');
        }
        if ($request->filled('provinsi')) {
            $stores->where('provinsi_id', $request->get('provinsi'));
        }
        if ($request->filled('kabupaten_kota')) {
            $stores->where('kabupaten_kota_id', $request->get('kabupaten_kota'));
        }

        $totalStore = $stores->count();
        $stores->orderBy('title','asc');
        $stores = $stores->get();

        if ($request->ajax()) {
            if ($totalStore > 0) {
                return view('lolypoly.partials.store-list', compact('stores'))->render();
            } else {
                return view('lolypoly.partials.no-store-list')->render();
            }
        }
        $markerList= Store::select('latitude as lat','longitude as long','title')->get()->toArray();

        return view('lolypoly-find-us', compact('stores','markerList'));
    }
}
