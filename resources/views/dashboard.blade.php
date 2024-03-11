<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('search-gifs-by-id') }}">Buscar GIF por ID</a></li>
                            <li><a href="{{ route('search-gifs-by-phrase') }}">Buscar GIF por Frase</a></li>
                            <li><a href="{{ route('add-to-favorites-form') }}" class="btn btn-primary">Agregar a favoritos</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<style>
    /* Estilos CSS aquí */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .container {
        margin-top: 50px; /* Margen superior para separar del borde superior */
    }

    .card {
        max-width: 400px; /* Ancho máximo del contenedor del dashboard */
        margin: 0 auto; /* Centrar horizontalmente */
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px; /* Espaciado interno */
    }

    .card-header {
        text-align: center;
        font-weight: bold;
        padding-bottom: 15px;
        border-bottom: 1px solid #ccc;
    }

    .card-body {
        padding: 0; /* Eliminar el espacio interno del cuerpo de la tarjeta */
    }

    ul {
        list-style-type: none; /* Eliminar viñetas de la lista */
        padding: 0; /* Eliminar el espacio interno de la lista */
    }

    li {
        padding: 10px 0; /* Espaciado entre elementos de la lista */
        border-bottom: 1px solid #ccc; /* Línea divisoria entre elementos de la lista */
    }

    li:last-child {
        border-bottom: none; /* Eliminar la línea divisoria en el último elemento */
    }

    a {
        text-decoration: none; /* Eliminar subrayado del enlace */
        color: #333; /* Color del texto del enlace */
        display: block; /* Convertir enlace en bloque para ocupar todo el ancho */
        padding: 10px; /* Espaciado interno del enlace */
    }

    a:hover {
        background-color: #f5f5f5; /* Cambiar color de fondo al pasar el mouse sobre el enlace */
    }

    .btn-primary {
        width: 100%; /* Ancho completo del botón */
        margin-top: 10px; /* Margen superior para separar del elemento anterior */
    }

</style>
