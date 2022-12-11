<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="css/portada.css">
    <link rel="stylesheet" href="css/registros.css">
    <title>¡ S H E L L | REGISTRARSE</title>
</head>
<body>

    @include('layout.navbar')

    <section>
        <div class="login-container">
            <div class="login-info-container">
                <br><br>
                <h1 class="title">Registrarse en ¡shell:</h1>
                
                
                <form id="inputs-container" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input class="input" name="nombre" type="text" placeholder="Nombre(s)" required maxlength="20" value="{{ old('nombre') }}">
                    </div>

                    <div class="form-group">
                        <input class="input" name="apellido_p" type="text" placeholder="Apellido Paterno" required maxlength="45" value="{{ old('apellido_p') }}">
                    </div>

                    <div class="form-group">
                        <input class="input" name="apellido_m" type="text" placeholder="Apellido Materno" required maxlength="45" value="{{ old('apellido_m') }}">
                    </div>

                    <div class="form-group">
                        <input class="input" name="fecha_nacimiento" type="date" placeholder="Fecha de Nacimiento" value="{{ old('fecha_nacimiento') }}">
                    </div>

                    <div class="form-group">
                        <label class="inputlb" for="genero">Genero</label>
                        <br>
                        Femenino: <input type="radio" name="genero" value="Femenino" checked>
                        <br>
                        Masculino: <input type="radio" name="genero" value="Masculino">
                    </div>
                    
                    <div class="form-group">
                        <input class="input" name="foto" type="file" placeholder="Foto">
                    </div>

                    <div class="form-group">
                        <input class="input" name="email" type="text" placeholder="example@gmail.com" required maxlength="45" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <input class="input" name="pass" type="password" placeholder="Password" required maxlength="8" value="{{ old('pass') }}">
                    </div>
                    <br>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-outline-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock-fill" viewBox="0 0 16 16">
                                <path d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816L7.27 1.047zM4.5 13.5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1z"/>
                            </svg>
                            Guardar
                        </button>
                        <a href="{{ route('inicio.index') }}" type="reset" class="btn btn-outline-secondary"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
</html>