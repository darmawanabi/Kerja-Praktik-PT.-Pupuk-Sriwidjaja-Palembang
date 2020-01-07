@extends('layouts/master')

@section('content')
@if(auth()->user()->role == 'access_user')
    <h1>Dashboard Full Access User</h1>
@endif
@stop