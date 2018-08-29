@extends('master')

@section('content')
{{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <h2>
                        Register
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
                        <button type="submit" class="btn btn-info m-t-15 waves-effect">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
