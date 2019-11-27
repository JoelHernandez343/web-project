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
  .then(m => {
    if(m.status == 1){
      location.href = m.site;
    }
  })
  .catch(e => console.log(e));
}


let f = () => {
  D.getElementById('login').addEventListener('click', e => login(e.preventDefault()));
}

if (D.readyState === 'loading')
  D.addEventListener('DOMContentLoaded', f);
else
  f();