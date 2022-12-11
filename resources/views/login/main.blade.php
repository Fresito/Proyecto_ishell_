<!DOCTYPE html>
<html lang="es-MX">
<head>
    @include('login.head')
</head>
<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">
    <div class="container">
        <br>
        @yield('content')
    </div>
    <br><br>
</body>
</html>