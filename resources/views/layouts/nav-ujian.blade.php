<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue">
        
        <a href="../index.html" class="logo">
            <p class="navbar-brand text-light">PPDB</p>
        </a>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        
        <div class="container-fluid">
            <div class="collapse text-light" id="search-nav">
                {{ Carbon\Carbon::now()->format('l, d F Y')}}
            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                @yield('nav-item')
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>