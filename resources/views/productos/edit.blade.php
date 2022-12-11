<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>¡ S H E L L | ADMINISTRACIÓN</title>
</head>
<body>
    <br>
    <div class="container">
        <h4>Productos</h4>
        <hr>
        <div class="row">
            <div class="col-xl-12">
        <!--Formulario de usuarios-->        
                <form action="{{ route('modificarp',['id'=>$producto->id]) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method ('PUT')

                        
                            <div class="form-group">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ $producto->name }}">
                            </div>

                            &nbsp;

                            <div class="form-group">
                              <label for="" class="form-label">Detalles</label>
                              <input type="text" class="form-control" name="details" value="{{ $producto->details }}">
                            </div>

                            &nbsp;

                            <div class="form-group">
                              <label for="" class="form-label">Precio</label>
                              <input type="text" class="form-control" name="price" value="{{ $producto->price }}">
                            </div>

                            &nbsp;

                            <div class="form-group">
                                <label for="" class="form-label">Foto del Producto</label>
                                <input type="file" class="form-control" name="fotoA" value="">
                                <br>
                                <input type="text" class="form-control" name="fotoB" value="{{ $producto->image_path }}">
                            </div>

                            <br>
                            <br>
                            <div></div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <button type="submit" class="btn btn-outline-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock-fill" viewBox="0 0 16 16">
                                        <path d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816L7.27 1.047zM4.5 13.5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1z"/>
                                    </svg>
                                    Guardar
                                </button>
    
                                <a href="{{ route('productos.index') }}" type="reset" class="btn btn-outline-secondary"> 
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
    </div>
    <br>
</body>
</html>