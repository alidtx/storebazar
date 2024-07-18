<?php

namespace App\Modules\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Retailer\Entities\Retailer;

class LoginController extends Controller
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
        $this->middleware('guest')->except('logout');
    }

    public function customerLogin(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'mobile' => 'required',
                'password' => 'required|min:6',
            ]
        );


        if ($validator->fails()) {
            return $this->ajaxResponse(422, __('frontError.The given data is invalid.'), $validator->errors(), []);
        }
        $credentials = $request->only('mobile', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->user_type == "customer" || "seller") {
                return $this->ajaxResponse(200, __('frontError.Login Successfull.'), [], []);
            }
        } else {
            return $this->ajaxResponse(422, __('frontError.Invalid Credentials.'), [], []);
        }
    }

    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();

    //     $request->session()->invalidate();
    // }
}
