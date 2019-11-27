let D = document;
let login = () => {
  let formData = new FormData(D.getElementById('loginForm'));

  fetch('./../../backend/login.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) throw response.status;
    return response.json();
  })
  .then(response => {
    if(response.status == 1){
      location.href = response.site;
    }


    var msg = D.querySelector('.fetch-message');
    msg.classList.add('activated');

    var data = '<div class="error-container"><div class="row"><div class="col s12">';
    data += '<i class="small material-icons left">warning</i>';
    data += `<p>${response.message}</p>`;
    msg.classList.add('error');
    msg.classList.remove('ok');
    data += '</div></div></div>';

    msg.innerHTML = data;
  })
  .then(() => setTimeout(() => {
    el = D.querySelector('.fetch-message');
    el.classList.remove('error', 'activated', 'ok');
  }, 5000))
  .catch(e => console.log(e));
}


let f = () => {
  D.getElementById('login').addEventListener('click', e => login(e.preventDefault()));
}

if (D.readyState === 'loading')
  D.addEventListener('DOMContentLoaded', f);
else
  f();