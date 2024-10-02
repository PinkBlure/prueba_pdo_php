<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        // Parámetros de la base de datos
        $host = "localhost";
        $db = "campus";
        $user = "root";
        $pass = "";
        $dns = "mysql:host=$host;dbname=$db";

        // Abrir conexión
        $conn = new PDO($dns, $user, $pass);

        if ($conn == null) {
            die();
        }
        
    ?>
    <table border=1>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Aula</th>
        </tr>
        <?php
            $resultado_query = $conn->query('select alumnado.dni, alumnado.nombre, alumnado.apellidos, alumnado.email, aulasVirtuales.nombrelargo from alumnado, matriculas, aulasVirtuales where alumnado.dni = matriculas.dni and matriculas.id_aula = aulasVirtuales.id;');

            // Recorrer la query tratándola como a un objeto
            while($row = $resultado_query->fetch(PDO::FETCH_OBJ)) {
                echo   "<tr>
                            <td>{$row->dni}</td>
                            <td>{$row->nombre}</td>
                            <td>{$row->apellidos}</td>
                            <td>{$row->email}</td>
                            <td>{$row->nombrelargo}</td>
                        </tr>";
            }
    
            // Cerramos la conexión
            $conn = null;
        ?>
    </table>
</body>
</html>
