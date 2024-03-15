<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lista de Productos</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
     
    }

    .container {
        max-width: 1200px;
       
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: black;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e2e2e2;
    }

    td:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    td:last-child {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Lista de Productos</h1>
        <table>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Abreviatura</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Unidad</th>
                <th>P.Compra</th>
                <th>P.Venta</th>
            </tr>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->abreviatura }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->marca->nombre }}</td>
                    <td>{{ $producto->unidad->nombre }}</td>
                    <td>{{ $producto->p_compra }}</td>
                    <td>{{ $producto->p_venta }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
