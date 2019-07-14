@extends('layouts.layout')

@section('title', 'Reset Password')

@section('sidebar-about')
    @parent

    @section('sidebar-about-title', 'Reset Password')
    @section('sidebar-about-content')
    If you have forgotten your password please utilize this page to regain access to your account.
    @endsection
@stop

@section('content-main')
    <form action="{{ route('password.update')  }}" method="POST" >
        <input type="hidden" name="token" value="{{ $token }}">
        @csrf
        <h2>Reset Password</h2>
        <div class="form-group">
            <div class="floating-label textfield-box">
                <label for="email">Email</label>
                <input aria-describedby="emailHelp" class="form-control @if($errors->has('email')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('email')) is-valid @endif" name="email" id="email" placeholder="Email" type="email" value="{{ $email ?? old('email') }}" />
                <small id="emailHelp" class="form-text text-muted">Please provide your email address.</small>

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
                <small id="passwordHelp" class="form-text text-muted">Please provide the new password for your account.</small>

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
                <input aria-describedby="password_confirmationHelp" class="form-control @if($errors->has('password_confirmation')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('password_confirmation')) is-valid @endif" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" type="password" />
                <small id="password_confirmationHelp" class="form-text text-muted">Please confirm your new password.</small>

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
            <input type="submit" class="form-control btn btn-light my-1" value="Submit">
        </div>
    </form>
@endsection
