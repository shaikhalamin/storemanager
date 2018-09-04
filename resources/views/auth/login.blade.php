@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header bg-teal">
                    <h2 class="align-center">
                        {{ config('app.name') }} Login
                    </h2>
                </div>
                <div class="body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
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

                        <br>
                        <button type="submit" class="btn bg-teal m-t-15 waves-effect">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
