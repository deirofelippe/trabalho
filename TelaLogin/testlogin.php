<?php
    session_start();
    include_once('../config.php');
    //print_r($_REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        //acessa
        $email = $_POST['email'];
        $senha= $_POST['senha'];

     //   print_r('Email: ' . $email);
     //   print_r('Senha: ' . $senha);

     $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

     $result = $conexao->query($sql);
     $row = mysqli_fetch_assoc($result);

     //print_r($result);

     if(mysqli_num_rows($result) <1)
     {
        unset($_SESSION['email']);
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        unset($_SESSION['permissao']);
        header('Location: ../TelaLogin/login.php');
     }

     else
     {
        $nome = $row["nome"];
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['senha'] = $senha;
        $_SESSION['permissao'] = $row["permissao"];

        date_default_timezone_set("America/Sao_Paulo");
        $data = DateTimeImmutable::createFromFormat("d/m/Y H:i:s", date("d/m/Y H:i:s"), new DateTimeZone("America/Sao_Paulo"))->format("d/m/Y H:i:s");

        $query = "INSERT INTO logs (acao, nome, email, data) VALUES ('Login', '$nome', '$email', '$data')";
        $result = mysqli_query($conexao, $query);

        header('Location: ../2fa.html');
     }

    }
    else
    {
        //não acessa
        header('Location: ../TelaLogin/login.php');
    }

?>