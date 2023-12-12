<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request) {
        $req = $request->all();
        $email = $req['email'];
        $user = User::where('email',$email)->first();
        if ($user){
            Auth::login($user);
            $person = DB::select('select * from person_role_view where per_email = ?',[$email]);
            foreach ($person as $role) {
                if ($role->role_name != "Member") {
                    $user->assignRole($role->role_name);
                }
                else {
                    $user->assignRole("Member");
                }
            }

        }
        return redirect()->route('home');
    }
}
