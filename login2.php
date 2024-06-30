<?php
session_start(); // Inicia a sessão (se ainda não estiver iniciada)

$host = "localhost:3306";
$user = "root";
$pass = "";
$base = "bdAcademia1";
$con = mysqli_connect($host, $user, $pass, $base);
mysqli_set_charset($con, "utf8");


if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Verifica se todos os campos foram enviados corretamente
if (isset($_POST['opcao']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $tipo_login = $_POST['opcao']; // Recebe o tipo de login (Aluno ou Professor)
    $login = mysqli_real_escape_string($con, $_POST['email']);
    $senha = mysqli_real_escape_string($con, $_POST['senha']);

    // Verifica se o tipo de login recebido é válido
    if ($tipo_login == 'Aluno') {
        $tabela = 'tbAluno';
        $pagina_login = 'aluno.php'; // Página para alunos
        $campo_id = 'idAluno'; // Nome do campo ID na tabela tbAluno
        $campo_nome = 'nomeAluno'; // Nome do campo Nome na tabela tbAluno
    } elseif ($tipo_login == 'Professor') {
        $tabela = 'tbProfessor';
        $pagina_login = 'professor.php'; // Página para professores
        $campo_id = 'idProfessor'; // Nome do campo ID na tabela tbProfessor
        $campo_nome = 'nomeProfessor'; // Nome do campo Nome na tabela tbProfessor
    } else {
        // Caso o tipo de login não seja reconhecido
        die("Tipo de login inválido");
    }

    // Consulta SQL para verificar as credenciais
    $sql = "SELECT $campo_id, $campo_nome FROM $tabela WHERE email ='$login' AND senha='$senha';";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Se o login for válido, armazena os dados na sessão
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row[$campo_id]; // ID do aluno ou professor
        $_SESSION['nome'] = $row[$campo_nome]; // Nome do aluno ou professor
        $_SESSION['tipo_login'] = $tipo_login; // Armazena o tipo de login na sessão

        // Redireciona para a página apropriada após o login
        header("location: $pagina_login");
        exit();
    } else {
        // Caso contrário, exibe mensagem de erro e oferece opção de voltar para a página anterior
        echo "Usuário ou senha inválidos";
        echo "<center><h3 id='msg'><a href='index.php'>Voltar para a página anterior</a></h3></center>";
    }
} else {
    // Caso algum campo esteja faltando
    die("Por favor, preencha todos os campos");
}

mysqli_close($con);
?>
