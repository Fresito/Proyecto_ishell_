<!-- Modal -->
<div class="modal fade" id="modal-mostrar-{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('productos.index', $producto->id)}}" method="POST">
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
                                {{ $producto->id }}
                            </div>

                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $producto->name }}
                            </div>

                            <div class="form-group">
                                <strong>Detalles:</strong>
                                {{ $producto->details }}
                            </div>

                            <div class="form-group">
                                <strong>Precio:</strong>
                                {{ $producto->price }}
                            </div>

                            <div class="form-group">
                                <strong>Foto:</strong>
                                <img src="{{ "images/".$producto->image_path }}" alt="{{ $producto->image_path }}"style="width: 50px">
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>