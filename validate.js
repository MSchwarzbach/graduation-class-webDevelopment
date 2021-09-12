function createCustomer() {

  var erro = document.getElementById('erro');

  var nome = document.getElementById('nome');
  
  var email = document.getElementById('email');

  if (nome.value == '' || !nome.value.replace(/\s/g, '').length) {
      erro.innerHTML = '* Preencha o nome.';
      erro.classList.remove('hidden');
      nome.focus();
      return false;
  }

  if (email.value == '') {
      erro.innerHTML = '* Preencha o e-mail.';
      erro.classList.remove('hidden');
      email.focus();
      return false;
  }
  
  return true;

}