let D = document;
let login = () => {
  let email = D.getElementById('icon_email').value;
  let pass = D.getElementById('contra').value;

  let data = {
    email, pass
  };

  fetch('./../../backend/getPost.php', {
    method: 'POST',
    body: JSON.stringify(data)
  })
    .then(m => {
      if (!m.ok) throw 'Error en el AJAX';
      return m.text();
    })
    .then(m => console.log(m))
    .catch(e => console.log(e));
}


let f = () => {
  D.getElementById('login-btn').addEventListener('click', login);
}

if (D.readyState === 'loading')
  D.addEventListener('DOMContentLoaded', f);
else
  f();