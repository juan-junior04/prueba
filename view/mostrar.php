<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Table</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
<div class="table">
<button onclick="redirigirAAgregar()">Agregar</button>
<h1>Tabla Fabricantes</h1>
<div class="boder-table">
<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
 
    require_once(__DIR__ . '/../pruebaControlle/pruebaControle.php');
    $pruebaControle = new PruebaControle();
    // Decode the JSON response directly
    $respuesta = json_decode($pruebaControle->traerTodo(), true);
    // Check if decoding was successful
    if ($respuesta !== null) {
        // Start building the HTML table
        echo '<table class="styled-table">
                <thead>
                    <tr>
                        <th>Cod_fabricante</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>';
        // Iterate through the array and populate the table rows
        foreach ($respuesta as $valor) {
            echo '<tr>
                    <td>' . $valor['Cod_fabricante'] . '</td>
                    <td>' . $valor['nombre'] . '</td>
                    <td> <button>Update</button> <button>Delete</button>  </td>
                     
                  </tr>';
        }
        // Close the table
        echo '</tbody></table>';
    } else {
        echo "Failed to decode JSON";
    }
}
?>
</div>
</div>

</body>
<script>
        function redirigirAAgregar() {
            // Utiliza PHP para obtener la ruta desde la clase de rutas
            window.location.href = '../view/agregar.php';
        }
    </script>
</html>
