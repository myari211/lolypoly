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

use Session;
use App\Helpers\GeneralFuntion;

class LoginController extends Controller
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

    public function checkLogin(Request $request)
    {
        try {
            $check = User::with('role')->where('email', $request->username)->first();
            $checkPhone = User::with('role')->where('phone_number', $request->username)->first();
            if ($check) {
                $redirectTo = GeneralFunction::redirectCheck($check->type_user,$request->redirect_to);
                if ($check->active == 0) {
                    return response()->json(['code' => 401, 'message' => 'Akun Tidak Terdaftar.'], 200);
                } elseif ($check->active == 2) {
                    return response()->json(['code' => 401, 'message' => 'Mohon menunggu Approval oleh Admin.'], 200);
                } elseif (Hash::check($request->password, $check->password)) {
                    $credentials = [
                        'email' => $request->username,
                        'password' => $request->password
                    ];
                    if (Auth::attempt($credentials)) {
                        $request->session()->regenerate();
                        Session::put('user', $check);
                        return response()->json(['code' => 200, 'message' => 'Login Success',  'redirectTo' => $redirectTo, 'data' => []], 200);
                    } else {
                        return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
                    }
                    return response()->json(['code' => 200, 'message' => 'Login Success',  'redirectTo' => $redirectTo, 'data' => []], 200);
                } else {
                    return response()->json(['code' => 401, 'message' => 'Password Salah'], 200);
                }
            } else if ($checkPhone) {
                $redirectTo = GeneralFunction::redirectCheck($checkPhone->type_user);
                if (Hash::check($request->password, $checkPhone->password)) {
                    $credentials = [
                        'phone_number' => $request->username,
                        'password' => $request->password
                    ];
                    if (Auth::attempt($credentials)) {
                        $request->session()->regenerate();
                        Session::put('user', $check);
                        return response()->json(['code' => 200, 'message' => 'Login Success', 'redirectTo' => $redirectTo, 'data' => []], 200);
                    } else {
                        return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
                    }
                } else {
                    return response()->json(['code' => 401, 'message' => 'Password Salah'], 200);
                }
            } else {
                return response()->json(['code' => 404, 'message' => 'Akun Tidak Terdaftar.'], 200);
            }
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('lolypoly.home');
    }
}
