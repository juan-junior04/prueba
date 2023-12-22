<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Datos</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

    <h1>Ingresar Datos</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        require_once(__DIR__ . '/../pruebaControlle/pruebaControle.php');
        require_once(__DIR__ . '/../fabricante/fabricante.php');
        $pruebaControle = new PruebaControle();

        // Verificar si los campos están presentes antes de intentar guardar
        if (isset($_POST['Cod_fabricante']) && isset($_POST['nombre'])) {
            $Cod_fabricante = $_POST['Cod_fabricante'];
            $nombre = $_POST['nombre'];

            // Crear un objeto con las propiedades cod y nombre
            $datos = new Fabricante();
            $datos->setCod_fabricante($Cod_fabricante);
            $datos->setNombre($nombre);

            // Llamar al método de guardar con el objeto que contiene las propiedades
            $pruebaControle->guardar($datos);

            header("Location: ../view/mostrar.php");
            exit();
        }
    }
    ?>

    <form action="" method="post">
        <label for="codFabricante">Código de Fabricante:</label>
        <input type="number" id="Cod_fabricante" name="Cod_fabricante" required>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <input type="submit" value="Ingresar">
    </form>

</body>

</html>
