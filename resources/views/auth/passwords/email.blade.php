@extends('layouts.layout')

@section('title', 'Reset Password')

@section('sidebar-about')
    @parent

@section('sidebar-about-title', 'Reset Password')
@section('sidebar-about-content')
    If you have forgotten your password please utilize this page to regain access to your account. An email will be sent to your email provided with additional information for how to regain access to your account.
@endsection
@stop

@section('content-main')

    <form action="{{ route('password.email')  }}" method="POST">
        @csrf
        <h2>Reset Password</h2>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-group">
            <div class="floating-label textfield-box">
                <label for="email">Email</label>
                <input aria-describedby="emailHelp" class="form-control @if($errors->has('email')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('email')) is-valid @endif" name="email" id="email" placeholder="Email" type="email" />
                <small id="emailHelp" class="form-text text-muted">Please provide your email address.</small>

                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email')  }}
                    </div>
                @else
                    <div class="valid-feedback">
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
