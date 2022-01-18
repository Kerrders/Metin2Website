<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAccount;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:8|max:40',
            'social_id' => 'required|numeric|digits:7',
            'login' => 'required|min:5|unique:account,login|max:16',
        ]);

        $account = Account::create([
            'login' => $data['login'],
            'password' => hash('sha256', $data['password']),
            'email' => $data['email'],
            'social_id' => $data['social_id'],
            'status' => env('REGISTER_MAIL_VERIFICATION', true) ? 'VERIFY' : 'OK'
        ]);

        if(env('REGISTER_MAIL_VERIFICATION', true)) {
            $token = Str::random(50);
            Cache::forever($account->id, $token);

            Mail::to($request->email)->send(
                (new VerifyAccount($request->login, $account->id, $token))->afterCommit()
            );
        }

        return $account;
    }

    /**
     * Verify e-mail of account
     */
    public function verifyEmail(int $id, string $hash)
    {
        $token = Cache::get($id);
        if($token === $hash) {
            $account = Account::find($id);
            $account->status = 'OK';
            $account->save();
            Auth::loginUsingId($account->id, true);
            Cache::forget($id);
            return Redirect('home')->with('success', 'Verification: Account erfolgreich verifiziert');
        }
        return Redirect('home')->with(['error' => 'Verification: The link is invalid']);
    }
}
