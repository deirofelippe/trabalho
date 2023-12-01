<?php

session_start();

if(!isset($_SESSION['permissao'])){
    header['Loation: ../TelaHome/home.php'];

  }
  if($_SESSION['permissao'] != 'admin'){
    header['Loation: ../TelaHome/home.php'];

  }    



if(isset($_POST) && !empty($_POST))
    {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $dt_nascimento = $_POST["dt_nascimento"];
        $sexo = $_POST["sexo"];
        $nome_materno = $_POST["nome_materno"];
        $cpf = $_POST["cpf"];
        $tel_celular = $_POST["tel_celular"];
        $tel_fixo = $_POST["tel_fixo"];
        $endereco = $_POST["endereco"];
        $complemento = $_POST["complemento"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        include_once("../bd_pizzaria/config.php");
        $query = "UPDATE usuario set nome = '$nome', dt_nascimento = '$dt_nascimento' ,sexo = '$sexo' ,nome_materno = '$nome_materno',cpf = '$cpf' ,tel_celular = '$tel_celular',tel_fixo = '$tel_fixo', endereco = '$endereco' ,complemento = '$complemento' ,email = '$email' ,senha = '$senha' WHERE ID_CLI=".$id;
        $result = mysqli_query($conexao, $query);
        header($header = 'Location: ../consulta.php?mensagem=Usuário editado com sucesso');
        exit();

    }
    else if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
        include_once("../config.php");

        $query = "SELECT * FROM usuario WHERE ID_CLI = ".$_GET["id"];

        $result = mysqli_query($conexao, $query);

        $dados = mysqli_fetch_array($result);

        $id = $dados["ID_CLI"];
        $nome = $dados["nome"];
        $email = $dados["email"];
        $dt_nascimento = $dados["dt_nascimento"];
        $sexo = $dados["sexo"];
        $nome_materno = $dados["nome_materno"];
        $cpf = $dados["cpf"];
        $tel_celular = $dados["tel_celular"];
        $tel_fixo = $dados["tel_fixo"];
        $endereco = $dados["endereco"];
        $complemento = $dados["complemento"];
        $senha = $dados["senha"];

    }
    else {
        header("Location: ../TelaLogin/edit.php?mensagem=Selecione um usuário para editar");
        exit();
    }



    

?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Edição de Usuário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="imagem_edit_pizzaria.svg" alt="">
        </div>

       
        <div class="form">
            <form action="edit.php" method = "post">
                <div class="form-header">
                    <div class="title">
                        <h1>Edição</h1>
                    </div>
                </div>
                
                <div class="input-group">

                <input id="id" type="hidden" value="<?php echo $id; ?>" name="id">

                    <div class="input-box">
                        <label for="nome">Nome</label>
                        <input id="nome" type="text" value="<?php echo $nome; ?>" name="nome" required>
                    </div>

                    <div class="input-box">
                        <label for="dt_nascimento">Data de Nascimento</label>
                        <input id="dt_nascimento" type="date" value="<?php echo $dt_nascimento; ?>" name="dt_nascimento"  required>
                    </div>

                    <div class="input-box">
                        <label for="nome_materno">Nome Materno</label>
                        <input id="nome_materno" type="text" value="<?php echo $nome_materno; ?>" name="nome_materno"  required>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" value="<?php echo $cpf; ?>" name="cpf"  required>
                    </div>

                    <div class="input-box">
                        <label for="tel_celular">Celular</label>
                        <input id="tel_celular" type="tel" value="<?php echo $tel_celular; ?>" name="tel_celular"  required>
                    </div>

                    <div class="input-box">
                        <label for="tel_fixo">Telefone fixo</label>
                        <input id="tel_fixo" type="tel" value="<?php echo $tel_fixo; ?>" name="tel_fixo"  required>
                    </div>

                    <div class="input-box">
                        <label for="endereco">Endereço</label>
                        <input id="endereco" type="text" value="<?php echo $endereco; ?>" name="endereco"  required>
                    </div>

                    <div class="input-box">
                        <label for="complemento">Complemento</label>
                        <input id="complemento" type="text" value="<?php echo $complemento; ?>" name="complemento" required>
                    </div>

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" value="<?php echo $email; ?>" name="email"  required>
                    </div>

                    

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="senha" value="<?php echo $senha; ?>" name="senha"  required>
                    </div>


                    <!--<div class="input-box">
                        <label for="confirmPassword">Confirme sua Senha</label>
                        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Digite sua senha novamente" required>
                    </div>-->

                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="feminino" type="radio" value="feminino" name="sexo">
                            <label for="feminino">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input id="masculino" type="radio" value="masculino" name="sexo">
                            <label for="masculino">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input id="outros" type="radio" value="outros" name="sexo">
                            <label for="outros">Outros</label>
                        </div>

                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit">Enviar</button>
                </div>

                
            </form>

            

        </div>
    </div>
</body>

</html>