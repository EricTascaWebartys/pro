<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class SecurityController extends Controller
{
    public function login() {

        return view('front.login');
    }

    public function login_post(Request $request) {
        $credentials = $request->only('email', 'password');
        sleep(1);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {
        return redirect()->intended('dashboard');
        }
        return back()->withInput()->withErrors([
            'email' => 'Identifiant incorrect.',
            'active' => 'Compte désactivé.',
        ]);
    }

    public function logout(Request $request) {
        Auth::user()->is_connected = null;
        Auth::user()->save();
        Auth::logout();
        return redirect()->route('homepage');
    }

    // public function pre_logout() {
    //     Auth::user()->is_connected = null;
    //     Auth::user()->save();
    //     return redirect()->route('logout');
    // }

    public function reset_password() {
        return view("front.reset_password",[

        ]);
    }

    public function reset_password_post(Request $request) {
        $validator = Validator::make(
            [
                'email' => $request->email,
            ],
            [
                'email' => 'required',
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if($user === null) return redirect()->route('result', ["value" => "erreur"]);
        $user->reset = uniqid('reset-', 60);
        $user->save();
        $data = [
            'email' => $request->email,
            'token' => $user->reset,
        ];
        // dd($data['token']);
        Mail::to($request->email)->send(new ResetPasswordMail($data));
        return redirect()->route('result', ["value" => 'reset_password']);
    }
    public function reset_password_form($token) {
        $user = User::where('reset', $token)->first();
        if($user === null) return redirect()->route('homepage');
        return view("front.reset_password_form",[
            'reset_token' => $token
        ]);
    }

    public function reset_password_form_post(Request $request) {
        $validator = Validator::make(
            [
                'password' => $request->password,
                'password_confirm' => $request->password_confirm,
            ],
            [
                'password' => 'required|min:8',
                'password_confirm' => 'required|same:password',
            ]
        );
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $user = User::where("reset", $request->reset_token)->first();
        if($user === null) return redirect()->route('homepage');
        $user->reset = null;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('result', ["value" => 'reset_password_confirm']);
    }
}
