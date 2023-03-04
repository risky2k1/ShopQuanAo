<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $data = Socialite::driver($provider)->user();

        $user       = User::query()
            ->where('email', $data->getEmail())
            ->first();
        $checkExist = true;

        if (is_null($user)) {
            $user        = new User();
            $user->email = $data->getEmail();
            $checkExist  = false;
        }

        $user->name   = $data->getName();

        auth()->login($user, true);

        if ($checkExist) {
            return redirect()->route("quan-tri.index");
        }
        return redirect()->route('register');
    }

    public function registering(Request $request)
    {
        $password = Hash::make(request('password'));
        if (auth()->check()) {
            User::where('id', auth()->user()->id)
                ->update([
                    'password' => $password,
                ]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
            ]);
            Auth::login($user);
        }

        return redirect()->route('quan-tri.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
