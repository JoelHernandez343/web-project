let D = document;

let toggleEdit = true;

let toggleEditar = e => {

  resetErrors();

  D.getElementById('password').value = '';
  M.updateTextFields();

  let el;
  
  el = D.getElementById('nombre');
  el.disabled = !el.disabled;

  el = D.getElementById('apPaterno');
  el.disabled = !el.disabled;

  el = D.getElementById('apMaterno');
  el.disabled = !el.disabled;

  el = D.getElementById('fecha');
  el.disabled = !el.disabled;

  el = D.getElementById('email');
  el.disabled = !el.disabled;

  el = D.getElementById('password');
  el.disabled = !el.disabled;

  el = D.getElementById('guardarDatos');
  el.disabled = !el.disabled;
  
  D.getElementById('genero-disabled').classList.toggle('hide');
  D.getElementById('genero-enabled').classList.toggle('hide');
  D.getElementById('form-datos').classList.toggle('editing');

  el = D.getElementById('editarDatos').querySelector('span');
  el.innerHTML = toggleEdit ? 'Cancelar' : 'Editar datos';
  toggleEdit = !toggleEdit;
}

let alterError = el => {
  var line = el.parentElement.querySelector('.errorLine');
  var parent = line.parentElement;
  var data = line.innerHTML;

  parent.removeChild(line);

  line = D.createElement('div');
  line.className = 'errorLine';
  line.innerHTML = data;
  parent.appendChild(line);
  line.classList.add('shake-horizontal');
  return false;
}

let resetErrors = () => {
  let lines = D.querySelectorAll('.errorLine');
  
  for (var i = 0; i < lines.length; ++i)
    lines[i].classList.add('hide');
}

let validate = () => {
  resetErrors();

  let el, val = true;

  el = D.getElementById('nombre');
  if (!el.value) val = alterError(el);

  el = D.getElementById('apPaterno');
  if (!el.value) val = alterError(el);
  
  el = D.getElementById('apMaterno');
  if (!el.value) val = alterError(el);

  el = D.getElementById('fecha');
  if (!el.value) val = alterError(el);

  el = D.getElementById('email');
  if (!el.value) val = alterError(el);

  el = D.getElementById('genero');
  if (!el.value) val = alterError(el);

  el = D.getElementById('password');
  if (!el.value) val = alterError(el);
  
  return val;
}

let cambiarDatos = () => {
  if (!validate()) return;

  let formData = new FormData(D.getElementById('form-datos'));

  for (var pair of formData){
    console.log(pair[0], pair[1]);
  }

  fetch('./../../backend/changeDatos.php', {
    method: 'POST',
    body: formData
  })
  .then( response => {
    if (!response.ok) throw response.status;

    console.log(response);

    return response.json();
  })
  .then(response => {
    var msg = D.querySelector('.fetch-message');
    msg.classList.add('activated');

    var data = '<div class="error-container"><div class="row"><div class="col s12">';

    if (!response.status) {
      data += '<i class="small material-icons left">warning</i>';
      data += `<p>${response.message}</p>`;
      msg.classList.add('error');
      msg.classList.remove('ok');
    }
    else {
      data += '<i class="small material-icons left">thumb_up</i>';
      data += `<p>${response.message}</p>`;
      msg.classList.remove('error');
      msg.classList.add('ok');
    }

    data += '</div></div></div>';

    msg.innerHTML = data;
    // D.getElementById('fetch-message').scrollIntoView();
    toggleEditar();
  })
  .then(() => setTimeout(() => {
    el = D.querySelector('.fetch-message');
    el.classList.remove('error', 'activated', 'ok');
  }, 5000))
  .catch(e => alert('Tuvimos un error: ' + e));
}

let closeSession = () => {
  let formData = new FormData();
  formData.append('email', D.getElementById('email').value);

  fetch('./../../backend/logout.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) throw response.status;

    return response.json();
  })
  .then(response => {
    location.href = response.site;
  })
  .catch(e => alert(e));
}

let init = () => {
  D.getElementById('editarDatos').addEventListener('click', toggleEditar);
  D.getElementById('guardarDatos').addEventListener('click', e => cambiarDatos(e.preventDefault()));
  D.getElementById('close').addEventListener('click', e => closeSession(e.preventDefault()));
}

if (D.readyState = 'loading')
  D.addEventListener('DOMContentLoaded', init);
else
  init();