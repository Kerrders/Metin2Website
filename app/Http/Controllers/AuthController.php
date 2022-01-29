<?php

namespace App\Http\Controllers;

use App\Helpers\AccountHelper;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    /**
     * Login
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'login' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $account = Account::where('login', '=', $data['login'])->where('password', '=', AccountHelper::passwordHash($data['password']))->first();
        if ($account === null) {
            return Redirect('home')->with('error', 'Account or password wrong');
        }

        if ($account->status === 'VERIFY') {
            return Redirect('home')->with('error', 'You need to verify your account');
        }

        if ($account->status !== 'OK') {
            return Redirect('home')->with('error', 'You are not allowed to log in');
        }

        if (Auth::loginUsingId($account->id, true)) {
            return Redirect('home');
        }
    }

    /**
     * Logout
     *
     * @return void
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('home');
    }
}
