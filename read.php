
<?php
    // Aqui estou incluindo o arquivo de configuração
    require_once "../bd_pizzaria/config.php";
    
    // Preparando o statement do comando select
    $sql = "SELECT usu_nome, usu_login, usu_senha FROM USUARIO WHERE USU_CODIGO = ?";
    
    if($stmt = mysqli_prepare($connection, $sql)){
        // liga as variáveis do "prepared statement" ao id passado por parâmetro
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // seta o parâmetro.
        $param_id = trim($_GET["id"]);
        
        // executa a consulta (prepared statement)
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Aqui verifica se trouxe um row no resultset. 
				Neste caso não precisa fazer um loop já que garantiremos que vai trazer só 1 usuário*/
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Recupera cada valor do campo do row.
                $nome = $row["usu_nome"];
                $login = $row["usu_login"];
                $senha = $row["usu_senha"];
            } else{
                // Se na sua url não tiver um id válido. redireciona para a página de erro
                header("location: ../error.php");
                exit();
            }
            
        } else{
            echo "Oops! Algo deu errado. Tente de novo.";
        }
    }
     
    // Fecha o statement
    mysqli_stmt_close($stmt);
    
    // Fecha a conexão com o banco de dados.
    mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendo o Usuário no Banco de Dados</title>
</head>
<body>
    Nome: <?php echo $nome ?><br>
    Login: <?php echo $login ?><br>
    Senha: <?php echo $senha ?><br>
    <a href="../consulta.php" class="btn btn-primary">Voltar</a>
</body>
</html>