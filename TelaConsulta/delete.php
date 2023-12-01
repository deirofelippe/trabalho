<?php

session_start();

if(!isset($_SESSION['permissao'])){
    header['Loation: ../TelaHome/home.php'];

  }
  if($_SESSION['permissao'] != 'admin'){
    header['Loation: ../TelaHome/home.php'];

  }    

// Include the database connection file
include_once("../config.php");

if(empty($_GET['id'])){
    header('Location: ../TelaConsulta/consulta.php');
}

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($conexao, "DELETE FROM usuario WHERE ID_CLI = $id");

// Redirect to the main display page (index.php in our case)
header("Location: ../TelaConsulta/consulta.php");

?>