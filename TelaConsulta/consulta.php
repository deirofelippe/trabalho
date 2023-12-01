        <?php
        
        session_start();

        if(!isset($_SESSION['permissao'])){
          header('Location: ../TelaHome/home.php');

        }
        if($_SESSION['permissao'] != 'admin'){
          header('Location: ../TelaHome/home.php');

        }
             
          // Aqui estou incluindo o arquivo de configuração
        require_once "../config.php";

        if(isset($_GET['search'])){
          $search = $_GET['search'];
          $sql = "SELECT *
                FROM usuario
                WHERE
                    nome LIKE '%$search%' or
                    email LIKE '%$search%' or
                    ID_CLI LIKE '%$search%'";
          $result = mysqli_query($conexao, $sql);
        }else{
        
        // Montando o comando select para exibir a lista de usuários
        $sql = "SELECT * FROM usuario";
        $result = mysqli_query($conexao, $sql);
        }

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
  <div class="hero">
    <nav>
      <img class="logo" src="logo-pizzaria-upp--light.png" alt="logo">
      <ul>
        <li><a href="../TelaHome/home.php">Home</a></li>
        <li><a href="../Tela-Quem-Somos/index.html">Quem Somos</a></li>
        <li><a href="../TelaCardápio/index.html">Cardápio</a></li>
        <li><a href="#">Pesquisa</a></li>
        <li><a href="../Tela-Modelo-Banco/index.html">DER</a></li>
      </ul>
      <div class="user-pic"><i class="fa-solid fa-user" onclick="toggleMenu()"></i></div>

      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
           <i class="fa-solid fa-user"></i>
            <h5>Usuário Master</h5>
          </div>
          <hr>
          <a href="#" class="sub-menu-link">
            <i class="fa-solid fa-door-open"></i>
            <p>Sair</p>
            <span>></span>
          </a>
        </div>
      </div>

      <div class="mobile-menu-icon">
        <button type="button" onclick="menuShow()"><img class="icon" src="menu_white_36dp.svg" alt=""></button>
    </div>
    </nav>
    <div class="mobile-menu">
      <ul>
          <li class="nav-item"><a href="../TelaHome/home.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="../Tela-Quem-Somos/index.html" class="nav-link">Quem Somos</a></li>
          <li class="nav-item"><a href="../TelaCardápio/index.html" class="nav-link">Cardápio</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Pesquisa</a></li>
          <li class="nav-item"><a href="../Tela-Modelo-Banco/index.html" class="nav-link">DER</a></li>
          <div class="user-pic2"><i class="fa-solid fa-user" onclick="toggleMenu()"></i></div>
      </ul>
    </div>

  </div>
    

  <!-- container start-->
  <div class="container">
    <div class="tbl_container">

      <div class="search-container">
        <form action="">
          <input type="text" placeholder="Pesquisar..." id="pesquisar">
          <button id="search_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div>
      
        <table class="tbl">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Permissão</th>
                    <th colspan="2">Ação</th>
                   
                </tr>
            </thead>
            <tbody>

                <?php
                while($row = mysqli_fetch_assoc($result)){
                   $id = $row['ID_CLI'];
                   $idDelete = $row['ID_CLI'];
                   $nome = $row['nome'];
                   $email = $row['email'];
                   $permissao = $row['permissao'];

                   $admin_email = $_SESSION['email'];
                   if($email == $admin_email){
                      $idDelete = "";
                   }


                ?>
                <tr>
                    <td data-Lable="Id"><?php echo $id;?> </td>
                    <td data-Lable="Nome"> <?php echo $nome;?> </td>
                    <td data-Lable="Email"> <?php echo $email;?> </td>
                    <td data-Lable="Permissão"> <?php echo $permissao;?> </td>

                    <td data-Lable="Editar">
                        <a class="btn_edit" href ="../TelaConsulta/edit.php?id=<?php echo $row["ID_CLI"];?>"><i class="fa-solid fa-pen-to-square"></i></button>
                    </td>

                    <td data-Lable="Deletar">
                        <a class="btn_trash" href ="../TelaConsulta/delete.php?id=<?php echo $idDelete;?>"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

                <?php }; ?> <!-- parou o while-->

            </tbody>
        </table>
    </div>
</div>
<!-- container close-->
    


     <!--FOOTER-->
    <footer class="footer">
        <div class="footer-container">
          <div class="row">
            <div class="footer-col">
              <h4>Empresa</h4>
              <ul>
                <li><a href="../Tela-Quem-Somos/index.html">Quem Somos</a></li>
                <li><a href="../TelaCardápio/index.html">Cardápio</a></li>
                <li><a href="#">Política de Privacidade</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Contato</h4>
              <ul>
                <li><a href="#">(21) 3489-2537</a></li>
                <li><a href="#">PizzariaUPP@hotmail.com</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Franquias</h4>
              <ul>
                <li><a href="#">Bangu</a></li>
                <li><a href="#">Barra da Tijuca</a></li>
                <li><a href="#">Copacabana</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Nos siga nas redes sociais</h4>
              <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
        </div>
     </footer>

    <script src="java.js"></script>
    <script>
  document.getElementById("search_btn").addEventListener("click",function(event) {
    event.preventDefault();
    const search = document.getElementById('pesquisar');
    window.location ='../TelaConsulta/consulta.php?search='+search.value;
  });
  </script>
</body>

</html>