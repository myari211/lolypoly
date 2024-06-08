<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\KelurahanDesa;
use Illuminate\Support\Facades\Response;
use App\Models\Provinsi;
use App\Models\Store;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function getProvinsi(Request $request)
    {
        $sort         = 'asc';
        $orderBy    = 'provinsi_name';

        if ($request->sort != null || $request->sort != '') {
            $sort    = $request->sort;
        }

        if ($request->orderBy != null || $request->orderBy != '') {
            $orderBy     = $request->orderBy;
        }

        $sql = Provinsi::select('provinsi_id', 'provinsi_name')
            ->where('active', '=', '1')
            ->orderBy($orderBy, $sort)
            ->get();

        if (!$sql) {
            return response()->json(['isSuccess' => false, 'message' => 'Fetch data failed'], 500);
        } else {
            return response()->json(['isSuccess' => true, 'message' => 'OK', 'data' => $sql], 200);
        }
    }

    public function getKabupatenKota(Request $request)
    {

        $sort       = 'asc';
        $orderBy    = 'kabupaten_kota_name';

        if ($request->sort != null || $request->sort != '') {
            $sort    = $request->sort;
        }

        if ($request->orderBy != null || $request->orderBy != '') {
            $orderBy     = $request->orderBy;
        }

        $sql = KabupatenKota::select('kabupaten_kota_id', 'provinsi_id', 'kabupaten_kota_name')
            ->where('active', '=', '1')
            ->where('provinsi_id', '=', $request->provinsi_id)
            ->orderBy($orderBy, $sort)
            ->get();

        if (!$sql) {
            return response()->json(['isSuccess' => false, 'message' => 'Fetch data failed'], 500);
        } else {
            return response()->json(['isSuccess' => true, 'message' => 'OK', 'data' => $sql], 200);
        }
    }

    public function getKecamatan(Request $request)
    {
        $sort = 'asc';
        $orderBy    = 'kecamatan_name';

        if ($request->sort != null || $request->sort != '') {
            $sort    = $request->sort;
        }

        if ($request->orderBy != null || $request->orderBy != '') {
            $orderBy     = $request->orderBy;
        }

        $sql = Kecamatan::select('kecamatan_id', 'kabupaten_kota_id', 'kecamatan_name')
            ->where('active', '=', '1')
            ->where('kabupaten_kota_id', '=', $request->kabupaten_kota_id)
            ->orderBy($orderBy, $sort)
            ->get();

        if (!$sql) {
            return response()->json(['isSuccess' => false, 'message' => 'Fetch data failed'], 500);
        } else {
            return response()->json(['isSuccess' => true, 'message' => 'OK', 'data' => $sql], 200);
        }
    }

    public function getKelurahanDesa(Request $request)
    {
        $sort       = 'asc';
        $orderBy    = 'kelurahan_desa_name';

        if ($request->sort != null || $request->sort != '') {
            $sort    = $request->sort;
        }

        if ($request->orderBy != null || $request->orderBy != '') {
            $orderBy     = $request->orderBy;
        }

        $sql = KelurahanDesa::select('kelurahan_desa_id', 'kecamatan_id', 'kelurahan_desa_name', 'kode_pos')
            ->where('active', '=', '1')
            ->where('kecamatan_id', '=', $request->kecamatan_id)
            ->orderBy($orderBy, $sort)
            ->get();

        if (!$sql) {
            return response()->json(['isSuccess' => false, 'message' => 'Fetch data failed'], 500);
        } else {
            return response()->json(['isSuccess' => true, 'message' => 'OK', 'data' => $sql], 200);
        }
    }

    public function getProvinsiStore(Request $request)
    {
        $sort         = 'asc';
        $orderBy    = 'provinsi_name';

        if ($request->sort != null || $request->sort != '') {
            $sort    = $request->sort;
        }

        if ($request->orderBy != null || $request->orderBy != '') {
            $orderBy     = $request->orderBy;
        }

        $locationFilter = [];
        $storeLocation = Store::with('provinsi')->select('provinsi_id')->groupBy('provinsi_id')->get();
        foreach ($storeLocation as $location) {
            $locationFilter[] = $location->provinsi->provinsi_id;
        }
        $sql = Provinsi::select('provinsi_id', 'provinsi_name')
            ->where('active', '=', '1')
            ->whereIn('provinsi_id', $locationFilter)
            ->orderBy($orderBy, $sort)
            ->get();

        if (!$sql) {
            return response()->json(['isSuccess' => false, 'message' => 'Fetch data failed'], 500);
        } else {
            return response()->json(['isSuccess' => true, 'message' => 'OK', 'data' => $sql], 200);
        }
    }

    public function getKabupatenKotaStore(Request $request)
    {

        $sort       = 'asc';
        $orderBy    = 'kabupaten_kota_name';

        if ($request->sort != null || $request->sort != '') {
            $sort    = $request->sort;
        }

        if ($request->orderBy != null || $request->orderBy != '') {
            $orderBy     = $request->orderBy;
        }
        $locationFilter = [];
        $storeLocation = Store::with('kabupatenKota')->select('kabupaten_kota_id')->groupBy('kabupaten_kota_id')->get();
        foreach ($storeLocation as $location) {
            $locationFilter[] = $location->kabupatenKota->kabupaten_kota_id;
        }
        $sql = KabupatenKota::select('kabupaten_kota_id', 'provinsi_id', 'kabupaten_kota_name')
            ->where('active', '=', '1')
            ->where('provinsi_id', '=', $request->provinsi_id)
            ->whereIn('kabupaten_kota_id', $locationFilter)
            ->orderBy($orderBy, $sort)
            ->get();

        if (!$sql) {
            return response()->json(['isSuccess' => false, 'message' => 'Fetch data failed'], 500);
        } else {
            return response()->json(['isSuccess' => true, 'message' => 'OK', 'data' => $sql], 200);
        }
    }
}
