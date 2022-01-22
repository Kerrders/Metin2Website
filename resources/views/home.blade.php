@extends('layouts.app')

@section('content')
@include('widgets.alerts')


@if (Auth::check())
  Eingeloggt
@else
  Ausgeloggt
@endif
@endsection
