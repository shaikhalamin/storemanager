@extends('layouts.backend.app')

@section('content')


    <h1>You are logged in! <strong>{{ Auth::user()->name }}</strong></h1>
                
@endsection