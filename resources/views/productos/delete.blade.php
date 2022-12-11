<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('productos.destroy', $producto->id)}}" method="POST">
            @csrf
            @method('DELETE')

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminación de Registros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span arial-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    ¿Deseas eliminar al registro {{$producto->name}}?
                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        Eliminar
                    </button>

                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    
                </div>

            </div>
        </form>
    </div>
  </div>