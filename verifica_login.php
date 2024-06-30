<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
        
 

</body>
</html>


<?php
$host = 'localhost:3306';
$user = 'root';
$pass = '';
$base = 'bdAcademia1';

$con = new mysqli($host, $user, $pass, $base);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Sanitize inputs to prevent SQL injection
        $email = $con->real_escape_string($email);
        $senha = $con->real_escape_string($senha);

        $query = "SELECT * FROM tbAluno WHERE email = '$email' AND senha = '$senha'";
        $result = $con->query($query);

        if ($result && $result->num_rows > 0) {
            // Dados corretos, redireciona para outra página
            header("Location: index_login.php");
            exit();
        } else {
            echo "Usuário ou senha incorretos.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
