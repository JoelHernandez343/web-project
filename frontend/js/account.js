let toggleEditar = e => {
  let element;
  element = document.getElementById('nombre');
  element.disabled = !element.disabled;
  element = document.getElementById('apPaterno');
  element.disabled = !element.disabled;
  element = document.getElementById('apMaterno');
  element.disabled = !element.disabled;
  element = document.getElementById('fecha');
  element.disabled = !element.disabled;
  element = document.getElementById('email');
  element.disabled = !element.disabled;
  element = document.getElementById('password');
  element.disabled = !element.disabled;

  // element = document.getElementById('genero');
  // element.disabled = !element.disabled;
  // element = element.parentElement;
  // element = element.querySelector('input');
  // element.disabled = !element.disabled;
  
  console.log(M.FormSelect);

  let formData = new FormData(document.getElementById('datos'));

  for (var pair of formData){
    console.log(pair[0], pair[1]);
  }
}

let init = () => {
  let button = document.getElementById('editarDatos').addEventListener('click', toggleEditar);
}

if (document.readyState = 'loading')
  document.addEventListener('DOMContentLoaded', init);
else
  init();