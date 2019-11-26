let subir = fechaPicker => {
  let nombre = document.getElementById('nombres').value;
  let ap_materno = document.getElementById('apellido_materno').value;
  let ap_paterno = document.getElementById('apellido_paterno').value;
  let fecha = fechaPicker.toString();
  let email = document.getElementById('icon_email').value;

  let data = {
    nombre,
    ap_materno,
    ap_paterno,
    fecha,
    email
  }

  var formData = new FormData();
  for (var key in data)
    formData.append(key, data[key]);

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
  });
  var sidenavs = M.Sidenav.init(document.querySelectorAll('.sidenav'));

  document.getElementById('registrar').addEventListener('click', e => subir(dates[0]));
}

if (document.readyState == 'loading')
  document.addEventListener('DOMContentLoaded', initResgistro);
else
  initResgistro();