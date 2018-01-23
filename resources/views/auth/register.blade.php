@extends('layouts.app')

@section('title')
Sign up
@endsection

@section('register')
active
@endsection 

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="display: block;margin: auto;">
                <h4 style="text-align: center;margin: 30px 5px 18px 5px;">Register</h4>
                <div>
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail Address</label>                            
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                              <input type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" id="latitude" name="latitude" placeholder="Latitude">
                              @if ($errors->has('latitude'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('latitude') }}
                                </div>
                              @endif
                            </div>
                            <div class="form-group col">
                              <input type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" id="longitude" name="longitude" placeholder="Longitude">
                              @if ($errors->has('longitude'))
                              <div class="invalid-feedback">
                                  {{ $errors->first('longitude') }}
                              </div>
                              @endif
                            </div>
                            <div class="form-group col-md-3">
                                <button class="btn btn-light" id="get-location">
                                    Get Location
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection