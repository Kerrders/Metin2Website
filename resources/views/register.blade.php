@extends('layouts.app')

@section('content')
<div class="panel-heading">
   <h2>Registration</h2>
</div>
<div class="panel-body">
   <div class="con-wrapper">
      @if($errors->any())
         <div class="alert alert-primary" role="alert">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
         </div>
      @endif
      <form id="msform" method="POST" action="{{ route('createAccount') }}">
         @csrf
         <ul id="progressbar">
            <li class="active">Account</li>
            <li>Sicherheit</li>
            <li>Captcha</li>
         </ul>
         <fieldset>
            <h4 class="fs-title">Account <i class="fas fa-user-circle"></i></h4>
            <input type="text" name="login" placeholder="Account" maxlength="16" size="16"/><br>
            <input type="password" name="password" id="pass" placeholder="Passwort" maxlength="16" size="16"/><br>
            <input type="password" name="password_confirmation" id="pass2" placeholder="Passwort wiederholen" maxlength="16" size="16"/><br>
            <input type="text" name="email" placeholder="E-Mail" maxlength="60"/><br><br>
            <button  class="next action-button">Next <i class="fas fa-chevron-circle-right"></i></button>
            <h4 class="fs-title">Sicherheit <i class="fas fa-lock"></i></h4>
            <input type="text" name="social_id" placeholder="Löschcode" maxlength="7" size="7"/><br>
            <button type="button" name="previous" class="previous action-button-previous"><i class="fas fa-chevron-circle-left"></i> Back</button>
            <button type="button" name="next" class="next action-button">Next <i class="fas fa-chevron-circle-right"></i></button>
            <h4 class="fs-title">Captcha <i class="fas fa-shield-alt"></i></h4>
            <div class="captchaHolder">
               <div class="g-recaptcha" data-sitekey="6Lej_pAUAAAAALR5XZnnM8nch-TkxKDzEdig9-22"></div>
            </div>
            <br>
            <button type="button" name="previous" class="previous action-button-previous"><i class="fas fa-chevron-circle-left"></i> Back</button>
            <input type="submit" name="submit" class="submit action-button" value="Submit"/>
         </fieldset>
      </form>
   </div>
</div>
<div class="content_footer"></div>
@endsection
