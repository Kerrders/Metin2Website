@extends('layouts.app')

@section('content')
@if (Auth::check())
  Eingeloggt
@else
  Ausgeloggt
@endif
@endsection
