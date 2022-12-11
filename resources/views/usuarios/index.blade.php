<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('login.head')

    <link rel="stylesheet" href="css/barra_nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <title>¡ S H E L L | ADMINISTRACIÓN</title>
</head>
<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">

    @include('layout.barra')

<!-------------------------- Contenido --------------------------->

    <br>
    <div class="container">
        <h4>Registros de Usuarios</h4>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

            <a href="{{ route('usuarios.create') }}" type="button" class="btn btn-outline-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Crear
            </a>

        </div>

        <br>
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead class="thead">
                    <tr>
                        <th>#</th>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Fecha de nacimiento</th>
                        <th style="text-align: center">Genero</th>
                        <th>Nombre de la foto</th>
                        <th>Foto</th>
                        <th style="text-align: center">Email</th>
                        <th>Password</th>
                        <th style="text-align: center">Nivel</th>
                        <th>Estado</th>
                        <th>Accciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id_usuario}}</td>
                        <td>{{$usuario->clave}}</td>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->apellido_p}}</td>
                        <td>{{$usuario->apellido_m}}</td>
                        <td>{{$usuario->fecha_nacimiento}}</td>
                        <td>{{$usuario->genero}}</td>
                        <td>{{$usuario->foto}}</td>
                        <td style="text-align: center">
                            
                            <img src="{{ 'images/'.$usuario->foto }}" alt="" style="width: 25px">
                            
                        </td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->pass}}</td>
                        <td>
                            @if ($usuario->id_nivel == 1)
                                Administrador
                            @elseif ($usuario->id_nivel == 2)
                                Empleado
                            @else
                                Usuario
                            @endif
                        </td>
                        <td>
                            @if ($usuario->activo == 1)
                                <p style="color: rgb(24, 208, 24)">Activo</p>
                            @else
                                <p style="color: red">Inactivo</p>
                            @endif
                        </td>
                        <td>
                            
                            <a href="{{ route('modificarfile',['id'=>$usuario->id_usuario]) }}" class="btn btn-outline-success btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                Editar
                            </a>

                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$usuario->id_usuario}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                </svg>
                                Eliminar
                            </button>

                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-mostrar-{{$usuario->id_usuario}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                                Ver
                            </button>

                        </td>
                    </tr>
                    @include('usuarios.show')
                    @include('usuarios.delete')
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>