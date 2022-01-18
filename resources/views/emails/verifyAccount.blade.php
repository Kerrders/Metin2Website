@component('mail::message')
# Account verification

The body of your message.

@component('mail::button', ['url' => route('verify', ['id' => $id, 'hash' => $token])])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
