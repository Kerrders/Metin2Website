<?php

namespace App\Http\Controllers;

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
        ]);
   
        $account = Account::where('login', '=', $data['login'])->where('password', '=', hash(MHASH_SHA256, $data['password']))->first();

        if(is_null($account) || Auth::loginUsingId($account->id)){
            return redirect('home');
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
