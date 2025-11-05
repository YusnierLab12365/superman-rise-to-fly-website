const btnRegistro = document.getElementById('btn-registrate');
const modalRegistro = document.getElementById('registroModal');
const cerrarRegistro = document.getElementById('cerrarModal');
const formRegistro = document.getElementById('form-registro');

btnRegistro.addEventListener('click', e => {
  e.preventDefault();
  modalRegistro.classList.remove('hidden');
  document.body.classList.add('blurred');
});

cerrarRegistro.addEventListener('click', () => {
  modalRegistro.classList.add('hidden');
  document.body.classList.remove('blurred');
});

modalRegistro.addEventListener('click', e => {
  if (e.target === modalRegistro) {
    modalRegistro.classList.add('hidden');
    document.body.classList.remove('blurred');
  }
});

formRegistro.addEventListener('submit', e => {
  e.preventDefault();
  const nombreUsuario = document.getElementById('registro-nombre').value;
  localStorage.setItem('usuarioRegistrado', 'true');
  localStorage.setItem('nombreUsuario', nombreUsuario);
  modalRegistro.classList.add('hidden');
  document.body.classList.remove('blurred');
  btnRegistro.classList.add('hidden');
  document.getElementById('btn-login').classList.remove('hidden');
});

const btnLoginAbrir = document.getElementById('btn-login');
const modalLogin = document.getElementById('loginModal');
const cerrarLogin = document.getElementById('cerrarLoginModal');
const formLogin = document.getElementById('form-login');
const userInfo = document.getElementById('user-info');
const username = document.getElementById('username');
const btnLogout = document.getElementById('btn-logout');

btnLoginAbrir.addEventListener('click', e => {
  e.preventDefault();
  modalLogin.classList.remove('hidden');
  document.body.classList.add('blurred');
});

cerrarLogin.addEventListener('click', () => {
  modalLogin.classList.add('hidden');
  document.body.classList.remove('blurred');
});

modalLogin.addEventListener('click', e => {
  if (e.target === modalLogin) {
    modalLogin.classList.add('hidden');
    document.body.classList.remove('blurred');
  }
});

formLogin.addEventListener('submit', e => {
  e.preventDefault();
  const correo = document.getElementById('login-correo').value;
  const password = document.getElementById('login-password').value;
  const registrado = localStorage.getItem('usuarioRegistrado');
  const nombreUsuario = localStorage.getItem('nombreUsuario');
  if (registrado === 'true') {
    localStorage.setItem('usuario', correo);
    modalLogin.classList.add('hidden');
    document.body.classList.remove('blurred');
    mostrarSesion(nombreUsuario);
  } else {
    alert('Debes registrarte primero');
  }
});

function mostrarSesion(nombre) {
  username.textContent = nombre;
  btnLoginAbrir.classList.add('hidden');
  btnRegistro.classList.add('hidden');
  userInfo.classList.remove('hidden');
}

btnLogout.addEventListener('click', () => {
  localStorage.removeItem('usuario');
  userInfo.classList.add('hidden');
  btnRegistro.classList.remove('hidden');
  btnLoginAbrir.classList.add('hidden');
});

document.addEventListener('DOMContentLoaded', () => {
  const usuarioSesion = localStorage.getItem('usuario');
  const nombreRegistrado = localStorage.getItem('nombreUsuario');
  if (usuarioSesion) {
    mostrarSesion(nombreRegistrado);
  } else {
    btnRegistro.classList.remove('hidden');
    btnLoginAbrir.classList.add('hidden');
    userInfo.classList.add('hidden');
  }
});
