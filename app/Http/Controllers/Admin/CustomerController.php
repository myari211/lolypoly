<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    //
    public $data = [];

    function index()
    {
        $this->data['data_config'] = '';
        return view('admin.customer.index', $this->data);
    }
    public function detail($id)
    {
        $this->data['data_config'] = '';
        $user = User::where('id', $id)
            ->first();
        $this->data['data'] = $user;

        return view('admin.customer.detail', $this->data);
    }
    public function getAll(Request $request)
    {
        $data = User::with('address')->where('type_user','CUST')->orderBy('updated_at', 'ASC')
            ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('image', function ($data) {
                return asset($data->image);
            })
            ->editColumn('action', function ($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_view = route('customer.detail', $data->id);
                $action = '<ul class="list-inline">';
                $action .= '<li class="list-inline-item"><a style="color:#4287f5" href="'.$url_view.'" data-id="'.$data->id.'"><i class="fa-solid fa-eye"></i></a></li>';
                $action .= '</ul>';

                return $action;
            })
            ->rawColumns(['action', 'popup'])
            ->make(true);
    }
}
