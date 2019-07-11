<!doctype html>
<html lang="en">
<head>
    @include('layouts._head')
</head>
<body>
@include('layouts._header')

<main role="main" class="container">
    <div class="row">
        @include('layouts._body')
    </div><!-- /.row -->

</main><!-- /.container -->

@include('layouts._footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/material.min.js') }}"></script>

@yield('script')

</body>
</html>
