@extends('layouts.app')

@section('content')
<div class="panel-heading">
   <h2>Registration</h2>
</div>
<div class="panel-body">
   <div class="con-wrapper">
      <form id="msform" method="POST" action="">
         <ul id="progressbar">
            <li class="active">Account</li>
            <li>Sicherheit</li>
            <li>Captcha</li>
         </ul>
         <fieldset>
            <h4 class="fs-title">Account <i class="fas fa-user-circle"></i></h4>
            <input type="text" name="account" placeholder="Account" maxlength="16" size="16"/><br>
            <input type="text" name="uname" placeholder="Name" maxlength="16" size="16"/><br>
            <input type="password" name="pass" id="pass" placeholder="Passwort" maxlength="16" size="16"/><br>
            <input type="password" name="pass2" id="pass2" placeholder="Passwort wiederholen" maxlength="16" size="16"/><br>
            <input type="text" name="email" placeholder="E-Mail" maxlength="60"/><br><br>
            <button  class="next action-button">Next <i class="fas fa-chevron-circle-right"></i></button>
         </fieldset>
         <fieldset>
            <h4 class="fs-title">Sicherheit <i class="fas fa-lock"></i></h4>
            <input type="text" name="loeschcode" placeholder="Löschcode" maxlength="7" size="7"/><br>
            <select name="sicherheitsf" id="sicherheitsf">
               <option value="1">Name deiner Tante?</option>
            </select>
            <br>
            <input type="text" name="sicherheitsa" placeholder="Sicherheitsantwort" maxlength="16" size="16"/><br><br>
            <button type="button" name="previous" class="previous action-button-previous"><i class="fas fa-chevron-circle-left"></i> Back</button>
            <button type="button" name="next" class="next action-button">Next <i class="fas fa-chevron-circle-right"></i></button>									
         </fieldset>
         <fieldset>
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