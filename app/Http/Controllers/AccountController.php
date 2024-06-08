<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralFunction;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        $user = Session::get('user');

        if ($user) {
            $customerAddress = CustomerAddress::where('user_id', $user->id)->get();
            $status = Status::get();

            return view('lolypoly-account', compact('user', 'customerAddress', 'status'));
        } else {
            return redirect('/');
        }
    }

    public function editBio($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'birth_date' => 'required',
                'gender' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json(['code' => 500, 'message' => implode(' ', $validate->messages()->all()), 'error_message' => $validate->errors()], 200);
            }

            $user = User::find((Crypt::decrypt($id)));
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->phone_number = $request->get('phone_number');
            $user->dob = $request->get('birth_date');
            $user->gender = $request->get('gender');
            $user->save();
            Session::put('user', $user);
            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Update Success',  'redirectTo' => '', 'data' => []], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function createAddress(Request $request)
    {
        DB::beginTransaction();
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'provinsi' => 'required',
                'kabupaten_kota' => 'required',
                'kecamatan' => 'required',
                'kelurahan_desa' => 'required',
                'kode_pos' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json(['code' => 500, 'message' =>  implode(' ', $validate->messages()->all()), 'error_message' => $validate->errors()], 200);
            }

            $newAddress = new CustomerAddress();
            $newAddress->user_id = GeneralFunction::myId();
            $newAddress->name = $request->get('name');
            $newAddress->address = $request->get('address');
            $newAddress->phone_number = $request->get('phone_number');
            $newAddress->provinsi_id = $request->get('provinsi');
            $newAddress->kabupaten_kota_id = $request->get('kabupaten_kota');
            $newAddress->kecamatan_id = $request->get('kecamatan');
            $newAddress->kelurahan_desa_id = $request->get('kelurahan_desa');
            $newAddress->kode_pos = $request->get('kode_pos');
            $newAddress->row_status = (CustomerAddress::where('user_id', GeneralFunction::myId())->count()) ? (CustomerAddress::where('user_id', GeneralFunction::myId())->count()) + 1 : '1';
            $newAddress->created_by = GeneralFunction::myId();
            $newAddress->updated_by = GeneralFunction::myId();
            $newAddress->save();

            $data = CustomerAddress::where('id', $newAddress->id)->first();

            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Created Success',  'redirectTo' => '', 'data' => $data], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
    public function getAddress($id)
    {
        try {
            $data = CustomerAddress::where('id', $id)->first();

            return response()->json(['code' => 200, 'message' => 'Get Success',  'redirectTo' => '', 'data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function editAddress($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $validate = Validator::make($request->all(), [
                'address' => 'required',
                'provinsi' => 'required',
                'kabupaten_kota' => 'required',
                'kecamatan' => 'required',
                'kelurahan_desa' => 'required',
                'kode_pos' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $validate->errors()], 200);
            }

            $newAddress =  CustomerAddress::where('id', $id)->first();
            $newAddress->user_id = GeneralFunction::myId();
            $newAddress->name = $request->get('name');
            $newAddress->address = $request->get('address');
            $newAddress->phone_number = $request->get('phone_number');
            $newAddress->provinsi_id = $request->get('provinsi');
            $newAddress->kabupaten_kota_id = $request->get('kabupaten_kota');
            $newAddress->kecamatan_id = $request->get('kecamatan');
            $newAddress->kelurahan_desa_id = $request->get('kelurahan_desa');
            $newAddress->kode_pos = $request->get('kode_pos');
            $newAddress->row_status = (CustomerAddress::where('user_id', GeneralFunction::myId())->count()) ? (CustomerAddress::where('user_id', GeneralFunction::myId())->count()) + 1 : '1';
            $newAddress->created_by = GeneralFunction::myId();
            $newAddress->updated_by = GeneralFunction::myId();
            $newAddress->save();

            $data = CustomerAddress::where('id', $newAddress->id)->first();

            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Updated Success',  'redirectTo' => '', 'data' => $data], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
    public function deleteAddress($id)
    {
        DB::beginTransaction();
        try {
            $newAddress =  CustomerAddress::where('id', $id)->first();
            $newAddress->delete();

            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Deleted Success',  'redirectTo' => '', 'data' => []], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function profilePict(Request $request)
    {
        DB::beginTransaction();
        try {
            $path = 'images/profile-picture/';
            $images_thumbnail = $request->images_thumbnail;
            if (isset($images_thumbnail)) {
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
            }
            $newFile = User::where('id', Auth::user()->id)->first();
            $newFile->image = $images_thumbnail_name;
            $newFile->save();

            Session::put('user', $newFile);
            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Image uploaded successfully.',  'redirectTo' => '', 'data' => $images_thumbnail_name], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
    public function updatepass(Request $request)
    {
        DB::beginTransaction();
        try {

            // $user = User::find($request->id);
            $user = User::with('role')->where('id', $request->id)->first();

            if (!$user) {
                return Response::json(['status' => 'error', 'message' => 'Pengguna tidak ditemukan.']);
            }
            // Periksa apakah kata sandi saat ini cocok
            if (!Hash::check($request->current_password, $user->password)) {
                return Response::json(['status' => 'error', 'message' => 'Kata sandi sebelumnya tidak cocok.']);
            }

            if (strlen($request->new_password) < 6) {
                return response()->json(['status' => 'error', 'message' => 'New password must be at least 6 characters.']);
            }
            if ($request->new_password !== $request->confirm_password) {
                return Response::json(['status' => 'error', 'message' => 'New Password And Confirm Password Must Be Same!']);
            }

            // Ubah kata sandi pengguna
            $user->password = Hash::make($request->new_password);
            $user->updated_by = GeneralFunction::myId();
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();

            DB::commit();
            return Response::json(['status' => 'success', 'message' => 'Password updated successfully']);
        } catch (Exception $e) {
            DB::rollBack();
            return Response::json(['status' => 'error', 'message' => 'Oops, something went wrong. Please try again.']);
        }
    }

    public function transactionHistory(Request $request)
    {
        try {
            $draw = $request->get('draw');
            $start = $request->has('start') ? $request->get('start') : 1;
            $length = $request->has('length') ? $request->get('length') : 5;
            $search = $request->has('search') ? json_decode($request->get('search')) : '';

            $order_column = $request->has('order') ? $request->get('order')[0]['column'] : '';
            $order_type = $request->has('order') ? $request->get('order')[0]['dir'] : '';

            $sql_data = Transaction::with('detail.product', 'statusTransaction')->where('user_id', Auth::user()->id)
                ->whereHas('detail.product')
                ->orderBy('created_at', "DESC");

            if (isset($search)) {
                if (isset($search->status) and $search->status != '') {
                    $sql_data->where('status', $search->status);
                }
            }
            if ($request->has('iDisplayStart') && $request->get('iDisplayLength') != '-1') {
                $sql_data = $sql_data->skip($request->get('iDisplayStart'))
                    ->take($request->get('iDisplayLength'));
            }

            $iTotal = $sql_data->count();
            $data = $sql_data->limit($length)
                ->offset($start)
                ->get();

            $output = array(
                "sql" => $sql_data->toSql(),
                "sEcho" => intval($request->get('sEcho')),
                "iTotalRecords" => $iTotal,
                "iTotalDisplayRecords" => $iTotal,
                "aaData" => array()
            );
            foreach ($data as $d) {
                $statusClass = $d->status == '7' ? 'finished-status' : ($d->status == '8' ? 'canceled-status' : 'pending-status');

                $createdAt = Carbon::parse($d->created_at);

                Carbon::setLocale('id');

                $formattedDate = $createdAt->isoFormat('DD MMMM YYYY');

                $formattedDateIndonesian = $createdAt->isoFormat('DD MMMM YYYY', null, 'id');

                $render = view('lolypoly.partials.transaction-list', ['data' => $d, 'statusClass' => $statusClass, 'dateFormat' => $formattedDateIndonesian])->render();
                $row = [
                    'data' => $render
                ];

                $output['aaData'][] = $row;
            }

            $data = array(
                'draw' => $draw,
                'recordsTotal' => $iTotal,
                'recordsFiltered' => $iTotal,
                'data' => $output['aaData'],
            );

            echo json_encode($data);
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
    public function transactionDetail(Request $request)
    {
        try {

            $transaction = Transaction::with('detail.product', 'detail.variant', 'detail.type', 'address', 'statusTransaction','store')->where('user_id', Auth::user()->id)
                ->whereHas('detail.product')->where('id', $request->get('id'))->first();
            $details = $transaction->detail;
            $totalProductPrice = 0;
            foreach($details as $det){
                $totalProductPrice += $det->price;
            }

            $render = view('lolypoly.partials.transaction-detail-product', ['transaction' => $transaction])->render();
            return response()->json(['code' => 200, 'message' => 'Retrieved',  'redirectTo' => '', 'data' => ['transaction' => $transaction, 'render' => $render,'totalProductPrice'=>$totalProductPrice]], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
    public function transactionPickedUp(Request $request)
    {
        DB::beginTransaction();
        try {
            Transaction::where('id', $request->id)->update([
                'status' => '7',
                'finish_at' => Carbon::now(),
                'finish_by' => GeneralFunction::myId(),
            ]);
            DB::commit();
            return response()->json(['code' => 200, 'message' => 'Accepted',  'redirectTo' => 'reload', 'data' => []], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
}
