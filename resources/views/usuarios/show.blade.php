<!-- Modal -->
<div class="modal fade" id="modal-mostrar-{{$usuario->id_usuario}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('usuarios.index', $usuario->id_usuario)}}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">Registro</span>
                            </div>
                        </div>
    
                        <div class="card-body">
                            
                            <div class="form-group">
                                <strong>Id:</strong>
                                {{ $usuario->id_usuario }}
                            </div>

                            <div class="form-group">
                                <strong>Matricula:</strong>
                                {{ $usuario->clave }}
                            </div>

                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $usuario->nombre }}
                            </div>

                            <div class="form-group">
                                <strong>Apellido Paterno:</strong>
                                {{ $usuario->apellido_p }}
                            </div>

                            <div class="form-group">
                                <strong>Apellido Materno:</strong>
                                {{ $usuario->apellido_m }}
                            </div>

                            <div class="form-group">
                                <strong>Fecha de nacimiento:</strong>
                                {{ $usuario->fecha_nacimiento }}
                            </div>

                            <div class="form-group">
                                <strong>Genero:</strong>
                                {{ $usuario->genero }}
                            </div>

                            <div class="form-group">
                                <strong>Fotografia:</strong>
                                <img src="{{ "images/".$usuario->foto }}" alt="{{ $usuario->foto_n }}"style="width: 50px">
                            </div>

                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $usuario->email }}
                            </div>

                            <div class="form-group">
                                <strong>Password:</strong>
                                {{ $usuario->pass }}
                            </div>

                            <div class="form-group">
                                <strong>Nivel:</strong>
                                @if ($usuario->id_nivel == 1)
                                    Administrador
                                @elseif ($usuario->id_nivel == 2)
                                    Empleado
                                @else
                                    Usuario
                                @endif
                            </div>

                            <div class="form-group">
                                <strong>Estado:</strong>
                                @if ($usuario->activo == 1)
                                    Activo
                                @else
                                    Inactivo
                                @endif
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>