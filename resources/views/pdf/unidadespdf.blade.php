<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lista de Unidades</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        position: relative;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
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

    .logo-top-left {
        position: absolute;
        top: 10px;
        left: 10px;
        width: 80px; /* Ajusta el tamaño según tu logo */
        z-index: 999;
    }

    .logo-top-right {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 80px; /* Ajusta el tamaño según tu logo */
        z-index: 999;
    }
</style>
</head>
<body>


    <div class="container">
        <h1>Lista de Unidades</h1>
        <table> 
            <tr>
                <th>CODIGO</th>
                <th>Nombre</th>
            </tr>
            @foreach($unidades as $unidad)
                <tr>
                    <td>{{ $unidad->codigo }}</td>
                    <td>{{ $unidad->nombre }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
