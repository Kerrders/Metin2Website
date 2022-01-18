@component('mail::message')
# Account verification

Hello <b>{{ $name }}</b>, <br>
Please confirm your new account

@component('mail::button', ['url' => route('verify', ['id' => $id, 'hash' => $token])])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
