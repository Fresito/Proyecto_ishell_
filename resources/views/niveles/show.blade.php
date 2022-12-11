<!-- Modal -->
<div class="modal fade" id="modal-mostrar-{{$nivel->id_nivel}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('niveles.index', $nivel->id_nivel)}}" method="POST">
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
                                {{ $nivel->id_nivel }}
                            </div>

                            <div class="form-group">
                                <strong>Nivel:</strong>
                                {{ $nivel->nivel }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>