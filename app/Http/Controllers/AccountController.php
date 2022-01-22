<?php

namespace App\Http\Controllers;

use App\Helpers\AccountHelper;
use App\Mail\LostPassword;
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
     * Create an account
     *
     * @param Request $request
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
            'password' => AccountHelper::passwordHash($data['password']),
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

        return Redirect('register')->with('success', __('messages.responseAccountCreated'));
    }

    /**
     * Verify e-mail of account
     * 
     * @param int $id
     * @param string $hash
     */
    public function verifyEmail(int $id, string $hash)
    {
        $token = Cache::get($id);
        if($token === null || $token !== $hash) {
            return Redirect('home')->with('error', __('messages.responseValidationWrong'));
        }

        $account = Account::find($id);
        $account->status = 'OK';
        $account->save();
        Auth::loginUsingId($account->id, true);
        Cache::forget($id);

        return Redirect('home')->with('success', __('messages.responseValidationSuccesfully'));
    }

    /**
     * Reset password
     * 
     * @param Request $request
     */
    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email|max:255',
            'login' => 'required|min:5|max:16',
        ]);

        $account = Account::where('login', '=', $data['login'])->where('email', '=', $data['email'])->first();
        if($account === null) {
            return Redirect('lostpw')->with('error',  __('messages.responseUserNotFound'));
        }
        $newPassword = Str::random(8);
        $account->password = AccountHelper::passwordHash($newPassword);
        $account->save();

        Mail::to($data['email'])->send(
            (new LostPassword($account->login, $newPassword))->afterCommit()
        );

        return Redirect('lostpw')->with('success', __('messages.responseLostPwEmailSent'));
    }

    /**
     * Change password
     * 
     * @param Request $request
     */
    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'oldPassword' => 'required|string|min:8|max:40',
            'password' => 'required|string|confirmed|min:8|max:40',
        ]);

        $account = Account::where('id', '=', Auth::id())->where('password', '=', AccountHelper::passwordHash($data['oldPassword']))->first();
        if($account === null) {
            return Redirect('password')->with('error', __('messages.responseWrongPassword'));
        }
        $account->password = AccountHelper::passwordHash($data['password']);
        $account->save();
        
        return Redirect('password')->with('success', __('messages.responsePasswordChanged'));
    }
}
