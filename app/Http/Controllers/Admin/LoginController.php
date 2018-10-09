<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\admin\Role;
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

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    

    public function showLoginForm()
    {
        return view('admin.adminlogin');
    }


    public function login(Request $request)
    {   //dd($request->all());
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    protected function credentials(Request $request)
    {//dd($request->all());
        $admin = Admin::where('email',$request->email)->first();
        if($admin){
            if ($admin->status == 0) {
            return ['email'=>'inactive', 'password'=>'You are not active please, contact super admin']; 
            }else{

             return ['email'=>$request->email, 'password'=>$request->password, 'status' => 1];
        }
    }
    return $request->only($this->username(),'password');
}

    protected function sendFailedLoginResponse(Request $request)
    {
        //$errors = [$this->username() => trans('auth.failed')];
       // dd($request->all());
        $fields = $this->credentials($request);
        //dd($fields);
        if ($fields['email']=='inactive') {
            $errors = $fields['password'];
        }else{
            $errors = [$this->username() => trans('auth.failed')];
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}

