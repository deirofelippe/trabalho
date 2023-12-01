// CARDHOLDER NAME
let nameCard = document.querySelector('.card__details-name');
let nameInput = document.querySelector('#cardholder');
let nameErrorDiv = document.querySelector('.form__cardholder--error');

// CARD NUMBER
let numberCard = document.querySelector('.card__number');
let numberInput = document.querySelector('#cardNumber');
let numberErrorDiv = document.querySelector('.form__inputnumber--error');

// MM
let monthCard = document.querySelector('.card__month');
let monthInput = document.querySelector('#cardMonth');
let monthErrorDiv = document.querySelector('.form__input-mm--error');

// YY
let yearCard = document.querySelector('.card__year');
let yearInput = document.querySelector('#cardYear');
let yearErrorDiv = document.querySelector('.form__input-yy-error');

// CVC
let cvcCard = document.querySelector('.card-back__cvc');
let cvcInput = document.querySelector('#cardCvc');
let cvcErrorDiv = document.querySelector('.form__input-cvc--error');


// Ingreso dinamico do Name
nameInput.addEventListener('input', () =>{
    if(nameInput.value == ''){  // utilizar isso para o mes, ano e cvc !!!!!!!!!
        nameCard.innerText = 'RAPHAEL SILVA';
    } else{
        nameCard.innerText = nameInput.value;
    }
})

// Ingreso dinamico do Number
numberInput.addEventListener('input', event => {
    let inputValue = event.target.value;
    // atualizando o card
    numberCard.innerText = numberInput.value;

    // validando quando há alguma letra
    let regExp = /[A-z]/g;
    if(regExp.test(numberInput.value)){
        showError(numberInput, numberErrorDiv, 'Formato errado, apenas números');
    } else{
        // agregando espaços a cada quatro dígitos, barrando espaços entre os números e retirando o espaço ao final do último número
        numberInput.value = inputValue.replace(/\s/g, '').replace(/([0-9]{4})/g, '$1 ').trim();
        showError(numberInput, numberErrorDiv, '', false);
    }
    

    // mostrando os 0 quando o input estiver vazio
    if(numberInput.value == ''){
        numberCard.innerText = '0000 0000 0000 0000';
    }
});

// ingreso dinamico do mes
monthInput.addEventListener('input', () =>{
    monthCard.innerText = monthInput.value;
    validateLetters(monthInput, monthErrorDiv);
});

// ingreso dinamico do ano
yearInput.addEventListener('input',() =>{
    yearCard.innerText = yearInput.value;
    validateLetters(yearInput, yearErrorDiv);
});

// ingresso dinamico do cvc
cvcInput.addEventListener('input', (event) =>{
    cvcCard.innerText = cvcInput.value;
    validateLetters(cvcInput, cvcErrorDiv);
});





// button confirm
let confirmBtn = document.querySelector('.form__submit');

let nameValidation = false;
let numberValidation = false;
let monthValidation = false;
let yearValidation = false;
let cvcValidation = false;

// formulario y thanks
let formSection = document.querySelector('.form');
let thanksSection = document.querySelector('.thanks-section');

confirmBtn.addEventListener('click', event =>{
    event.preventDefault();

    // validar name
   if(verifyIsFilled(nameInput, nameErrorDiv)){
    nameValidation = true;
   } else{
    nameValidation = false;
   }

    // valida number 
    if(verifyIsFilled(numberInput, numberErrorDiv) == true){
        if(numberInput.value.length == 19){
            showError(numberInput, numberErrorDiv, '', false);
            numberValidation = true;
        } else{
            showError(numberInput, numberErrorDiv, 'Número incorreto');
            numberValidation = false;
        }
    }


    // validação do mes
    if(verifyIsFilled(monthInput, monthErrorDiv)){
        if (parseInt(monthInput.value) > 0 && parseInt(monthInput.value) <= 12){
                showError(monthInput, monthErrorDiv, '', false);
                monthValidation = true;
            } else{
                showError(monthInput, monthErrorDiv, 'Mês incorreto');
                monthValidation = false;
        }
    }
    

    // validar ano
    if(verifyIsFilled(yearInput, yearErrorDiv)){
        if(parseInt(yearInput.value) > 23 && parseInt(yearInput.value) <= 28){
            showError(yearInput, yearErrorDiv, '', false);
            yearValidation = true;
        } else{
            showError(yearInput, yearErrorDiv, 'Ano incorreto');
            yearValidation = false;
        }
    }

    // valida cvc
    if(verifyIsFilled(cvcInput, cvcErrorDiv)){
        if(cvcInput.value.length == 3 ){
            showError(cvcInput, cvcErrorDiv, '', false);
            cvcValidation = true;
        } else{
            showError(cvcInput, cvcErrorDiv,'CVC incorreto');
            cvcValidation = false;
        }
    }

    if(nameValidation == true && numberValidation == true && monthValidation == true && yearValidation == true && cvcValidation == true){
        formSection.style.display = 'none';
        thanksSection.style.display = 'block'; 
    } else{
        formSection.style.display = 'block';
        thanksSection.style.display = 'none';
    }
});

// functions:
function showError(divInput, divError, msgError, show = true){
    if(show){
        divError.innerText = msgError;
        divInput.style.borderColor = '#FF0000';
    } else{
        divError.innerText = msgError;
        divInput.style.borderColor = 'hsl(270, 3%, 87%)';
    }
}

function verifyIsFilled(divInput, divError){
    if(divInput.value.length > 0){
        showError(divInput, divError, "", false);
        return true
    } else{
        showError(divInput, divError, "Campo vazio");
        return false
    }
}


function validateLetters(input, divError){
    // validando quando há alguma letra
    let regExp = /[A-z]/g;
    if(regExp.test(input.value)){
        showError(input, divError, 'Formato errado, apenas números');
    } else {
        showError(input, divError, '', false);
    }
}