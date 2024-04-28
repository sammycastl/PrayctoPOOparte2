<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Denuncias</title>
    <style>
        /* Estilos CSS para la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Listado de Denuncias</h1>
    <table>
        <thead>
            <tr>
                <th>Lugar</th>
                <th>Detalles</th>
                <th>Denunciante</th>
                <!-- Agregar más columnas si es necesario -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($denuncias as $denuncia): ?>
            <tr>
                <td><?php echo $denuncia->getLugar(); ?></td>
                <td><?php echo $denuncia->getDetalles(); ?></td>
                <td><?php echo $denuncia->getDenunciante()->getNombre(); ?></td>
                <!-- Mostrar más datos de la denuncia según sea necesario -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="crearDenuncia.php">Crear Nueva Denuncia</a> <!-- Enlace para crear una nueva denuncia -->
</body>
</html>
