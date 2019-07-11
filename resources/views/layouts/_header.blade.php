<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                @if( config('manager.subscribe') )
                    <a class="text-muted" href="#">Subscribe</a>
                @endif
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="{{ action('HomeController@index')  }}">{{ config('app.name') }}</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="btn btn-sm btn-outline-secondary" href="#">Login</a>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @if(!$navbarRoutes->isEmpty())
                @foreach($navbarRoutes as $name => $route)
                    <a class="p-2 text-muted" href="{{ action($route['route']) }}">{{ $name  }}</a>
                @endforeach
            @endif
        </nav>
    </div>
</div>