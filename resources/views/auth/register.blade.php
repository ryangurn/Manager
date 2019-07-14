@extends('layouts.layout')

@section('title', 'Register')

@section('sidebar-about')
    @parent

    @section('sidebar-about-title', 'Register')
    @section('sidebar-about-content')
        Please register for an account to access the {{ config('app.name')  }} Manager.
    @endsection
@stop

@section('content-main')
    <form action="{{ route('register')  }}" method="POST">
        @csrf

        <h2>Register</h2>
        <div class="form-group">
            <div class="floating-label textfield-box">
                <label for="firstname">First Name</label>
                <input aria-describedby="firstnameHelp" class="form-control @if($errors->has('firstname')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('firstname')) is-valid @endif" name="firstname" id="firstname" placeholder="First Name" type="text" />
                <small id="firstnameHelp" class="form-text text-muted">Please provide your first name.</small>

                @if ($errors->has('firstname'))
                    <div class="invalid-tooltip">
                        {{ $errors->first('firstname')  }}
                    </div>
                @else
                    <div class="valid-tooltip">
                        All good!
                    </div>
                @endif

            </div>
        </div>

        <div class="form-group">
            <div class="floating-label textfield-box">
                <label for="lastname">Last Name</label>
                <input aria-describedby="lastnameHelp" class="form-control @if($errors->has('lastname')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('lastname')) is-valid @endif" name="lastname" id="lastname" placeholder="Last Name" type="text" />
                <small id="lastnameHelp" class="form-text text-muted">Please provide your last name.</small>

                @if ($errors->has('lastname'))
                    <div class="invalid-tooltip">
                        {{ $errors->first('lastname')  }}
                    </div>
                @else
                    <div class="valid-tooltip">
                        All good!
                    </div>
                @endif

            </div>
        </div>

        <div class="form-group">
            <div class="floating-label textfield-box">
                <label for="email">Email</label>
                <input aria-describedby="emailHelp" class="form-control @if($errors->has('email')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('email')) is-valid @endif" name="email" id="email" placeholder="Email" type="text" />
                <small id="emailHelp" class="form-text text-muted">Please provide your full email address.</small>

                @if ($errors->has('email'))
                    <div class="invalid-tooltip">
                        {{ $errors->first('email')  }}
                    </div>
                @else
                    <div class="valid-tooltip">
                        All good!
                    </div>
                @endif

            </div>
        </div>

        <div class="form-group">
            <div class="floating-label textfield-box">
                <label for="password">Password</label>
                <input aria-describedby="passwordHelp" class="form-control @if($errors->has('password')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('password')) is-valid @endif" name="password" id="password" placeholder="Password" type="password" />
                <small id="passwordHelp" class="form-text text-muted">Please provide your password for your account.</small>

                @if ($errors->has('password'))
                    <div class="invalid-tooltip">
                        {{ $errors->first('password')  }}
                    </div>
                @else
                    <div class="valid-tooltip">
                        All good!
                    </div>
                @endif

            </div>
        </div>

        <div class="form-group">
            <div class="floating-label textfield-box">
                <label for="password_confirmation">Confirm Password</label>
                <input aria-describedby="passwordConfirmationHelp" class="form-control @if($errors->has('password_confirmation')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('password_confirmation')) is-valid @endif" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" type="password" />
                <small id="passwordConfirmationHelp" class="form-text text-muted">Please confirm the password that you want to set.</small>

                @if ($errors->has('password_confirmation'))
                    <div class="invalid-tooltip">
                        {{ $errors->first('password_confirmation')  }}
                    </div>
                @else
                    <div class="valid-tooltip">
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
