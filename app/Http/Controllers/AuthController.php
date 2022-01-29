<?php

namespace App\Http\Controllers;

use App\Helpers\AccountHelper;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'recaptcha',
        ]);

        if ($validator->fails()) {
            return Redirect('home')->with('loginError', $validator->getMessageBag()->all());
        }

        $data = $validator->validated();
        $account = Account::where('login', '=', $data['login'])->where('password', '=', AccountHelper::passwordHash($data['password']))->first();
        if ($account === null) {
            return Redirect('home')->with('loginError', __('messages.responseWrongAccountOrPassword'));
        }

        if ($account->status === 'VERIFY') {
            return Redirect('home')->with('loginError', __('messages.responseNeedVerifiedAccount'));
        }

        if ($account->status !== 'OK') {
            return Redirect('home')->with('loginError', __('messages.responseWrongLoginStatus'));
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
