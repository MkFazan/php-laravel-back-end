<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Pages\PageService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    private $pageService;

    /**
     * Create a new controller instance.
     *
     * @param PageService $pageService
     */
    public function __construct(
        //PageService $pageService
    )
    {
        //$this->pageService = $pageService;
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){

//            if(auth()->user()->confirmed==0){
//                Auth::logout();
//                return back()->with('warning', 'Your account has not yet been activated. Please check Your email');
//            }
            if (Auth::check() && Auth::user()->isAdmin()){
                $path = config('app.dashboard_path');
            } else {
                $path = config('app.account_path');
            }
            return redirect($path);
        }else {
            Session::flash('error', 'Адреса електронної пошти або пароль неправильні.');
            return back()->with('warning', 'Address email or/and password are incorrect.');
        }
    }

    public function showLoginForm()
    {
        //$pages = $this->pageService->getAll()->where('status', '=', 1);

        return view('auth.login');
    }
}
