<?php
date_default_timezone_set('America/Sao_Paulo');

$host = "telecalldb.cbdhhfymtkyw.us-east-1.rds.amazonaws.com";
$user = "admin";
$pass = "adminadmin";
$banco = "trabalhodb";

$conexao = mysqli_connect($host, $user, $pass, $banco);
if($conexao === false){
  die("ERROR: Não foi possível se conectar ao banco de dados MySQL. " . mysqli_connect_error());
} 
else{
  mysqli_autocommit($conexao, FALSE);
}

?>

