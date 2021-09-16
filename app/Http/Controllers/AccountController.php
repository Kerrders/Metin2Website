<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Register view
     *
     * @return void
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Create an account
     *
     * @param array $data
     * @return void
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'login' => 'required|min:5|unique:accounts, login|max:16',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:8|max:40',
            'social_id' => 'required|number|min:7|max:7',
        ]);

        return Account::create([
            'login' => $data['login'],
            'password' => hash(MHASH_SHA256, $data['password']),
            'email' => $data['email'],
            'social_id' => $data['social_id'],
        ]);
    }
}
