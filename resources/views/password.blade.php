@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      Password
   </div>
   <div class="card-body">
      @include('widgets.alerts')
      <form method="POST" action="{{ route('password') }}">
         @csrf
         <fieldset>
            <input class="form-control" type="password" name="oldPassword"  placeholder="Old password" maxlength="16" size="16"/><br>
            <input class="form-control" type="password" name="password"  placeholder="New password" maxlength="16" size="16"/><br>
            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm" maxlength="16" size="16"/><br>
            <div class="d-grid col-6 mx-auto">
               <input type="submit" name="submit" class="btn btn-primary" value="Change password"/>
            </div>
         </fieldset>
      </form>
   </div>
</div>
@endsection
