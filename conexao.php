<?php
date_default_timezone_set('America/Sao_Paulo');

$host = "127.0.0.1";
$user = "root";
$pass = "root";
$banco = "trabalhodb";

$conexao = mysqli_connect($host, $user, $pass, $banco);
if($conexao === false){
  die("ERROR: Não foi possível se conectar ao banco de dados MySQL. " . mysqli_connect_error());
} 
else{
  mysqli_autocommit($conexao, FALSE);
}

?>

