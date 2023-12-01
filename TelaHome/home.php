<?php

  session_start();

$esta_logado = "Login";
$link_esta_logado = "../TelaLogin/login.php";
if(isset($_SESSION['nome'])){
  $esta_logado = "Logout";
  $link_esta_logado = "../TelaLogin/sair.php";
}

$nome = "";
if(isset($_SESSION['nome'])){
  $nome = $_SESSION['nome'];
}

$consulta_menu = "";
$der_menu = "";
$logs_menu = "";
if(isset($_SESSION['permissao'])){
  if($_SESSION['permissao'] == "admin"){
    $consulta_menu = "<li><a href='../TelaConsulta/consulta.php'>Consulta</a></li>";
    $der_menu = "<li><a href='../Tela-Modelo-Banco/index.html'>DER</a></li>";
    $logs_menu = "<li><a href='../TelaLogs/consulta.php'>Logs</a></li>";
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d4c1afd8e0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Home</title>

    <style>

      /*MENU*/
          * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }

          body {
            margin: 0 auto;
            padding: 0;
            background-color: #fff;
          }

          /*Menu*/
          .hero{
            width: 100%; 
            position: relative;
            background: #fff;
          }

          nav{
            background: #fff;
            width: 100%;
            padding: 10px 10%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
          }

          .logo{
            width: 120px;
          }


          nav ul{
            width: 100%;
            text-align: right;
            display: flex;
            justify-content: space-around;
          }

          .nav ul li{
            display: inline-block;
            list-style: none;
            margin: 10px 20px;
          }

          nav ul li a{
            color: #aa011c;
            text-decoration: none;
          }

          nav ul li a:hover{
            border-bottom: 2px solid #aa011c;

          }

          .sub-menu-wrap{
            position: absolute;
            top: 100%;
            right: 10%;
            width: 320px;
            max-height: 0px;
            overflow: hidden;
            transition: max-heigth 0.5s;
          }

          /*.sub-menu-wrap.open-menu{
            max-height: 400px;
          }*/

          .sub-menu{
            background: #fff;
            padding: 20px;
            margin: 10px;
          }

          .sub-menu hr{
            border: 1;
            height: 1px;
            width: 100%;
            background: #ccc;
            margin: 15px 0 10px;
          }

          .sub-menu-link{
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #525252;
            margin: 12px 0;
          }

          .sub-menu-link p{
            width: 100%;
          }

          .sub-menu-link i{
            width: 40px;
            background: #e5e5e5;
            border-radius: 50%;
            padding: 8px;
            margin-right: 15px;
          }

          .sub-menu-link span{
            font-size: 22px;
            transition: transform 0.5s;
          }

          .sub-menu-link:hover span{
            transform: translateX(5px);
          }

          .sub-menu-link:hover p{
            font-weight: 600;
          }

          /*MOBILE-MENU-DESKTOP*/

          .mobile-menu-icon {
            display: none;
            border-radius: 50%;
            border: 2px solid black;
            height: 40px;
            background-color: #aa011c;
          }

          .mobile-menu {
            display: none;
          }

          .mobile-menu ul li a{
            color: #aa011c;
            text-decoration: none;
          }

          .mobile-menu-icon{
            display: none;
          }


          /*dropdown*/
          .profile-dropdown {
            position: relative;
            width: fit-content;
          }

          .profile-dropdown-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-right: 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            width: 150px;
            border-radius: 50px;
            color: var(--black);
            /* background-color: white;
            box-shadow: var(--shadow); */

            cursor: pointer;
            border: 1px solid black;
            transition: box-shadow 0.2s ease-in, background-color 0.2s ease-in,
              border 0.3s;
          }

          .profile-dropdown-btn:hover {
            background-color: #cac8c8;
            box-shadow: var(--shadow);
          }

          .profile-img {
            position: relative;
            width: 3rem;
            height: 2.5rem;
            border-radius: 50%;
            margin-left: 0.2rem;
            margin-top: 5px;
            margin-bottom: 5px;
            
          }


          .profile-img i {
            margin-right: 0.8rem;
            font-size: 1.4rem;
            width: 2.6rem;
            height: 2.6rem;
            background-color: #393e46;
            color: var(--white);
            line-height: 2.6rem;
            text-align: center;
            border-radius: 50%;
            transition: margin-right 0.3s;
          }

          .profile-dropdown-btn span {
            margin: 0 0.5rem;
            margin-right: 0;
          }

          .profile-dropdown-list {
            position: absolute;
            top: 68px;
            width: 220px;
            right: 0;
            height: 50px;
            background-color: var(--white);
            border-radius: 10px;
            max-height: 0;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: max-height 0.5s;
            z-index: 1;
          }

          /*.profile-dropdown-list hr {
            border: 0.5px solid #aa011c;
          }*/

          .profile-dropdown-list.active {
            max-height: 500px;
            height: 80px;
          }

          .profile-dropdown-list-item {
            padding: 0.5rem 0rem 0.5rem 1rem;
            transition: background-color 0.2s ease-in, padding-left 0.2s;
            width: 100%;
            border-top: 2px solid #aa011c;
          }

          .profile-dropdown-list-item a {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--black);
            margin-top: 5px;
            transition: 0.5s;
          }
          .profile-dropdown-list-item a:hover{
            border-bottom: none;
          }

          .profile-dropdown-list-item a i {
            margin-right: 0.8rem;
            font-size: 1.4rem;
            width: 2.6rem;
            height: 2.6rem;
            background-color: #393e46;
            color: var(--white);
            line-height: 2.6rem;
            text-align: center;
            margin-right: 1rem;
            border-radius: 50%;
            transition: margin-right 0.3s;
          }

          .profile-dropdown-list-item a:hover {
            padding-left: 1.5rem;
          }



          /*DROPDOWN 2*/
          .profile-dropdown2 {
            position: relative;
            width: fit-content;
          }




          /*MENU MOBILE*/
          @media screen and (max-width: 800px) {
            /*MENU-PADRÃO*/
            .hero ul{
              display: none;
            }

            /*DROPDOWN*/
            .profile-dropdown{
              display: none;
            }

            /*DROPDOWN 2*/
            .profile-dropdown2{
              margin-left: auto;
              margin-right: auto;
              padding-top: 1.2rem;
              padding-bottom: 0.5rem;
            }
            .profile-dropdown-list {
              max-height: 50px;
              height: 100%;
              z-index: 0; /*O ERRO ESTÁ NO QUERYSELECTOR NO MENU.JS*/
            }
            
            .fa-lock span {
              display: none;
            }
            

            /*MENU-MOBILE*/
            .nav-bar {
                padding: 1.5rem 4rem;
            }
            .nav-item {
                display: none;
            }
            .mobile-menu-icon {
                display: block;
            }
            .mobile-menu-icon button {
                background-color: transparent;
                border: none;
                cursor: pointer;
            }
            .mobile-menu ul {
                display: flex;
                flex-direction: column;
                text-align: center;
                padding-bottom: 1rem;
            }
            .mobile-menu .nav-item {
                display: block;
                padding-top: 1.2rem;
            }
            .mobile-menu .login-button {
                display: block;
                padding: 1rem 2rem;
            }
            .mobile-menu .login-button button {
                width: 100%;
            }
            .open {
                display: block;
            }
          }*



          /*Primeiro-Div*/
          .primeira-imagem {
            background-image: url("./imagem-principal-oficial.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #cccccc;
            min-height: 700px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            position: relative;
          }
          .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
          }

          .inicial-content {
            display: flex;
            flex-direction: column;
            align-items: start;
            width: 100%;
            max-width: 860px;
            padding: 2rem;
            gap: 24px;
            z-index: 200;
          }
          .title {
            font-size: 4rem;
            color: #fff;
          }

          .btn-acesso {
            width: 60%;
            height: 50px;
            border-radius: 10px;
            font-size: 1.5rem;
            color: #fff;
            background-color: #aa011c;
            border: 2px solid black;
            font-family: sans-serif;
            cursor: pointer;
          }

          .btn-acesso:hover {
            transform: translateY(-5px);
            transition: 1s;
          }

          /*SLIDE*/

          .slider {
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 100px;
          }

          .slides {
            width: 500%;
            display: flex;
          }

          .slides input {
            display: none;
          }

          .slide {
            width: 20%;
            transition: 3s;
          }

          .slide img {
            width: 100%;
            height: auto;
          }

          /*css for manual slide navigation*/

          .navigation-manual {
            position: relative;
            width: 100%;
            margin-top: -40px;
            display: flex;
            justify-content: center;
            align-items: center;
          }

          .manual-btn {
            border: 2px solid black;
            padding: 7px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
            margin-bottom: 10px;
          }

          .manual-btn:not(:last-child) {
            margin-right: 40px;
          }

          .manual-btn:hover {
            background: #24262b;
          }

          #radio1:checked ~ .first {
            margin-left: 0%;
          }

          #radio2:checked ~ .first {
            margin-left: -20%;
          }

          #radio3:checked ~ .first {
            margin-left: -40%;
          }

          /*CUBOS-TODOS*/

          .cubos-todos {
            display: flex;
            align-items: stretch;
            justify-content: space-between;
            width: 100%;
            gap: 24px;
            padding: 1rem;
          }

          .cubo-grande {
            width: 100%;
            border-radius: 6px;
            display: inline-block;
            justify-content: center;
            align-items: center;
            border: 3px solid black;
            animation: cubo-animation 5s infinite;
            margin-top: 40px;
            min-height: 300px;
          }

          .cubo-grande img{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
          }

          @keyframes cubo-animation {
            0% {
              transform: translateY(0px);
            }
            50% {
              transform: translateY(-40px);
            }
            100% {
              transform: translateY(0px);
            }
          }

          .cubo-menor {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
          }

          .cubo-pequeno {
            border-radius: 12px;
            display: inline-block;
            border: 3px solid black;
          }

          .cubo-pequeno:hover {
            transform: translate(-5px, -5px);
            transition: 0.5s;
          }

          .cubo-pequeno img {
            width: 100%;
            height: 100%;
            mix-blend-mode: multiply;
          }

          /*H6*/
          h6 {
            font-size: 3rem;
            color: #aa011c;
            justify-content: center;
            align-items: center;
            display: flex;
            font-family: sans-serif;
            margin-top: 300px;
            margin-bottom: 50px;
          }

          /*CARD Vertical*/

          h3 {
            margin-top: 20px;
            font-size: 1.2rem;
          }

          .centraliza-card {
            width: 100%;
            align-items: center;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
            font-family: sans-serif;
          }
          .card-flip {
            position: relative;
          }
          .card-flip > .front,
          .card-flip > .back {
            display: block;
            transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition-duration: 0.5s;
            transition-property: transform, opacity;
          }
          .card-flip > .front {
            transform: rotateX(0deg);
            padding: 0;
          }
          .card-flip > .back {
            position: absolute;
            opacity: 0;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            transform: rotateX(-180deg);
            padding: 2rem 1rem;
          }
          .card-flip:hover > .front {
            transform: rotateX(180deg);
          }
          .card-flip:hover > .back {
            opacity: 1;
            transform: rotateX(0deg);
          }
          .card-flip {
            position: relative;
            display: inline-block;
            max-width: 360px;
            width: 100%;
          }

          .card-flip img {
            width: 100%;
            padding: 0;
            height: 80%;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
          }

          .card-flip > .front,
          .card-flip > .back {
            display: block;
            color: #800000;
            width: 100%;
            background-size: cover !important;
            background-position: center !important;
            height: 320px;
            background: #fff;
            border-radius: 10px;
            border: 5px solid black;
          }
          .card-flip > .front p,
          .card-flip > .back p {
            font-size: 1em;
            line-height: 160%;
            color: #24262b;
            margin-bottom: 5px;
          }

          .back p {
            margin-top: 30px;
          }

          h2 {
            display: flex;
            justify-content: center;
            align-items: center;
          }

          .text-shadow {
            justify-content: center;
            display: flex;
          }

          /*PARALLAX*/
          /*parallax*/

          .wrapper {
            width: 100%;
            margin: 0 auto;
            position: absolute;
          }

          section.module p {
            margin-bottom: 40px;
          }

          .carousel-section {
            display: block;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            position: relative;
            overflow: hidden;
            background-size: cover;
          }

          /*Content-Informativo*/
          section.module.content {
            margin-top: 150px;
          }

          /*COR DE FUNDO - PARALLAX*/
          .module-parallax-1 {
            display: block;
            background-color: #fff;
          }

          .module-parallax-2 {
            background-color: #fff;
            padding: 2rem 0;
          }

          /*CARD-Comentarios*/
          .profile-card {
            width: 100%;
            max-width: 360px;
            height: auto;
            display: inline-flex;
            justify-content: center;
            text-align: center;
            font-family: sans-serif;
            margin-top: 28px;
          }
          .depoimentos {
            display: flex;
            align-items: stretch;
            justify-content: center;
            flex-wrap: wrap;
            width: 100%;
            gap: 36px;
          }
          .profile-body:hover {
            transform: translateY(-20px);
            transition: 1s;
          }

          .profile-card .profile-header img {
            width: 100%;
            max-height: 150px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
          }
          .profile-card .profile-body {
            background-color: #fff;
            border-radius: 18px;
            border: 3px solid black;
          }
          .profile-card .profile-body .img-perfil {
            margin-top: -85px;
            margin-bottom: 20px;
          }
          .profile-card .profile-body .img-perfil img {
            width: 120px;
            height: 120px;

            border-radius: 50%;
            padding: 3px;
            background-color: #ededed;
          }
          .profile-card .profile-body .titulo {
            font-size: 30px;
            color: #aa011c;
          }
          .profile-card .profile-body .descricao {
            font-size: 14px;
            font-weight: 400;
            line-height: 1.6;
            padding: 5px 20px;
          }

          /*FOOTER*/
          .footer-container {
            max-width: 1170px;
            margin: auto;
          }
          .row {
            display: flex;
            flex-wrap: wrap;
          }
          .footer-col ul {
            list-style: none;
            padding-inline-start: 0px;
          }
          .footer {
            background-color: #24262b;
            padding: 70px 0;
            margin-top: 100px;
            font-family: sans-serif;
          }
          .footer-col {
            width: 25%;
            height: 200px;
          }
          .footer-col h4 {
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
          }
          .footer-col h4::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #aa011c;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
          }
          .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
          }
          .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
          }
          .footer-col ul li a:hover {
            color: #ffffff;
            padding-left: 8px;
          }
          .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
          }
          .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #aa011c;
          }

          /*Responsividade*/

          /*CARD-RESPONSIVO*/
          @media (max-width: 1079px){
            .card-flip > .front,
          .card-flip > .back {
            margin-bottom: 20px;
          }
          }

          /*FOOTER Responsivo*/
          @media (max-width: 800px) {
            .footer-col {
              width: 50%;
              margin-bottom: 30px;
            }
            .header {
              padding: 12px 18px;
            }
            .mobile-menu-icon {
              display: flex;
            }
            .desktop-nav-list {
              display: none;
            }
            .inicial-content {
              width: 100%;
            }
            .title {
              font-size: 2rem;
              color: #fff;
            }
            .btn-acesso {
              width: 100%;
            }
            .primeira-imagem {
              min-height: 300px;
            }
            .cubos-todos {
              flex-direction: column;
            }
            .cubo-menor {
              grid-template-columns: 1fr;
              gap: 24px;
            } 
          }

          @media (max-width: 638px){
            .navigation-manual{
              display: none;
            }
          }
          @media (max-width: 600px) {
            .footer-col {
              width: 100%;
            }
            .cubo-grande{
              min-width: 200px;
            }
          }

          @media (max-width: 419px){
            .cubo-grande{
              min-width: 200px;
              min-height: 200px;
            }
            .cubo-grande img{
              width: 100%;
              height: 100%;
              display: flex;
              justify-content: center;
              align-items: center;
              background-size: cover;
            }
          }
          @media (max-width: 325px){
            .btn-acesso{
              font-size: 0.9rem;
            }
          }

          @media (max-width: 297px){
            .btn-acesso{
              font-size: 0.8rem;
            }
          }

          @media (max-width: 293px){
            .cubo-grande img{
              display: flex;
              align-items: center;
              justify-content: center;
            }

          }
            @media (max-width: 288px){
              .cubo-grande img{
                height: 200px;
            }
          }




          /*SLIDE-PIZZAS*/
          .fundo-slide{
            width: 100%;
            height: 700px;
            background-size: cover;
            margin-top: 100px;
          }

          .titulo-slide-2 {
            margin-top: 100px;
          }

          .slideshow-container {
            position: relative;
            margin: auto;
            cursor: pointer;
          }

          .slideshow {
            display: none;
          }

          .slideshow-container{ 
            width:100%;
            height: 395px;
          }

          .prev,
          .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: black;
            background-color: #aa011c;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
          }
          .next {
            right: 0;
            border-radius: 3px 0 0 3px;
          }
          .prev:hover,
          .next:hover {
            background-color: rgba(0, 0, 0, 0.6);
            color: #aa011c;
          }

          .numeracao {
            color: #f2f2f2;
            font-size: 12px;
            position: relative;
            opacity: 1;
            height: 0px;
          }

          .slideshow .numeracao .legenda {
            padding: 20px;
            text-align: center;
            transform: translateY(-200%);
            opacity: 0;
            transition: 0.5s;
          }

          .slideshow .numeracao:hover .legenda {
            transform: translateY(-103%);
            opacity: 1;
            background-color: rgba(0, 0, 0, 0.6);
          }

          .legenda {
            color: white;
            font-family: sans-serif;
            font-size: 1.1rem;
          }




          .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 2s;
            animation-name: fade;
            animation-duration: 2s;
          }

          /*MODO DE PASSAGEM DOS SLIDES*/
          @-webkit-keyframes fade {
            from {
                opacity: .4;
            }
            to {
                opacity: 1;
            }
          }
          @keyframes fade {
            from {
                opacity: .4;
            }
            to {
                opacity: 1;
            }
          }

          /*BTN-AREA-PIZZAS*/
          .encaixe-btn{
            display: flex;
            justify-content: center;
            align-items: center;
          }

          .btn-area-pizzas{
            width: 180px;
            height: 40px;
            margin-top: 1%;
            font-size: 1.5rem;
            font-family: sans-serif;
            cursor: pointer;
            background-color: #aa011c;
            border: 2px solid black;
            border-radius: 8px;
            color: white;
          }

          .btn-area-pizzas:hover{
            background-color: rgba(0, 0, 0, 0.6);
            transition: 0.5s;
            border: 2px solid #aa011c;
          }

          /*960PX BREAKPOINT - Ajustando o texto para desktop*/
          @media (min-width:60em){
            .legenda   { font-size:2em; padding:8px; }
          }

          @media (max-width: 440px){
            .slideshow-container {
              width: 300px;
              height: 300px;
            }

            .slideshow img{
              width: 100%;
              height: 295px;
            }
            
          }

          @media (max-width: 440px){
            .slideshow-container {
              width: 275px;
              height: 275px;
            }

            .slideshow img{
              width: 100%;
              height: 270px;
            }

          }

          @media (max-width: 290px){
            

            h6{
              font-size: 1.9rem;
            }
          
          }

    </style>
</head>
<body>
  <div class="hero">
    <nav>
      <img class="logo" src="logo-pizzaria-upp---primary.png" alt="logo">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="../Tela-Quem-Somos/index.html">Quem Somos</a></li>
        <li><a href="../TelaCardápio/index.html">Cardápio</a></li>
        <!-- <li><a href="../Tela-Modelo-Banco/index.html">DER</a></li>
        <li><a href="../TelaConsulta/consulta.php">Consulta</a></li> -->
        <?php echo $der_menu; ?>
        <?php echo $consulta_menu; ?>
        <?php echo $logs_menu; ?>
        <li>
        <a href="<?php echo $link_esta_logado; ?>">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <?php echo $esta_logado; ?>
          </a>
        </li>
        
      </ul>
     <!--<div class="user-pic"><i class="fa-solid fa-user" onclick="toggleMenu()"></i></div>--> 
     <div class="profile-dropdown">
      <div onclick="toggle()" class="profile-dropdown-btn">
        <div class="profile-img"> <i class="fa-regular fa-user"></i> 
          <div class="ball-green"></div>
        </div>

        <span><?php echo $nome; ?>
          <i class="fa-solid fa-angle-down"></i>
        </span>
      </div>

        <ul class="profile-dropdown-list">
        <hr />

        <li class="profile-dropdown-list-item">
          <a href="../TelaLogin/sair.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            Área de Login
          </a>
          <a href="../Tela-Alteracao-senha/alterarsenha.php">
          <i class="fa-solid fa-lock" href ="../Tela-Alteracao-senha/alterarsenha.php?id=<?php echo $row["ID_CLI"];?>"></i>
            Alterar senha
          </a>
        </li>
      </ul>
    </div>



      <!--<div class="sub-menu-wrap" id="subMenu">
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
      </div>-->

      <div class="mobile-menu-icon">
        <button type="button" onclick="menuShow()"><img class="icon" src="menu_white_36dp.svg" alt=""></button>
    </div>
    </nav>
    <div class="mobile-menu">
      <ul>
          <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="../Tela-Quem-Somos/index.html" class="nav-link">Quem Somos</a></li>
          <li class="nav-item"><a href="../TelaCardápio/index.html" class="nav-link">Cardápio</a></li>
          <li class="nav-item"><a href="../Tela-Modelo-Banco/index.html" class="nav-link">DER</a></li>
          <!--<div class="user-pic2"><i class="fa-solid fa-user" onclick="toggleMenu()"></i></div>--> 
          
      </ul>
      <div class="profile-dropdown2">
        <div onclick="toggle()" class="profile-dropdown-btn">
          <div class="profile-img"> <i class="fa-regular fa-user"></i> 
            <div class="ball-green"></div>
          </div>
  
          <span
            ><?php echo $nome; ?>
            <i class="fa-solid fa-angle-down"></i>
          </span>
        </div>
  
          <ul class="profile-dropdown-list">
          <hr />

          
  
          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              Área de login
            </a>
          </li>
        </ul>
      </div>
    </div>

  </div>



  
    

  


      <section>

        <!--PRIMEIRA-IMAGEM-->
        <div class="primeira-imagem">
          <div class="background-image"></div>
          <div class="inicial-content">
            <h1 class="title">Traga seu batalhão para conhecer a melhor pizzaria do Rio de Janeiro</h1>
           <input type="button" class="btn-acesso" value="Acesse o nosso cardápio de pizzas" onclick="Acesseonossocardápiodepizzas()" id="acesso-cardapio">
          </div>
        </div>

      </section>
        
    
      <div class="wrapper">

    <section class="carousel-section">
     
    <!--image slider start-->
    <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        <input type="radio" name="radio-btn" id="radio1" placeholder="a">
        <input type="radio" name="radio-btn" id="radio2" placeholder="a">
        <input type="radio" name="radio-btn" id="radio3" placeholder="a">
        <input type="radio" name="radio-btn" id="radio4" placeholder="a">
        <!--radio buttons end-->
        <!--slide images start-->
        <div class="slide first">
          <img src="Banner pizza vem pra selva.png" alt="">
        </div>
        <div class="slide">
          <img src="Banner promo casal.png" alt="">
        </div>
        <div class="slide">
          <img src="Banner unidades.png" alt="">
        </div>
      </div>
      <!--slide images end-->
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
</section>


  <section class="module-parallax-2">

     <!--EM-BREVE-NA-UPP-->
    <h6>Em breve na UPP</h6>

    <div class="cubos-todos">

      <div class="cubo-grande">
            <img src="Card-pizza-linha-amarela.jpeg" alt="">
      </div>  

      <div class="cubo-menor">
                
        <div class="cubo-pequeno">
            <img src="imagem-promocao-1.jpeg" alt="">
        </div>
        <div class="cubo-pequeno">
            <img src="imagem-promocao-2.jpeg" alt="">
        </div>

        <div class="cubo-pequeno">
            <img src="imagem-promocao-3.jpeg" alt="">
        </div>
        <div class="cubo-pequeno">
            <img src="imagem-promocao-4.jpeg" alt="">
        </div>
      </div>
    </div>
    
    <!--SLIDE-AREA-DAS-PIZZAS-->
    <div class="fundo-slide">

      <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
      <link rel="stylesheet" href="slider.css">
  
      <h6 class="titulo-slide-2">Área das Pizzas</h6>
      <section id="tranding">
    
        <div class="container">
          <div class="swiper tranding-slider">
            <div class="swiper-wrapper">
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="img.pizza-frango.jpg" alt="Tranding">
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price">R$24</h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                      Canta, galo!
                    </h2>
                    <h3 class="food-rating">
                      <span>4.5</span>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="img-pizza-quatro-queijos.jpg" alt="Tranding">
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price">R$30</h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                      Amarelinho
                    </h2>
                    <h3 class="food-rating">
                      <span>4.5</span>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="Pizza-banana-preço.jpg" alt="Tranding">
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price">$28</h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                      Nevou aí?
                    </h2>
                    <h3 class="food-rating">
                      <span>4.5</span>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="Pizza-Vegana-Preço.jpg" alt="Tranding">
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price">R$29</h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                      Vem pra selva!
                    </h2>
                    <h3 class="food-rating">
                      <span>4.5</span>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="pizza-ouro-preto-preço.avif" alt="Tranding">
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price">R$27</h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                      Ouro Preto
                    </h2>
                    <h3 class="food-rating">
                      <span>4.5</span>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="Pizza-camarão-preço.png" alt="Tranding">
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price">R$26</h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                      Beco do Camarão
                    </h2>
                    <h3 class="food-rating">
                      <span>4.5</span>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="img-pizza-bacon-AT.jpg" alt="Tranding">
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price">R$31</h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                      Cabeça de Porco
                    </h2>
                    <h3 class="food-rating">
                      <span>4.5</span>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="img-pizza-calabresa.jpg" alt="Tranding">
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price">R$31</h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                      Tradicional UPP
                    </h2>
                    <h3 class="food-rating">
                      <span>4.5</span>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="Pizza-alho-preço.jpg" alt="Tranding">
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price">R$25</h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                      Areinha
                    </h2>
                    <h3 class="food-rating">
                      <span>4.5</span>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
            </div>
  
            <div class="tranding-slider-control">
              <div class="swiper-button-prev slider-arrow">
                <ion-icon name="arrow-back-outline"></ion-icon>
              </div>
              <div class="swiper-button-next slider-arrow">
                <ion-icon name="arrow-forward-outline"></ion-icon>
              </div>
              <div class="swiper-pagination"></div>
            </div>
  
          </div>
        </div>
      </section>
  
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
      <script src="script.js"></script>

  
       
    
  
    <div class="encaixe-btn">
    <button type="button" class="btn-area-pizzas" value="Pedir Pizza" id="pizza-valores" onclick="acesso()">Pedir Pizza</button>
  </div>
  </div>
  

          <!--CENTRALIZA-CARD-->
           <h6>Espaço UPP</h6>

           <div class="centraliza-card">
    
            <div class="card-flip">
                
                <div class="front">
                    <img src="img-espaço-oficial.jpg" alt="">
                   <h3 class="text-shadow">Espaço</h3>
                </div>
                
                <div class="back">
                   <h2>Espaço</h2>
                   <p>Aqui disponibilizamos amplo espaço para você se deliciar com nossas pizzas a lenha junto a sua turma.</p>
                   
                </div>
            </div>
            <div class="card-flip">
                
                <div class="front">
                    <img src="imagem-conforto-oficial.webp" alt="">
                    <h3 class="text-shadow">Conforto</h3>
                </div>
                
                <div class="back">
                   <h2>Conforto</h2>
                   <p>Nossa empresa preza pelo conforto e zelo de nossos clientes, por isso disponibilizamos uma arquitetura temática e bem aconchegante para todos.</p>
                </div>
            </div>
      
            <div class="card-flip">
                
                <div class="front">
                    <img src="imagem-franquia-oficial.jpg" alt="">
                   <h3 class="text-shadow">Franquias</h3>
                </div>
                
                <div class="back">
                   <h2>Franquias</h2>
                   <p>Temos 3 lojas localizadas em torno do Rio de Janeiro, uma na Barra da Tijuca, outra em Copacabana e nossa loja principal que fica em Bangu.</p>
                   
                </div>
            </div>

      
  </section>


  <!--PROFILE-CARD-->
  <section class="module content">


    <h6>Comentários em Destaques</h6>
    <div class="depoimentos">
      <figure class="profile-card">
          
          
        <div class="profile-body">

            <div class="profile-header">
                <img src="img-escritorio-oficial.webp" alt="Capa Perfil">
          </div>
          
            <div class="img-perfil">
                <img src="img-pessoa-1.jfif" alt="perfil">
            </div>
          
                <div class="titulo">Mônica Ferreira</div>
                <figcaption class="descricao">
                   
                   <p>
                       "Minha experiência foi perfeita, pizza muito boa e um lugar muito legal para ir com os amigos."
                   </p>
                </figcaption>
          </div>
    
    </figure>


    <figure class="profile-card">
          
        <div class="profile-body">

            <div class="profile-header">
                <img src="img-escritorio-oficial.webp" alt="Capa Perfil">
          </div>
          
            <div class="img-perfil">
                <img src="img-pessoa-2.jpg"  alt="perfil">
            </div>
          
                <div class="titulo">Fernando Motta</div>
                <figcaption class="descricao">
                   
                   <p>
                       "Minha primeira vez nesse estabelecimento e fui embora maravilhado, atendimento perfeito e a comida com o sabor delicioso, recomendo."
                   </p>
                </figcaption>
          </div>
    
    </figure>

    <figure class="profile-card">
          
          
        <div class="profile-body">

            <div class="profile-header">
                <img src="img-escritorio-oficial.webp" alt="Capa Perfil">
          </div>
          
            <div class="img-perfil">
                <img src="img-pessoa-3.jpg" alt="perfil">
            </div>
          
                <div class="titulo">Renata Abreu</div>
                <figcaption class="descricao">
                   
                   <p>
                       "Levei a minha família e meus filhos amaram, o ambiente temático os deixaram encantados, experiência perfeita."
                   </p>
                </figcaption>
          </div>
    
    </figure>


    <figure class="profile-card">
        
          
        <div class="profile-body">

            <div class="profile-header">
                <img src="img-escritorio-oficial.webp" alt="Capa Perfil">
          </div>
          
            <div class="img-perfil">
                <img src="img-pessoa-4.jpg" alt="perfil">
            </div>
          
                <div class="titulo">Enrico Albuquerque</div>
                <figcaption class="descricao">
                   
                   <p>
                       "Levei meus colegas de trabalho e foi simplesmente insano, gostei demais das opções, meus colegas aprovaram."
                   </p>
                </figcaption>
          </div>
    
    </figure>
    </div>
   
   
    </section>

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
  </div>

  
<script src="Menu.js"></script>


</body>
</html>