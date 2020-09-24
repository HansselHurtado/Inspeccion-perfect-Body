<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


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

    protected function credentials(Request $request)
    {
        $login = $request->input($this->username());
        // Comprobar si el input coincide con el formato de E-mail
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return [
            $field => $login,
            'password' => $request->input('password')
        ];
    }
    
    public function username()
    {
        return 'login';
    }

    /*public function login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'username' => $request->username,'password' => $request->password], $request->get('remember'))){

            return Redirect('home');
        }

        return redirect()->route('login')->with('message4', 'Usuario o Contraseña incorrecta');
    }
*/
    public function logout(){
        Auth::logout();
        return redirect('login')->with('message5', 'Sesion cerrada Correctamente');
    }
}
