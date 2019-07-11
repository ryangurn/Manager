    <aside class="col-md-4 blog-sidebar">
        @section('sidebar-about')
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="font-italic">@yield('sidebar-about-title')</h4>
            <p class="mb-0">@yield('sidebar-about-content')</p>
        </div>
        @show
    </aside><!-- /.blog-sidebar -->