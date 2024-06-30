<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="login">
        <form action="login2.php" method="post">
            <label for="opcao">Escolha o tipo de login:</label>
            <select name="opcao" id="opcao">
                <option value="Aluno">Aluno</option>
                <option value="Professor">Professor</option>
            </select>
            <div class="input-box">
                <input class="placeHolder" type="email" placeholder="Digite o e-mail" name="email" required>
                <input class="placeHolder" type="password" placeholder="Digite a senha" name="senha" required>
            </div>
            <input class="button-form" type="submit" value="Fazer Login">
        </form>
    </div>
</body>
</html>

