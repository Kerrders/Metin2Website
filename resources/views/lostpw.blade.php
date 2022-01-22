@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      Lost password
   </div>
   <div class="card-body">
      @include('widgets.alerts')
      <form method="POST" action="{{ route('lostpw') }}">
         @csrf
         <fieldset>
            <input class="form-control" type="text" name="login" placeholder="Account" maxlength="16" size="16"/><br>
            <input class="form-control" type="text" name="email" placeholder="E-Mail" maxlength="60"/><br>
            <div class="d-grid col-6 mx-auto">
               <input type="submit" name="submit" class="btn btn-primary" value="Reset password"/>
            </div>
         </fieldset>
      </form>
   </div>
</div>
@endsection
