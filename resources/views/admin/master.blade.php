<!DOCTYPE html>
<html lang="en">
@include('admin.partials.head')
<body>
<div id="app">
    <div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.partials.nav')

        @include('admin.partials.side-bar')

        @yield('content')
    </div>
</div>
@include('admin.partials.scripts')
</body>
</html>
