
<?php

$host = 'localhost:3306';
$user = 'root';
$pass = '';
$base = 'bdAcademia1';

$con = mysqli_connect($host,$user,$pass,$base);

$email = $_POST['email'];
$senha = $_POST['senha'];
$opcao = $_POST['opcao'];

$sql = "SELECT * FROM tbAluno WHERE email = '$email' AND senha = '$senha';";
$result1 = mysqli_query($con, $sql);







//verificação email aluno
$query = "SELECT * FROM tbAluno WHERE email = '$email' AND senha = '$senha'; ";
$result1 = $con->query($query);

// Verificar se a consulta retornou resultados
if ($result1->num_rows > 0) {
    // Inicializar uma variável para armazenar os dados
    $dados = array();

    while ($row = $result1->fetch_assoc()) {
        $dados[] = $row; // Adiciona cada linha como um elemento no array $dados
    }

    // Exemplo de uso dos dados armazenados
    foreach ($dados as $dado) {
      $codigo = $dado['idAluno'];
      $nome = $dado['nomeAluno'];
      $cpf = $dado['cpf'];
      $endereco = $dado['endereco'];
      $bairro = $dado['bairro'];
      $cidade = $dado['cidade'];
      $estado = $dado['estado'];
      $cep = $dado['cep'];
      $telefoneA = $dado['telefone'];
      $celularA = $dado['celular'];
      $emailA = $dado['email'];
      $senhaA = $dado['senha'];
      $peso = $dado['peso'];
      $altura = $dado['altura'];
      $imc = $dado['imc'];
      $statusAluno = $dado['statusAluno'];
      $obs = $dado['obs'];
   }
} else {
    $texto = "Nenhum resultado encontrado.";
}


$sql3 = "SELECT * FROM tbProfessor WHERE email = '$email' AND senha = '$senha';;";
$result3 = mysqli_query($con, $sql3);






//verificação email professor
$query = "SELECT * FROM tbProfessor WHERE email = '$email' AND senha = '$senha';;";
$result2 = $con->query($query);

// Verificar se a consulta retornou resultados
if ($result2->num_rows > 0) {
    // Inicializar uma variável para armazenar os dados
    $dados1 = array();

    // Iterar pelos resultados e armazenar em $dados
    while ($row = $result2->fetch_assoc()) {
        $dados1[] = $row; // Adiciona cada linha como um elemento no array $dados
    }

    // Exemplo de uso dos dados armazenados
    foreach ($dados1 as $dado1) {
      $idProfessor = $dado1['idProfessor'];
      $nomeProfessor = $dado1['nomeProfessor'];
      $telefoneP = $dado1['telefone'];
      $celularP = $dado1['celular'];
      $emailP = $dado1['email'];
      $senhaP = $dado1['senha'];
   }
} else {
    $texto = "Nenhum resultado encontrado.";
}






//verificação pelo email na matricula do aluno
$query = "SELECT m.idMatricula, m.dataMatricula, m.idTurma
FROM tbMatricula m
INNER JOIN tbAluno a ON m.idAluno = a.idAluno
WHERE a.email = '$email';";
$result3 = $con->query($query);

// Verificar se a consulta retornou resultados
if ($result3->num_rows > 0) {
    // Inicializar uma variável para armazenar os dados
    $dados3 = array();

    // Iterar pelos resultados e armazenar em $dados
    while ($row = $result3->fetch_assoc()) {
        $dados3[] = $row; // Adiciona cada linha como um elemento no array $dados
    }

    // Exemplo de uso dos dados armazenados
    foreach ($dados3 as $dado3) {
      $idMatricula = $dado3['idMatricula'];
      $dataMatricula = $dado3['dataMatricula'];
      $idTurma = $dado3['idTurma'];
   }
} else {
    $texto = "Nenhum resultado encontrado.";
}






//verificação pelo email na turma do professor
$query = "SELECT t.idTurma, t.descricao, t.horarioInicio, t.horarioTermino, p.nomeProfessor, p.telefone, p.celular, p.email
FROM tbTurma t
INNER JOIN tbProfessor p ON t.idProfessor = p.idProfessor
WHERE p.email = '$email';";
$result4 = $con->query($query);

// Verificar se a consulta retornou resultados
if ($result4->num_rows > 0) {
    // Inicializar uma variável para armazenar os dados
    $dados4 = array();

    // Iterar pelos resultados e armazenar em $dados
    while ($row = $result4->fetch_assoc()) {
        $dados4[] = $row; // Adiciona cada linha como um elemento no array $dados
    }

    // Exemplo de uso dos dados armazenados
    foreach ($dados4 as $dado4) {
      $idTurma = $dado4['idTurma'];
      $descricao = $dado4['descricao'];
      $horarioInicio = $dado4['horarioInicio'];
      $horarioTermino = $dado4['horarioTermino'];
      $nomeProfessor = $dado4['nomeProfessor'];
   }
} else {
    $texto = "Nenhum resultado encontrado.";
}


$query = "SELECT 
    a.nomeAluno,
    p.nomeProfessor,
    t.descricao,
    t.idTurma,
    t.horarioInicio,
    t.horarioTermino
FROM 
    tbAluno a
    INNER JOIN tbMatricula m ON a.idAluno = m.idAluno
    INNER JOIN tbTurma t ON m.idTurma = t.idTurma
    INNER JOIN tbProfessor p ON t.idProfessor = p.idProfessor
WHERE 
    a.email = '$email';
";
$result5 = $con->query($query);

// Verificar se a consulta retornou resultados
if ($result5->num_rows > 0) {
    // Inicializar uma variável para armazenar os dados
    $dados5 = array();

    // Iterar pelos resultados e armazenar em $dados
    while ($row = $result5->fetch_assoc()) {
        $dados5[] = $row; // Adiciona cada linha como um elemento no array $dados
    }

    // Exemplo de uso dos dados armazenados
    foreach ($dados5 as $dado5) {
      $nomeAluno = $dado5['nomeAluno'];
      $nomeProfessor = $dado5['nomeProfessor'];
      $descricao = $dado5['descricao'];
      $idTurma = $dado5['idTurma'];
      $horarioInicio = $dado5['horarioInicio'];
      $horarioTermino = $dado5['horarioTermino'];  
   }
} else {
    $texto = "Nenhum resultado encontrado.";
}





// Fechar conexão
$con->close();


?>






<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Smart Gym</title>
   <link rel="stylesheet" href="styles/style.css">
   <link rel="stylesheet" href="styles/header.css">
   <link rel="stylesheet" href="styles/about.css">
   <link rel="stylesheet" href="styles/mvv.css">
   <link rel="stylesheet" href="styles/plans.css">
   <link rel="stylesheet" href="styles/footer.css">
   <link rel="stylesheet" href="styles/main-status.css">
</head>
<body>
   <header>
      <div class="box1">
         <img width="25" height="25" src="https://img.icons8.com/ios-filled/50/barbell.png" alt="Icone peso de academia"/>
         <h2>Smart Gym</h2>
      </div>

      <div class="box2"> 
         <div class="box-link">
            <a href="#box2">Home</a>
            <a href="#about">Sobre</a>
            <a href="#footer">Contato</a>
         </div>

         <div class="box-login">
            <img width="40" height="40" class="perfil" src="./assets/usuario-de-perfil.png"  alt="">
         </div>
      </div>
      
   </header>

   <section class="main-content">
      <main>
         <div class="main-box2">
            <br>
               <h1 class="perfil">Perfil</h1>


            <div>
            
               <h1><?php if($opcao == 'Aluno')echo 'id do aluno: '.$codigo; ?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'nome do aluno: '.$nome; ?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'email do aluno: '.$emailA; ?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'celular do aluno: '.$celularA; ?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'telefone do aluno: '.$telefoneA; ?></h1>
            </div>
            
            <div>
               <h1><?php if($opcao == 'Aluno')echo 'endereço do aluno: '.$endereco; ?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'bairro do aluno: '.$bairro; ?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'cidade do aluno: '.$cidade; ?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'estado do aluno: '.$estado; ?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'CEP do aluno: '.$cep; ?></h1>
            </div>
            
            
            <div>
               <h1><?php if($opcao == 'Professor')echo 'código do professor: '.$idProfessor; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'nome do professor: '.$nomeProfessor; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'email do professor: '.$emailP; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'celular do professor: '.$celularP; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'telefone do professor: '.$telefoneP; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'código da turma do professor: '.$idTurma?></h1>            
               <h1><?php if($opcao == 'Professor')echo 'descrição da turma: '.$descricao?></h1>
               <h1><?php if($opcao == 'Professor')echo 'horário de inicio: '.$horarioInicio?></h1>
               <h1><?php if($opcao == 'Professor')echo 'horário de término: '.$horarioTermino?></h1>
               <h1><?php if($opcao == 'Professor')echo 'nome do professor da turma: '.$nomeProfessor?></h1>
            </div>
            
         </div>
      </main>
   </section>
   
   <br><br>
   
   <section class="main-content">
      <main>
         <div class="main-box2">
            
            <br>
            
            <h1 class="DadosDoAluno">Dados</h1>
            
               <div>
                  <h1><?php if($opcao == 'Aluno')echo 'CEP do aluno: '.$cep; ?></h1>
                  <h1><?php if($opcao == 'Aluno')echo 'peso do aluno: '.$peso; ?></h1>
                  <h1><?php if($opcao == 'Aluno')echo 'altura do aluno: '.$altura; ?></h1>
                  <h1><?php if($opcao == 'Aluno')echo 'IMC do aluno: '.$imc; ?></h1>
                  <h1><?php if($opcao == 'Aluno')echo 'status do aluno: '.$statusAluno; ?></h1>
                  <h1><?php if($opcao == 'Aluno')echo 'observações do aluno: '.$obs; ?></h1>
                  <h1><?php if($opcao == 'Aluno')echo 'código de matricula do aluno: '.$idMatricula?></h1>
                  <h1><?php if($opcao == 'Aluno')echo 'data da matricula: '.$dataMatricula?></h1>
                  <h1><?php if($opcao == 'Aluno')echo 'código da turma do aluno: '.$idTurma?></h1>
               </div>
               
               <div>
                  <h1><?php if($opcao == 'Professor')echo 'código do professor: '.$idProfessor; ?></h1>
                  <h1><?php if($opcao == 'Professor')echo 'nome do professor: '.$nomeProfessor; ?></h1>
                  <h1><?php if($opcao == 'Professor')echo 'email do professor: '.$emailP; ?></h1>
                  <h1><?php if($opcao == 'Professor')echo 'celular do professor: '.$celularP; ?></h1>
                  <h1><?php if($opcao == 'Professor')echo 'telefone do professor: '.$telefoneP; ?></h1>
                  <h1><?php if($opcao == 'Professor')echo 'código da turma do professor: '.$idTurma?></h1>            
                  <h1><?php if($opcao == 'Professor')echo 'descrição da turma: '.$descricao?></h1>
                  <h1><?php if($opcao == 'Professor')echo 'horário de inicio: '.$horarioInicio?></h1>
                  <h1><?php if($opcao == 'Professor')echo 'horário de término: '.$horarioTermino?></h1>
                  <h1><?php if($opcao == 'Professor')echo 'nome do professor da turma: '.$nomeProfessor?></h1>
               </div>
               
            </div>
         </main>
      </section>
      
      
      <br><br>
      
      <section class="main-content">
         <main>
            <div class="main-box2">
               
            <br>

            <h1 class="Turma">Turma</h1>
               
              
            <div>
               
               <h1><?php if($opcao == 'Aluno')echo 'código de matricula do aluno: '.$idMatricula?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'data da matricula: '.$dataMatricula?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'código da turma do aluno: '.$idTurma?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'código da turma do professor: '.$idTurma?></h1>            
               <h1><?php if($opcao == 'Aluno')echo 'descrição da turma: '.$descricao?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'horário de inicio: '.$horarioInicio?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'horário de término: '.$horarioTermino?></h1>
               <h1><?php if($opcao == 'Aluno')echo 'nome do professor da turma: '.$nomeProfessor?></h1>
            </div>

            <div>
               <h1><?php if($opcao == 'Professor')echo 'código do professor: '.$idProfessor; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'nome do professor: '.$nomeProfessor; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'email do professor: '.$emailP; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'celular do professor: '.$celularP; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'telefone do professor: '.$telefoneP; ?></h1>
               <h1><?php if($opcao == 'Professor')echo 'código da turma do professor: '.$idTurma?></h1>            
               <h1><?php if($opcao == 'Professor')echo 'descrição da turma: '.$descricao?></h1>
               <h1><?php if($opcao == 'Professor')echo 'horário de inicio: '.$horarioInicio?></h1>
               <h1><?php if($opcao == 'Professor')echo 'horário de término: '.$horarioTermino?></h1>
               <h1><?php if($opcao == 'Professor')echo 'nome do professor da turma: '.$nomeProfessor?></h1>
            </div>

         </div>
      </main>
   </section>
  

   <footer class="footer-box" id="footer">
      <div class="footer-info">
         <div class="footer-info-title">
            <h3>Smart Gym</h3>
            <h4>informação</h4>
         </div>

         <div class="footer-info-text"> 
            <div>
               <p>(xx) xxxxx-xxxx</p>
               <p>(xx) xxxxx-xxxx</p>
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

