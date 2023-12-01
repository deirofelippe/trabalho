
<?php
    if(isset($_POST['submit'])){
        include_once('../config.php');
        
        $tel_celular = $_POST['tel_celular'];
        $tel_fixo = $_POST['tel_fixo'];
        $nome = $_POST['nome'];
        $dt_nascimento = $_POST['dt_nascimento'];
        $sexo = $_POST['gender'];
        $nome_materno = $_POST['nome_mat'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $complemento = $_POST['complemento'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conexao, "INSERT INTO usuario(nome,dt_nascimento,sexo,nome_materno,cpf,tel_celular,tel_fixo,endereco,complemento,email,senha,cep)
        VALUES('$nome','$dt_nascimento','$sexo','$nome_materno','$cpf','$tel_celular','$tel_fixo','$endereco','$complemento','$email','$senha','$cep')");

        header('Location: ../TelaLogin/login.php');
    }
    
?>






<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Edição de Usuário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="imagem_login.svg" alt="">
        </div>
        <div class="form">
            <form action="./index.php" id="form" method= "POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Nome</label>
                        <input id="firstname" type="text" name="nome" placeholder="Digite seu nome" class="nome required" oninput="nameValidate()" required>
                        <span class="span-required">Nome deve ter no mínimo 15 caracteres</span>
                    </div>

                    <div class="input-box">
                        <label for="datetime">Data de Nascimento</label>
                        <input id="datetime" type="date" name="dt_nascimento" placeholder="Digite sua data de nascimento" class="date required" required>
                        <span class="span-required">Insira uma data de nascimento</span>
                    </div>

                    <div class="input-box">
                        <label for="nome_mat">Nome Materno</label>
                        <input id="nome_mat" type="text" name="nome_mat" placeholder="Digite o nome materno" class="nome_mat required" oninput="name_matValidate()" required>
                        <span class="span-required">Nome materno deve ter no mínimo 15 caracteres</span>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" class="cpf required"  required>
                        <span class="span-required">Digite um cpf válido</span>
                    </div>

                    <div class="input-box">
                        <label for="tel_cel">Telefone Celular</label>
                        <input id="tel_cel" type="tel" name="tel_celular" placeholder="(xx) xxxxx-xxxx" class="tel-cel required"  required>
                        <span class="span-required">Digite um telefone celular válido</span>
                    </div>

                    <div class="input-box">
                        <label for="tel_fixo">Telefone Fixo</label>
                        <input id="tel_fixo" type="tel" name="tel_fixo" placeholder="(xx) xxxx-xxxx" class="tel-fixo required" required>
                        <span class="span-required">Digite um Telefone fixo válido</span>
                    </div>

                    <div class="input-box">
                        <label for="cep">CEP</label>
                        <input id="cep" type="text" name="cep" placeholder="Digite seu endereço" class="cep required"  onblur="pesquisacep(this.value);" required>
                        <span class="span-required">Digite um cep válido</span>
                    </div>

                    <div class="input-box">
                        <label for="endereco">Endereço</label>
                        <input id="endereco" type="text" name="endereco" placeholder="Digite seu endereço" class="endereco required" required>
                        <span class="span-required">Digite um endereço válido</span>
                    </div>

                    <div class="input-box">
                        <label for="complemento">Complemento</label>
                        <input id="complemento" type="text" name="complemento" placeholder="Digite seu complemento" class="complemento required" required>
                        <span class="span-required">Digite um Complemento válido</span>
                    </div>

                    <div class="input-box">
                        <label for="email">Login</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu email" class="login required" oninput="loginValidate()" required>
                        <span class="span-required">Digite um email válido</span>
                    </div>

                    

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="senha" placeholder="Digite sua senha" class="senha required" oninput="mainPasswordValidate()" required>
                        <span class="span-required">Digite uma senha com no mínimo 8 caracteres</span>
                    </div>


                    <div class="input-box">
                        <label for="confirmPassword">Confirme sua Senha</label>
                        <input id="confirmPassword" type="password" name="confirmar_senha" placeholder="Digite sua senha novamente"  class="confirmar_senha required" oninput="comparePassword()" required>
                        <span class="span-required">Senhas devem ser compatíveis</span>
                    </div>

                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="female" type="radio" name="gender" value="feminino" class="feminino required" required>
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input id="male" type="radio" name="gender" value="masculino" class="masculino required" required>
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input id="others" type="radio" name="gender" value="outros"  class="outros required" required>
                            <label for="others">Outros</label>
                        </div>

                    </div>
                </div>
                <input type="submit" name="submit" class="btn-solid" />
                    <div class="register">
                    </div>
            </form>
        </div>
    </div>
    
    <script src="form.js"></script>
    <script>
        window.addEventListener("load", function(){
            document.getElementById("firstname").value = "Teste Teste Teste";
            document.getElementById("datetime").value = "2023-11-30";
            document.getElementById("nome_mat").value = "Teste Teste Teste";
            document.getElementById("cpf").value = "14563225282";
            document.getElementById("tel_cel").value = "21991028946";
            document.getElementById("tel_fixo").value = "21991028946";
            document.getElementById("endereco").value = "Teste";
            document.getElementById("complemento").value = "teste";
            document.getElementById("cep").value = "21555020";
            document.getElementById("email").value = "teste@teste.teste";
            document.getElementById("password").value = "12345678";
            document.getElementById("confirmPassword").value = "12345678";
            document.getElementById("male").checked = true;
        });
    </script>

</body>

</html>