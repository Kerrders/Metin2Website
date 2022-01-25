<?php

namespace App\Http\Controllers;

use App\Helpers\AccountHelper;
use Session;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if($account === null) {
            return Redirect('home')->with('error', 'Account or password wrong');
        }

        if(Auth::loginUsingId($account->id, true)){
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
