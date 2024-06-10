<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Brian2694\Toastr\Facades\Toastr;

class LoginuserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
    }

    public function loginuser()
    {
        return view('auth.loginuser');
    }

    public function authenticate(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $email = $request->email;
    $password = $request->password;

    // Attempt to authenticate user
    if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 'Active'])) {
        Toastr::success('Login successfully :)', 'Success');

        // Check user role and redirect accordingly
        if (Auth::user()->role === 'admin') {
            return redirect()->intended('admin');
        } else {
            return redirect()->intended('homeuser');
        }
    } elseif (Auth::attempt(['email' => $email, 'password' => $password, 'status' => null])) {
        Toastr::success('Login successfully :)', 'Success');

        // Check user role and redirect accordingly
        if (Auth::user()->role === 'admin') {
            return redirect()->intended('admin');
        } else {
            return redirect()->intended('homeuser');
        }
    } else {
        Toastr::error('Fail, WRONG USERNAME OR PASSWORD :)', 'Error');
        return redirect('login');
    }
}

    public function logout()
    {
        Auth::logout();
        Toastr::success('Logout successfully :)','Success');
        return redirect('login');
    }

}
