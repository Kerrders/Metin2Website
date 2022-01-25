@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      @lang('messages.lostPwTitle')
   </div>
   <div class="card-body">
      @include('widgets.alerts')
      <form method="POST" action="{{ route('lostpw') }}">
         @csrf
         <fieldset>
            <input class="form-control" type="text" name="login" placeholder="@lang('messages.accountInput')" maxlength="16" size="16"/><br>
            <input class="form-control" type="text" name="email" placeholder="@lang('messages.emailInput')" maxlength="60"/><br>
            {!! ReCaptcha::htmlFormSnippet([
                "theme" => "dark",
            ]) !!} <br>
            <div class="d-grid col-6 mx-auto">
               <input type="submit" name="submit" class="btn btn-primary" value="@lang('messages.lostPwSubmitButton')"/>
            </div>
         </fieldset>
      </form>
   </div>
</div>
@endsection
