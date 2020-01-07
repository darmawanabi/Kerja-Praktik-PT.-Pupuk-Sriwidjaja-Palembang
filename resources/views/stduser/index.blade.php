@extends('layouts/master')

@section('content')
@if(auth()->user()->role == 'std_user')
    <h1>Dashboard Standard User</h1>
@endif  
@stop