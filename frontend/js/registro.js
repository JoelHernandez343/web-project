let subir = fechaPicker => {

  var formData = new FormData(document.getElementById('registro'));

  // for(var pair of formData){
  //   console.log(pair[0], pair[1]);
  // }

  fetch('./../../backend/registro.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) throw response.status;

    return response.text();
  })
  .then (m => console.log(m))
  .catch(e => alert('Oucrrió un error', e));
}


let initResgistro = () => {
  var dates = M.Datepicker.init(document.querySelectorAll('.datepicker'), {
    //maxDate: new Date(2019, 10, 13), //un mes antes del que se quiera xd
    minDate: new Date(1900, 31, 1),
    maxDate: new Date(2018, 11, 14),
    defaultDate: new Date(2018, 11, 1),
    yearRange: 10,
    format: 	'yyyy-mm-dd'
  });
  var sidenavs = M.Sidenav.init(document.querySelectorAll('.sidenav'));
  var selects = M.FormSelect.init(document.querySelectorAll('select'));

  document.getElementById('registrar').addEventListener('click', e => subir(dates[0], e.preventDefault()));
}

if (document.readyState == 'loading')
  document.addEventListener('DOMContentLoaded', initResgistro);
else
  initResgistro();