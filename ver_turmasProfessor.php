<?php
session_start(); // Inicia a sessão (se ainda não estiver iniciada)

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    die("ID do professor não está definido na sessão. Realize o login novamente.");
}

// Conecta ao banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$base = "bdAcademia1";
$con = mysqli_connect($host, $user, $pass, $base);
mysqli_set_charset($con, "utf8");

if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Obtém o ID do professor da sessão
$idProfessor = $_SESSION['id'];

// Consulta SQL para obter as turmas onde o professor está designado
$sql = "SELECT tbTurma.idTurma, tbTurma.descricao, tbTurma.horarioInicio, tbTurma.horarioTermino
        FROM tbTurma
        WHERE tbTurma.idProfessor = $idProfessor";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($con));
}

mysqli_close($con); // Fecha a conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turmas do Professor</title>
 
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
   
    <style>

.box-login{
    display: flex;
    flex-direction: row;
}

.turmas-matriculadas{
    background-color: black;
    margin: 3%;
    color: white;
    padding: 3%;
    padding-left: 13%;
    border-radius: 45px;
}

strong, li{
    margin: 3px;
    margin-top: 2%;
}

.titulo{
    margin: 1%;
}

.perfil{
            margin-top: -12px;
            margin-right: 16px;
            margin-left: -32px;
            display: flex;
        }

        button{
    background-color: blue;
    color: white;
    font-size: 18px;
    margin-top: 3%;
    padding: 16px 22px;
    border-radius: 13px;
    font-weight: bolder;
}
</style>

</head>
<body>
<header>
<div class="box1">
    <img width="25" height="25" src="https://img.icons8.com/ios-filled/50/barbell.png" alt="Icone peso de academia"/>
    <h2>Smart Gym</h2>
</div>

<div class="box2" id="box">  


    <div class="box-login">
        <img width="30" height="30" class="perfil" src="./assets/usuario-de-perfil.png"  alt="">
        <a href="index.php">Sair</a>
    </div>
</div>
    </header>

    <section class="main-content">
        <h1 class="titulo">Turmas do Professor</h1>

        <!-- Exemplo de listagem das turmas do professor -->
        <div class="turmas-matriculadas">
            <h2 class="titulo">Turmas em que você está dando aula:</h2>
            <ul>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <li>
                        <strong>Descrição:</strong> <?php echo $row['descricao']; ?><br>
                        <strong>Horário:</strong> <?php echo $row['horarioInicio'] . ' - ' . $row['horarioTermino']; ?><br>
                        
                    </li>
                <?php endwhile; ?>
            </ul>
            <script>
        function voltarPagina() {
            window.history.back();
        }
    </script>

    <button onclick="voltarPagina()">Voltar</button>
        </div>
    </section>

    <footer class="footer-box" id="footer">
        <div class="footer-info">
            <div class="footer-info-title">
                <h3>Smart Gym</h3>
                <h4>A melhor para o seu corpo</h4>
            </div>

            <div class="footer-info-text"> 
                <div>
                    <p>(11) 4002-8922</p>
                    <p>(11) 98765-4321</p>
                </div>

                <a>smartgym@gmail.com</a>
            </div>
        </div>

        <div>
            <div>
                <h3>Newsletter</h3>
                <form action="Envia_Email.php" method="post">
                    <input type="email" name="email"></input>
                    <input type='submit' value="Inscrever-se"></input>
                </form>
            </div>

            <div>
                <p>Receba as nossas novidades e promoções!</p>
            </div>
        </div>   
    </footer>
    

   
</body>
</html>
