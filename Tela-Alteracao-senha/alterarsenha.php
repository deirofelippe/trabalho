<?php

 session_start();

if(!isset($_SESSION['permissao'])){
    header('Location: ../TelaHome/home.php');

  }
  if($_SESSION['permissao'] != 'cliente'){
    header('Location: ../TelaHome/home.php');

  }    



if(isset($_POST) && !empty($_POST))
    {
        $id = $_POST["id"];
        $senha = $_POST["senha"];
        //$confirmar_senha = $_POST["confirmar_senha"];

        include_once("../config.php");
        $query = "UPDATE usuario set senha = '$senha' WHERE ID_CLI=".$id;
        $result = mysqli_query($conexao, $query);
        header($header = 'Location: ../TelaHome/home.php?mensagem=Senha atualizada com sucesso');
        exit();

    }
    // else if(isset($_GET["id"]) && !empty($_GET["id"]))
    // {
        include_once("../config.php");

    //     $query = "SELECT * FROM usuario WHERE ID_CLI = ".$_GET["id"];

    //     $result = mysqli_query($conexao, $query);

    //     $dados = mysqli_fetch_array($result);

    //     $id = $dados["ID_CLI"];
    //     $senha = $dados["senha"];

    // }
    // else {
    //     header("Location: ../Tela-Alteracao-senha/alterarsenha.php?mensagem=Selecione um usuário para editar");
    //     exit();
    // }



    

?>







<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
</head>
<body>
    <!--Container da tela de login-->
    <div class="container">
        <h2>Alteração de Senha</h2>
        
        <!--Inicio do formulario-->
        <form action="../TelaHome/home.php" method="post">
        <!-- <input id="id" type="hidden" value="<?php echo $id; ?>" name="id"> -->

            <div class="input-field">
                <input type="password" id="senha" placeholder="********">
                <label for="senha">Senha:</label>
            </div>

            <div class="input-field">
                <input type="password" id="confirmar_senha" placeholder="********">
                <label for="confirmar_senha">Confirmação de Senha:</label>
            </div>

            <div class="center">
                <button>Enviar</button>
            </div>
        </form><!--Fim do Formulario-->
       
    </div>
</body>
</html>