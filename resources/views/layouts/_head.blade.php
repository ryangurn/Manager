<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title') · {{ config('app.name')  }}</title>

<!-- Bootstrap core CSS -->
<link href="{{ asset('css/material.min.css')  }}" rel="stylesheet" />

<!-- Additional CSS -->
@yield('style')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>
<!-- Adding the correct font! -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
<!-- Importing the CSS for the view -->
<link href="{{ asset('css/app.css')  }}" rel="stylesheet">