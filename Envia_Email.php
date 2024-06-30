<?php


//$nome = $_POST['nome'];
$para = $_POST['email'];
$assunto = 'Promoções e Novidades da SmartGym';
$corpo = 'Somente nessa semana, em todas as unidades da SmartGym será realizada uma promoção de inauguração.' 
        .PHP_EOL .
        'O plano Standard de R$70,00 será anunciado por apenas R$55,00 somente nessa semana';
$headers = "From:" . $para; //Cabeçalho para envio do email

if (mail ($para,$assunto,$corpo,$headers))
{
	echo "Email enviado para $para com sucesso!";
}else{
	echo "Falha no envio do email, a partir da conta $headers.";
}

?>

