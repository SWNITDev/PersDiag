<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

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

    public function redirectToProvider()
    {
        //NEWNEWNEW
        //Hier wird die SSO Login Seite aufgerufen. Bug: Seite lädt erst nach einmal Neuladen (F5)
        //NEWNEWNEW
        return Socialite::driver('azure')->stateless()->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            //NEWNEWNEW
            //Hier wird das User-Objekt zurückgegeben. Hier muss noch an dem Return gearbeitet werden, so dass man wieder auf der Home-Seite landet.
            //NEWNEWNEW
            $user = Socialite::driver('azure')->stateless()->user();

            return response()->json([
                'id' => $user->getId(),
                ]);

            //NEWNEWNEW
            //So kommt man auf die Startseite zurück
            //NEWNEWNEW
            
            //return redirect('/');
            
        } catch (\Exception $e) {
            //NEWNEWNEW
            //Fehlerbehandlung. Ist noch nicht schön, aber wirft den Fehler...
            //NEWNEWNEW
            return $e;
        }
    }
}
