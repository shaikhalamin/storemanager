@extends('master')

@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header bg-teal">
                    <h2 class="align-center">
                        Register User
                    </h2>
                </div>
                <div class="body">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <label for="email_address">Name</label>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="form-line">
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                            </div>
                            @if ($errors->has('name'))
                                <small class="alert alert-danger">
                                    {{ $errors->first('name') }}
                                </small>
                            @endif
                        </div>

                        <label for="username_address">Username</label>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <div class="form-line">
                                <input type="text" id="username" class="form-control" name="username" value="{{ old('username') }}" placeholder="Enter your username">
                            </div>
                            @if ($errors->has('username'))
                                <small class="alert alert-danger">
                                    {{ $errors->first('username') }}
                                </small>
                            @endif
                        </div>

                        <label for="email_address">Email Address</label>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="form-line">
                                <input type="email" id="email_address" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email address">
                            </div>
                            @if ($errors->has('email'))
                                <small class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </small>
                            @endif
                        </div>
                        <label for="password">Password</label>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="form-line">
                                <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password">
                            </div>
                            @if ($errors->has('password'))
                            <small class="alert alert-danger">
                                {{ $errors->first('password') }}
                            </small>
                            @endif
                        </div>

                        <label for="password">Confirm Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirm your password">
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn bg-teal m-t-15 waves-effect">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
