<!DOCTYPE html>
<html lang="en">
@include('_partials.head')

<body>
    <div id="app">
        @include('_partials.header')
        @yield('content')
    </div>
</body>

</html>
