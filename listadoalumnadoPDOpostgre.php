<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dsn = 'pgsql:host=localhost;port=5432;dbname=campus';
        $username = 'postgres';
        $password = 'postgres';

        try {
            $pdo = new PDO($dsn, $username, $password);
            echo "Connected to PostgreSQL!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
            $resultado_query = $pdo->query('
            SELECT alumnado.dni, alumnado.nombre, alumnado.apellidos, alumnado.email, aulasvirtuales.nombrelargo
            FROM alumnado
            JOIN matriculas ON alumnado.dni = matriculas.dni 
            JOIN aulasvirtuales ON matriculas.id_aula = aulasvirtuales.id
            ');

            while ($row = $resultado_query->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>
                        <td>{$row->dni}</td>
                        <td>{$row->nombre}</td>
                        <td>{$row->apellidos}</td>
                        <td>{$row->email}</td>
                        <td>{$row->nombrelargo}</td>
                      </tr>";
            }

            $pdo = null;
        ?>
    </table>
</body>
</html>
