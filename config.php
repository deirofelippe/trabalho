<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = ''; 
    $dbName = 'pizzaria';

    /* Criando a variável connection para se conectar ao banco de dados MySQL com os parâmetros passados */
    
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


    // Checando a conexão

    /*if($conexao->connect_errno)
    {
        echo "ERROR: Não foi possível se conectar ao banco de dados MySQL."; 
    }

    else{
        echo "Conexão efetuada com sucesso";
    }


    */ 
    // include_once('../config.php');


?>