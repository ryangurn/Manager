@extends('layouts.layout')

@section('title', 'Login')

@section('sidebar-about')
    @parent

    @section('sidebar-about-title', 'Login')
    @section('sidebar-about-content')
        {{ config('app.name')  }} Members can easily login here.<br /><br />
        If you are a new member <a href="{{ route('register')  }}">click here</a>.<br />
        If you cannot remember your password <a href="{{ route('password.request')  }}">click here</a>.<br />


    @endsection

@stop

@section('content-main')
    {!! dump(request()) !!}
    <form action="{{ route('login')  }}" method="POST">
    @csrf

        {!! dump($errors) !!}

        <h2>Login</h2>
        <div class="form-group">
            <div class="floating-label textfield-box">
                <label for="email">Email</label>
                <input aria-describedby="emailHelp" class="form-control" name="email" id="email" placeholder="Email" type="email" />
                <small id="emailHelp" class="form-text text-muted">Please provide your email address.</small>

                @if ($errors->has('email'))
                    <div class="invalid-feedback is-invalid">
                        {{ $errors->first('email')  }}
                    </div>
                @else
                    <div class="valid-feedback is-valid">
                        All good!
                    </div>
                @endif

            </div>
        </div>

        <div class="form-group">
            <div class="floating-label textfield-box">
                <label for="password">Password</label>
                <input aria-describedby="passwordHelp" class="form-control" name="password" id="password" placeholder="Password" type="password" />
                <small id="passwordHelp" class="form-text text-muted">Please provide your account password.</small>

                @if ($errors->has('password'))
                    <div class="invalid-feedback is-invalid">
                        {{ $errors->first('password')  }}
                    </div>
                @else
                    <div class="valid-feedback is-valid">
                        All good!
                    </div>
                @endif

            </div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="hidden" name="remember" value="0" />
                <input class="form-check-input" name="remember" type="checkbox" value="1" id="remember">
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
                <small id="passwordHelp" class="form-text text-muted">Do you want us to remember that you are signed in?</small>

                @if ($errors->has('remember'))
                    <div class="invalid-feedback is-invalid">
                        {{ $errors->first('remember')  }}
                    </div>
                @else
                    <div class="valid-feedback is-valid">
                        All good!
                    </div>
                @endif

            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="form-control btn btn-light my-1" value="Submit">
        </div>
    </form>
@endsection
