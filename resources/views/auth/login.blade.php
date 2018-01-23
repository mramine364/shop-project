@extends('layouts.app')

@section('title')
Sign in
@endsection

@section('login')
active
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="display: block;margin: auto;">
                <h4 style="text-align: center;margin: 30px 5px 18px 5px;">Login</h4>
                <div>
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
