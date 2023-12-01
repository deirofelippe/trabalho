<?php

session_start();

if(!isset($_SESSION['permissao'])){
    header('Location: home.php');
}

if($_SESSION['permissao'] != 'admin') {
    header('Location: home.php');
}

require_once "config.php";

$sql = "SELECT * FROM logs ORDER BY data DESC";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d4c1afd8e0.js" crossorigin="anonymous"></script>
    <title>Tela de Pesquisa</title>
</head>
<body>
  <!-- container start-->
  <div class="container">
    <div class="tbl_container">
        <table class="tbl">
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data</th>
                   
                </tr>
            </thead>
            <tbody>

                <?php
                while($row = mysqli_fetch_assoc($result)){
                    $acao = $row['acao'];
                    $nome = $row['nome'];
                    $email = $row['email'];
                    $data = $row['data'];
                ?>
                <tr>
                    <td><?php echo $acao;?> </td>
                    <td><?php echo $nome;?> </td>
                    <td><?php echo $email;?> </td>
                    <td><?php echo $data;?> </td>
                </tr>

                <?php }; ?> <!-- parou o while-->

            </tbody>
        </table>
    </div>
</div>
</body>          
</html>