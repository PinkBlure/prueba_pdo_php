<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dsn = 'pgsql:host=localhost;port=5432;dbname=your_database';
        $username = 'your_username';
        $password = 'your_password';

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
    </table>
</body>
</html>
