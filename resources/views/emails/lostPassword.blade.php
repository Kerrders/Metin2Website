@component('mail::message')
# Password reset

Hello <b>{{ $name }}</b>, <br>
below you can find your new password:
<div class="alert alert-dark" role="alert">
    <h2 style="text-align:center;border: 1px solid;">{{ $newPassword }}</h2>
</div>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
