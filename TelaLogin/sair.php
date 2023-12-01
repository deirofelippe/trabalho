<?php
session_start();
session_destroy();

$nome = $_SESSION['nome'];
$email = $_SESSION['email'];

include_once("../config.php");

date_default_timezone_set("America/Sao_Paulo");
$data = DateTimeImmutable::createFromFormat("d/m/Y H:i:s", date("d/m/Y H:i:s"), new DateTimeZone("America/Sao_Paulo"))->format("d/m/Y H:i:s");
$query = "INSERT INTO logs (acao, nome, email, data) VALUES ('Logout', '$nome', '$email', '$data')";
$result = mysqli_query($conexao, $query);

unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['nome']);
unset($_SESSION['permissao']);
header('Location: login.php');
?>