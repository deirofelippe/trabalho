  /*USER-MENU*/
  /*let subMenu = document.getElementById("subMenu");

  function toggleMenu(){
    subMenu.classList.toggle("open-menu");
  }*/
  
  
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

  /*DROPDOWN */
  let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");
let classList = profileDropdownList.classList;

const toggle = () => classList.toggle("active");

window.addEventListener("click", function (e) {
  if (!btn.contains(e.target)) 
  classList.remove("active");
});

  
  /*SLIDE*/ 
  var counter = 1;
  setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if(counter > 3){
      counter = 1;
    }
  }, 6000);



  /*BUTTON*/
  var a = window.document.getElementById('acesso-cardapio')
  a.addEventListener('click', clicar)
  function clicar() {
  window.location.href = "../TelaCardápio/index.html"
}


  /*SLIDE-2*/
let slides = document.querySelectorAll('.slideshow');
let dots = document.querySelectorAll('.dot');
let slideIndex = 1;
let timeoutID;
const showSlides = (n) => {
    let i;
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < slides.length; i++) {
        dots[i].setAttribute('class', 'dot');
    }
    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].setAttribute('class', 'dot ativo');
    clearTimeout(timeoutID);
    timeoutID = setTimeout(autoSlides, 6000);
};
const plusSlides = (n) => {
    showSlides(slideIndex += n);
};
const currentSlide = (n) => {
    showSlides(slideIndex = n);
};
function autoSlides() {
    let i;
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    for (i = 0; i < slides.length; i++) {
        dots[i].setAttribute('class', 'dot');
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].setAttribute('class', 'dot ativo');
    timeoutID = setTimeout(autoSlides, 6000);
}
autoSlides();


/*BTN-PIZZAS-VALORES*/

var c = window.document.getElementById('pizza-valores')
a.addEventListener('click', clicar)
function acesso() {
window.location.href = "../Tela-Pedidos-Carrinho/index.html"
}
