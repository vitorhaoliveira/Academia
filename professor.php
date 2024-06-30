<?php
session_start(); // Inicia a sessão (se ainda não estiver iniciada)

// Verifica se $_SESSION['nome'] está definida antes de acessá-la
$nome_professor = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Nome do Professor';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Smart Gym - Professor</title>
   <link rel="stylesheet" href="styles/style.css">
   <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
  

    <style>

.box-button{
    display: flex;
    flex-direction: row;
}

.button_busca{
    margin-left: 4%;
    background-color: blue;
    font-size: 16px;
    font-weight: bolder;
    padding: 1%;
    color: white;
    border-radius: 20px;
}

.titulo{
    padding-left: 3%;
}

.perfil{
    margin-top: -12px;
    margin-right: 16px;
    margin-left: -32px;
    display: flex;
}

.box-login{
    display: flex;
    flex-direction: row;
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

   </header>

   <main>
      <section class="main-content">
         <h1 class="titulo" >Bem-vindo, Professor: <?php echo htmlspecialchars($nome_professor); ?></h1>

         <!-- Botões para ver perfil e turmas ministradas -->
         <div class="box-button">
            <a class="button_busca" href="ver_perfilProfessor.php">Ver Perfil</a><br>
            <a class="button_busca" href="ver_turmasProfessor.php">Ver Turmas Ministradas</a>

         </div>
      </section>

      <!-- Outras seções da página conforme necessário -->
   </main>

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
