@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      Lost password
   </div>
   <div class="card-body">
      @if($errors->any())
        <div class="alert alert-primary" role="alert">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
      @endif
      @if (\Session::has('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ \Session::get('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif
      @if (\Session::has('error'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
         {{ \Session::get('error') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif
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
