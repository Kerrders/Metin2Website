@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      @lang('messages.registerTitle')
   </div>
   <div class="card-body">
      @include('widgets.alerts')
      <form id="msform" method="POST" action="{{ route('createAccount') }}">
         @csrf
         <fieldset>
            <input class="form-control" type="text" name="login" placeholder="@lang('messages.accountInput')" maxlength="16" size="16"/><br>
            <input class="form-control" type="password" name="password" id="pass" placeholder="@lang('messages.passwordInput')" maxlength="16" size="16"/><br>
            <input class="form-control" type="password" name="password_confirmation" id="pass2" placeholder="@lang('messages.repeatPasswordInput')" maxlength="16" size="16"/><br>
            <input class="form-control" type="text" name="email" placeholder="@lang('messages.emailInput')" maxlength="60"/><br>
            <input class="form-control" type="text" name="social_id" placeholder="@lang('messages.deletionCode')" maxlength="7" size="7"/><br>
            <div class="d-grid col-6 mx-auto">
               <input type="submit" name="submit" class="btn btn-primary" value="@lang('messages.registerButton')"/>
            </div>
         </fieldset>
      </form>
   </div>
</div>
@endsection
