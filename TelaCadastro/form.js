const form = document.getElementById("form");
const campos = document.querySelectorAll(".required");
const spans = document.querySelectorAll(".span-required");
/*const emailRegex = /^\w+([-+.'])\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;*/

form.addEventListener("submit", (event) => {
  //   event.preventDefault();
  nameValidate();
  mainPasswordValidate();
  comparePassword();
  name_matValidate();
  loginValidate();
  mainPasswordValidate();
  comparePassword();
  formMask(mask, char, event, cursor);
  limpa_formulario_cep();
  meu_callback(conteudo);
  pesquisacep(valor);
});

function setError(index) {
  campos[index].style.border = "2px solid #e63636";
  spans[index].style.display = "block";
}

function removeError(index) {
  campos[index].style.border = "";
  spans[index].style.display = "none";
}

function nameValidate() {
  if (campos[0].value.length < 15) {
    setError(0);
  } else if (campos[0].value.replace(0 - 9, "")) {
    removeError(0);
  } else {
    removeError(0);
  }
}

function name_matValidate() {
  if (campos[2].value.length < 15) {
    setError(2);
  } else {
    removeError(2);
  }
}

function loginValidate() {
  if (campos[9].value.length <= 3) {
    setError(9);
  } else {
    removeError(9);
  }
}

function mainPasswordValidate() {
  if (campos[10].value.length < 8) {
    setError(10);
  } else {
    removeError(10);
    comparePassword();
  }
}

function comparePassword() {
  if (campos[10].value == campos[11].value && campos[11].value.length >= 8) {
    removeError(11);
  } else {
    setError(11);
  }
}

/*Nome*/
const inputName = document.querySelector("#firstname");

inputName.addEventListener("keypress", function (e) {
  const keyCode = e.keyCode ? e.keyCode : e.wich;

  // 47 + ao - 58 = São números
  if (keyCode > 47 && keyCode < 58) {
    e.preventDefault();
  }
});

/*DATETIME*/
/*
const date = document.querySelector("#datetime");
date.addEventListener("keypress", function(e){

    {
        const regex = /^[0-9]{4})-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[0-1])/
        const [full, year, month, day] = regex.exec(date.toISOString())
        const actual = `${day}/${month}/${year}`
        //const expected = "25/01/2022"
        assert.equal(actual)
    }

    //
    const options = {
        year: "numeric",
        month: "numeric",
        day: "numeric"
     }
    date.toLocaleDateString("pt-br", options)

    const actual = `${day}/${month}/${year}`
    //const expected = "25/01/2022"
    assert.equal(actual)
});
*/

/*Nome_Materno*/
const inputNameMat = document.querySelector("#nome_mat");

inputNameMat.addEventListener("keypress", function (e) {
  const keyCode = e.keyCode ? e.keyCode : e.wich;

  // 47 + ao - 58 = São números
  if (keyCode > 47 && keyCode < 58) {
    e.preventDefault();
  }
});

/*CPF*/

const cpf = document.querySelector("#cpf");
var limparValorCpf = cpf.value.substring(0, 11);
var cpfValidate = limparValorCpf.split("");

cpf.addEventListener("keyup", (event) => {
  let start = cpf.selectionStart; //initial cursor position
  let end = cpf.selectionEnd; //final cursor position
  //if the start and end positions of the cursor are the same, it means that there is no selection range
  if (start == end) {
    //this conditional prevents the function call when the user makes a selection range in the input EX:. keys (Ctrl + A)
    formMask("___.___.___-__", "_", event, start);
  }
});

function formMask(mask, char, event, cursor) {
  const vetMask = mask.split(""); //transform mask into vector to use specific functions, like filter()
  const onlyNumbers = cpf.value
    .split("")
    .filter((value) => !isNaN(value) && value != " ");
  const key = event.keyCode || event.which;
  const backspaceAndArrowKeys = [8, 37, 38, 39, 40]; //code backspace and arrow keys
  const clickedOnTheBackspaceOrArrowsKeys =
    backspaceAndArrowKeys.indexOf(key) >= 0;
  const charNoMod = [".", "-"]; //characters that do not change
  const cursorIsCloseToCharNoMod = charNoMod.indexOf(vetMask[cursor]) >= 0;

  onlyNumbers.forEach((value) =>
    vetMask.splice(vetMask.indexOf(char), 1, value)
  ); //change '#' to numbers

  cpf.value = vetMask.join("");

  if (!clickedOnTheBackspaceOrArrowsKeys && cursorIsCloseToCharNoMod) {
    //increment the cursor if it is close to characters that do not change
    cpf.setSelectionRange(cursor + 1, cursor + 1);
  } else {
    cpf.setSelectionRange(cursor, cursor);
  }

  //i used google translate, sorry :D
}

/*Tel_cel*/

// Receber seletor do id celular
var celular = document.getElementById("tel_cel");

celular.addEventListener("input", () => {
  // Remover os caracteres não numéricos usando a expressão regular /\D/g e limitar a 11 dígitos.
  var limparValor = celular.value.replace(/\D/g, "").substring(0, 11);

  // Dividir a string em um array de caracteres individuais.
  var numerosArraus_cel = limparValor.split("");

  // Criar a variável para receber o número formatado
  var numeroFormatado = "";

  // Acessa o IF quando a quantidade de números é maior do que zero
  if (numerosArraus_cel.length > 0) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    numeroFormatado += `(${numerosArraus_cel.slice(0, 2).join("")})`;
  } else {
    setError(4);
  }

  // Acessa o IF quando a quantidade de números é maior do que dois
  if (numerosArraus_cel.length > 2) {
    // Formatar o número do telefone e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    numeroFormatado += ` ${numerosArraus_cel.slice(2, 7).join("")}`;
  } else {
    setError(4);
  }

  // Acessa o IF quando a quantidade de números é maior do que sete
  if (numerosArraus_cel.length > 7) {
    // Formatar o número do telefone e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    numeroFormatado += `-${numerosArraus_cel.slice(7, 11).join("")}`;
  } else {
    setError(4);
  }

  if (numerosArraus_cel.length !== 11) {
    setError(4);
  } else {
    removeError(4);
  }

  // Enviar para o campo o número formatado
  celular.value = numeroFormatado;
});

/*Tel_fixo*/
// Receber seletor do id celular
var fixo = document.getElementById("tel_fixo");

fixo.addEventListener("input", () => {
  // Remover os caracteres não numéricos usando a expressão regular /\D/g e limitar a 11 dígitos.
  var limparValor = fixo.value.replace(/\D/g, "").substring(0, 10);

  // Dividir a string em um array de caracteres individuais.
  var numerosArray = limparValor.split("");

  // Criar a variável para receber o número formatado
  var numeroFormatado = "";

  // Acessa o IF quando a quantidade de números é maior do que zero
  if (numerosArray.length > 0) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    numeroFormatado += `(${numerosArray.slice(0, 2).join("")})`;
    removeError(5);
  } else {
    setError(5);
  }

  // Acessa o IF quando a quantidade de números é maior do que dois
  if (numerosArray.length > 2) {
    // Formatar o número do telefone e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    numeroFormatado += ` ${numerosArray.slice(2, 6).join("")}`;
    removeError(5);
  } else {
    setError(5);
  }

  // Acessa o IF quando a quantidade de números é maior do que sete
  if (numerosArray.length > 6) {
    // Formatar o número do telefone e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    numeroFormatado += `-${numerosArray.slice(6, 10).join("")}`;
  } else {
    setError(5);
  }

  if (numerosArray.length !== 10) {
    setError(5);
  } else {
    removeError(5);
  }

  // Enviar para o campo o número formatado
  fixo.value = numeroFormatado;
});

/*CEP*/
var cep = document.getElementById("cep");

cep.addEventListener("input", () => {
  // Remover os caracteres não numéricos usando a expressão regular /\D/g e limitar a 11 dígitos.
  var limparValor = cep.value.replace(/\D/g, "").substring(0, 8);
  // Receber seletor do id celular

  // Dividir a string em um array de caracteres individuais.
  var numerosarraycep = limparValor.split("");

  // Criar a variável para receber o número formatado
  var numeroFormatoCep = "";

  // Acessa o IF quando a quantidade de números é maior do que zero
  if (numerosarraycep.length > 0) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    numeroFormatoCep += ` ${numerosarraycep.slice(0, 5).join("")}`;
  } else {
    setError(6);
  }

  // Acessa o IF quando a quantidade de números é maior do que dois
  if (numerosarraycep.length > 5) {
    // Formatar o número do telefone e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    numeroFormatoCep += `-${numerosarraycep.slice(5, 8).join("")}`;
  } else {
    setError(6);
  }
  if (numerosarraycep.length !== 8) {
    setError(6);
  } else {
    removeError(6);
  }

  // Enviar para o campo o número formatado
  cep.value = numeroFormatoCep;
});

function limpa_formulario_cep() {
  // limpa os valores do formulário de cep.
  document.getElementById("endereco").value = "";
}

function meu_callback(conteudo) {
  if (!("erro" in conteudo)) {
    // Atualiza os campos com os valores.
    document.getElementById("endereco").value = conteudo.logradouro;
  } // enf if.
  else {
    // CEP não encontrado.
    limpa_formulario_cep();
    setError(6);
  }
}

function pesquisacep(valor) {
  // Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, "");

  // Verifica se campo cep possui valor informado.
  if (cep != "") {
    // Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    // Valida o formato do CEP.
    if (validacep.test(cep)) {
      // Preenche os campos com "..." enquando consulta webservice.
      document.getElementById("endereco").value = "...";

      // Cria um elemento javascript.
      var script = document.createElement("script");

      // Sincroniza com o callback.
      script.src =
        "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback";

      // Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);
    } // end if
    else {
      // cep é inválido.
      limpa_formulario_cep();
      setError(6);
    }
  } // end if
  else {
    // cep sem valor, limpa formulário.
    limpa_formulario_cep();
    setError(6);
  }
}

/*GENDER-GROUP*/

function radioValidate() {
  var validradio = false;

  if (document.getElementById("female").checked) {
    validradio = true;
  } else if (document.getElementById("male").checked) {
    validradio = true;
  } else if (document.getElementById("others").checked) {
    validradio = true;
  }
  if (validradio) {
    removeError(12);
    removeError(13);
    removeError(14);
  } else {
    setError(12);
    setError(13);
    setError(14);
    return false;
  }
}
