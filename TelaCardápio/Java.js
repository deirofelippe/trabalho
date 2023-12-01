/*MENU MOBILE*/
function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        document.querySelector('.icon').src = "menu_white_36dp.svg";
    } else {
        menuMobile.classList.add('open');
        document.querySelector('.icon').src = "close_white_36dp.svg";
    }
}


/*BTN-PIZZAS-CARDAPIO*/

// Função de manipulador de evento que será chamada quando qualquer um dos botões for clicado
function onClickHandler(event) {
    window.location.href = "../Tela-Pedidos-Carrinho/index.html"
  }
  
  // Obtém todos os elementos de botão com a classe "meus-botoes"
  var botoes = document.querySelectorAll(".btn-pizzas-cardapio");
  
  // Adiciona o manipulador de evento a cada botão
  for (var i = 0; i < botoes.length; i++) {
    botoes[i].addEventListener("click", onClickHandler);
  }