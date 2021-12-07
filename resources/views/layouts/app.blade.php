<!DOCTYPE html>
<html lang="en">
@include('inc.head')
<body>
@include('inc.nav')
@yield('content')

@include('inc.footer')
@include('inc.scripts')
@yield('extra-js')
</body>
</html>
