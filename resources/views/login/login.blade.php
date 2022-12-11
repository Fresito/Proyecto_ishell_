<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>¡ S H E L L | LOGIN</title>
</head>
<body>
    <?php
    $session_id = session('session_id');
    $session_name = session('session_name');
    $session_tipo = session('session_tipo');
    $session_foto = session('session_foto');
    ?>
    <form action="{{ route('valida') }}" method="POST">
        {{ csrf_field() }}
        <h1>Iniciar Sesión</h1>
        <div class="inset">
        <p>
          <label for="email">Correo</label>
          <input type="text" name="email" id="email">
        </p>
        <p>
          <label for="password">Contraseña</label>
          <input type="password" name="pass" id="pass" maxlength="8">
        </p>
        <!--<p>
          <input type="checkbox" name="remember" id="remember">
          <label for="remember">Remember me for 14 days</label>
        </p>-->
        <hr>
        <p><a for="remember" href="{{ route('registros.index') }}">¿No tienes cuenta? ¡Registrate!</a></p>
        </div>
        <p class="p-container">
          <!--<span>Forgot password ?</span>-->
          <input type="submit" name="go" id="go" value="Ingresar">
        </p>
      </form>
</body>
</html>