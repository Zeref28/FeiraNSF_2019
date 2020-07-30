/* Arquivo JavaScript Validações */

function Validacao()  {

var nome = document.form.nome.value;
var email = document.form.email.value;
var telefone = document.form.telefone.value;
var bairro = document.form.distrito.value;
var escolaridade = document.form.escola.value;
var hora = document.form.hora.value;


if(nome == ""){
    alert("Por favor, preencha o campo Nome.");
    document.form.nome.focus();
    return false;
}

if(bairro == ""){
    alert("Por favor, preencha o campo Bairro.");
    console.log("Bairro esta vazio");
    document.form.distrito.focus();
    return false;
}
if(escolaridade == 10){
    alert("Selecione a Escolaridade.");
    document.form.escola.focus();
    return false;
}
if(hora == 10){
    alert("Selecione um Horário de chegada.");
    document.form.hora.focus();
    return false;
}



}