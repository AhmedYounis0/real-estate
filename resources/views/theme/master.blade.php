<!DOCTYPE html>
<html lang="en">
@include('theme.partials.head')
<body>
@include('theme.partials.nav')

@yield('content')

@include('theme.partials.footer')

<div class="scroll-top">
    <i class="fas fa-angle-up"></i>
</div>
@include('theme.partials.scripts')
</body>
</html>
