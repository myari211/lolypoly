<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Helpers\GeneralFunction;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

use Session;
use App\Helpers\GeneralFuntion;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        $this->data['data_config'] = '';

        return view('admin.auth.login.index', $this->data);
    }

    public function checkRegister(Request $request)
    {
        try {
            $check_email = User::where('email', $request->register_email)->first();
            if (isset($check_email)) {
                return response()->json(['code' => 404, 'message' => 'Email Has Been Registerd', 'error_message' => ['register_email' => 'Email Has Been Registerd'], 'redirectTo' => '', 'data' => array()], 200);
            }
            if ($request->register_password_confirm != $request->register_password) {
                return response()->json(['code' => 404, 'message' => 'Password And Confirm Password Must Be Same!', 'error_message' => ['register_password' => 'Password And Confirm Password Must Be Same!', 'register_password_confirm' => 'Password And Confirm Password Must Be Same!'], 'redirectTo' => '', 'data' => array()], 200);
            }
            $data = array(
                'name' => $request->register_name,
                'email' => $request->register_email,
                'password' => Hash::make($request->register_password),
                'type_user' => 'CUST',
                'active' => '0',
            );
            $result = User::create($data);
            $id_encode = base64_encode(json_encode($data));
            $data['link_url'] = url('/email-verification') . '/' . $id_encode;
            Mail::send('emailverification', $data, function ($message) use ($data) {
                $message->subject('Email Verification');
                // $message->from('support@idtech.com', 'IDtech');
                $message->to($data['email'], $data['name']);
            });
            $message = 'Successfully Register, Plase Check Your Email For verify!';
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => 'reload', 'data' => $result], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function emailVerification($id_encode)
    {
        try {
            $id = json_decode(base64_decode($id_encode));
            $email = $id->email;
            $check = User::where('email', $email)
                ->first();
            $data = array(
                'active' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $result = User::where('id', $check->id)
                ->update($data);
            $message = 'Successfully Updated Data';
            return Redirect::route('lolypoly.home');
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function forgotPassword(Request $request)
    {
        try {
            $data = array(
                'name' => $request->customer_email,
                'email' => $request->customer_email,
            );
            $id_encode = base64_encode(json_encode($data));
            $data['link_url'] = url('/change-password') . '/' . $id_encode;
            Mail::send('forgotpasswordemail', $data, function ($message) use ($data) {
                $message->subject('Change Password');
                $message->to($data['email'], $data['name']);
            });
            $message = 'Successfully Sent, Plase Check Your Email For change of password link!';
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => 'reload', 'data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function changePasswordIndex($id_encode)
    {
        $data = json_decode(base64_decode($id_encode));
        $email = $data->email;
        return view('changepassword', compact('email'));
    }

    public function changePassword(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json(['code' => 500,  'message' => 'Pengguna tidak ditemukan.', 'redirectTo' => '', 'data' => []], 200);
            }

            if (strlen($request->new_password) < 6) {
                return response()->json(['code' => 500,  'message' => 'New password must be at least 6 characters.', 'redirectTo' => '', 'data' => []], 200);
            }
            if ($request->new_password !== $request->confirm_password) {
                return response()->json(['code' => 500,  'message' => 'New Password And Confirm Password Must Be Same!', 'redirectTo' => '', 'data' => []], 200);
            }

            // Ubah kata sandi pengguna
            $user->password = Hash::make($request->new_password);
            $user->updated_by = $user->id;
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();

            $message = 'Password updated successfully';
            $redirectTo = route('lolypoly.home');
            DB::commit();
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => $redirectTo, 'data' => $user], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
}
