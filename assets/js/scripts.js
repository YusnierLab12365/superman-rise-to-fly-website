// ===============================
//  REGISTRO
// ===============================

const formRegistro = document.getElementById("form-registro");
const modal = document.getElementById("registroModal");
const cerrarBtn = document.getElementById("cerrarModal");
const mensaje = document.getElementById("mensaje");

// --- REGISTRO ---

formRegistro.addEventListener("submit", function(e) {
    e.preventDefault();

    let datos = new FormData(formRegistro);

    fetch("registro.php", {
        method: "POST",
        body: datos
    })
    .then(res => res.text())
    .then(resp => {

        if (resp === "ok") {
            modal.classList.add("hidden");
            mostrarRegistroExitoso();
            formRegistro.reset();
        }
        else if (resp === "existe") {
            alert(" Este correo ya está registrado");
        }
        else {
            alert(" Ocurrió un error al registrar.");
        }
    });
});

// --- ALERT PERSONALIZADO ---

function mostrarRegistroExitoso() {
    const overlay = document.createElement("div");
    overlay.className = "fixed inset-0 bg-black/60 backdrop-blur-sm flex justify-center items-center z-50";

    overlay.innerHTML = `
        <div class="bg-blue-600 text-white p-8 rounded-2xl shadow-xl w-[350px] text-center">
            <h2 class="text-2xl font-bold mb-3">Registro Exitoso</h2>
            <p class="mb-6">Tu cuenta ha sido creada.</p>

            <div class="flex justify-center gap-4">
                <button id="btnAceptar" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded">
                    Aceptar
                </button>

                <button id="btnCerrar" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded">
                    Cerrar
                </button>
            </div>
        </div>
    `;

    document.body.appendChild(overlay);

    document.getElementById("btnAceptar").onclick = () => overlay.remove();
    document.getElementById("btnCerrar").onclick = () => overlay.remove();
}

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

