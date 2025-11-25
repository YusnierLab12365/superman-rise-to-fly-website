<?php
// Inicia sesión de forma segura solo si no está iniciada ya
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$usuario_id = $_SESSION['usuario'] ?? null;
$usuario_nombre = $_SESSION['usuario_nombre'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superman: Rise To Fly</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="icon" type="image/png" href="assets/img/icono_superman.png">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body id="top" class="text-white">

<nav
  class="nav-animation fixed top-0 left-0 w-full z-50 bg-[#001f4c] bg-opacity-90 backdrop-blur-sm shadow-lg py-4">
  <div class="container mx-auto px-4 flex justify-between items-center">
    
    <a href="#"
      class="text-2xl font-black font-['Bebas_Neue'] tracking-wide text-superman-blue hover:text-superman-red transition-colors duration-300">
      SUPERMAN: RISE TO FLY
    </a>

    <button id="menu-btn" class="lg:hidden p-2 text-white focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <div id="menu"
        class="hidden lg:flex flex-col lg:flex-row items-start lg:items-center space-y-4 lg:space-y-0 lg:space-x-6 absolute lg:static top-16 left-0 w-full lg:w-auto bg-[#001f4c] lg:bg-transparent p-6 lg:p-0 shadow-lg lg:shadow-none 
              transition-all duration-500 ease-in-out transform lg:transform-none origin-top
              opacity-0 scale-y-0 lg:opacity-100 lg:scale-y-100">

      <a href="#top" class="block w-full py-2 px-4 text-white hover:text-superman-yellow transition-colors duration-300 rounded">Inicio</a>
      <a href="#story-section" class="block w-full py-2 px-4 text-white hover:text-superman-yellow transition-colors duration-300 rounded">Historia</a>
      <a href="#abilities-section" class="block w-full py-2 px-4 text-white hover:text-superman-yellow transition-colors duration-300 rounded">Habilidades</a>
      <a href="#enemies-section" class="block w-full py-2 px-4 text-white hover:text-superman-yellow transition-colors duration-300 rounded">Villanos</a>
      <a href="#sketches-section" class="block w-full py-2 px-4 text-white hover:text-superman-yellow transition-colors duration-300 rounded">Arte</a>
      <a href="#developers-section" class="block w-full py-2 px-4 text-white hover:text-superman-yellow transition-colors duration-300 rounded">Equipo</a>


     <?php

$usuario_id = $_SESSION["usuario_id"] ?? null;
$usuario_nombre = $_SESSION["usuario_nombre"] ?? null;
?>

<?php if (!$usuario_id): ?>
    <!-- Usuario NO ha iniciado sesión -->
    <a id="btn-registrate" href="registro.php"
       class="block px-4 py-2 bg-superman-red text-white font-bold rounded-full hover:bg-superman-blue transition-colors duration-300">
        Regístrate
    </a>

    <a id="btn-login"
       class="px-4 py-2 bg-superman-red text-white font-bold rounded-full hover:bg-superman-blue transition">
        Iniciar sesión
    </a>

<?php else: ?>
    <!-- Usuario SÍ ha iniciado sesión -->
    <div class="flex items-center space-x-2">
        <span class="text-white font-bold" id="user-info">
            Bienvenido, <?= htmlspecialchars($usuario_nombre) ?>
        </span>
        <form action="logout.php" method="POST">
            <button type="submit"
                    class="px-4 py-2 bg-superman-red text-white font-bold rounded-full hover:bg-superman-blue transition">
                Cerrar sesión
            </button>
        </form>
    </div>
<?php endif; ?>


    </div>
  </div>
</nav>

<!-- === MODAL REGISTRO === -->
<div id="registroModal" class="fixed inset-0 hidden flex justify-center items-center bg-black/50 backdrop-blur-sm z-50">
  <div class="bg-yellow-400 text-black p-6 rounded-2xl shadow-2xl w-80 relative animate-fade">

    <button id="cerrarModal" class="absolute top-3 right-4 text-black text-2xl font-bold">&times;</button>

    <h2 class="text-2xl font-bold mb-4 text-center">Regístrate</h2>

    <form id="form-registro" class="space-y-3">

      <div>
        <label class="block text-sm font-semibold">Nombre</label>
        <input name="nombre" type="text"
          class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-superman-blue" required>
      </div>

      <div>
        <label class="block text-sm font-semibold">Correo electrónico</label>
        <input name="correo" type="email"
          class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-superman-blue" required>
      </div>

      <div>
        <label class="block text-sm font-semibold">Contraseña</label>
        <input name="password" type="password"
          class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-superman-blue" required>
      </div>

      <button type="submit"
        class="w-full bg-black text-yellow-400 font-bold py-2 rounded-md hover:bg-gray-800 transition">
        Crear cuenta
      </button>

    </form>

  </div>
</div>


<!-- === MODAL LOGIN === -->
<div id="loginModal" class="fixed inset-0 hidden flex justify-center items-center bg-black/50 backdrop-blur-sm z-50">
  <div class="bg-yellow-400 text-black p-6 rounded-2xl shadow-2xl w-80 relative animate-fade">

    <button id="cerrarLoginModal" class="absolute top-3 right-4 text-black text-2xl font-bold">&times;</button>

    <h2 class="text-2xl font-bold mb-4 text-center">Iniciar Sesión</h2>

    <form id="form-login" class="space-y-3">

      <div>
        <label class="block text-sm font-semibold">Correo electrónico</label>
        <input id="login-correo" name="correo" type="email"
          class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-superman-blue" required>
      </div>

      <div>
        <label class="block text-sm font-semibold">Contraseña</label>
        <input id="login-password" name="password" type="password"
          class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-superman-blue" required>
      </div>

      <button type="submit"
        class="w-full bg-black text-yellow-400 font-bold py-2 rounded-md hover:bg-gray-800 transition">
        Entrar
      </button>

    </form>

  </div>
</div>



<script src="assets/js/scripts.js" defer></script>

<script>
  const menuBtn = document.getElementById('menu-btn');
  const menu = document.getElementById('menu');
  const menuLinks = menu.querySelectorAll('a');

  menuBtn.addEventListener('click', () => {
  if(window.innerWidth < 1024){ // solo móviles
    if(menu.classList.contains('hidden')){
      menu.classList.remove('hidden');
      setTimeout(() => {
        menu.classList.remove('opacity-0', 'scale-y-0');
        menu.classList.add('opacity-100', 'scale-y-100');
      }, 10);
    } else {
      menu.classList.remove('opacity-100', 'scale-y-100');
      menu.classList.add('opacity-0', 'scale-y-0');
      setTimeout(() => menu.classList.add('hidden'), 500);
    }
  }
  menuLinks.forEach(link => {
  link.addEventListener('click', () => {
    if(window.innerWidth < 1024){ // solo móviles
      menu.classList.remove('opacity-100', 'scale-y-100');
      menu.classList.add('opacity-0', 'scale-y-0');
      setTimeout(() => menu.classList.add('hidden'), 500);
    }
  });
  });
});
</script>

<div class="absolute top-5 right-5 md:hidden">
  <i class="fa-solid fa-bars text-white text-2xl open-btn cursor-pointer"></i>
</div>


    <header class="relative overflow-hidden pt-32 pb-32">
        <div class="container mx-auto px-4 relative z-10 flex flex-col lg:flex-row items-center justify-between">
            <div class="text-center lg:text-left mb-10 lg:mb-0 hero-animation">
                <h1
                    class="text-6xl md:text-8xl font-black mb-4 font-['Bebas_Neue'] tracking-wider text-superman-blue drop-shadow-lg">
                    Superman
                </h1>
                <h2 class="text-3xl md:text-5xl font-bold mb-6 font-['Bebas_Neue'] tracking-wide">
                    Rise To Fly
                </h2>
                <p class="text-lg md:text-xl max-w-2xl mx-auto lg:mx-0">
                    Sumérgete en el mundo del Último Hijo de Krypton y en el símbolo de la esperanza.
                    Defiende Metrópolis de los villanos más icónicos del Universo DC: vuela a gran velocidad, libera tu visión de calor,
                    desata tu fuerza sobrehumana y demuestra por qué eres el verdadero guardián de la ciudad.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                    <a href="#trailer-section"
                        class="nav-link px-8 py-3 bg-white text-black font-bold rounded-full transition-all duration-300 transform hover:scale-105 shadow-md">
                        <span>Ver Trailer</span>
                    </a>
                </div>
            </div>
            <div class="relative w-full lg:w-1/2 flex justify-center lg:justify-end hero-animation">
            <div class="transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                <video src="assets/video/supermanvideo.mp4" poster="assets/video/supermanvideo.mp4" 
                    class="rounded-3xl shadow-superman-yellow w-[400px] h-[550px] object-cover" autoplay loop muted>
                </video>
            </div>
</div>

        </div>
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-superman-blue opacity-50"></div>
            <div class="absolute inset-0 animated-gradient-bg"
                style="background-image: linear-gradient(135deg, #001f4c, #0052a5, #d1121d, #ffde00);"></div>
            <div class="header-bg-blobs"></div>
        </div>
    </header>

    <main class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 ¿}78-12">
                <div class="flex flex-col justify-center fade-in-text" style="animation-delay: 0.5s;">
                    <h3 class="text-4xl font-bold mb-4 font-['Bebas_Neue'] tracking-wide text-superman-red">
                        Sumérgete en el mundo de Superman
                    </h3>
                    <p class="text-lg mb-4">
                        Descubre una historia inspirada en la película que desafiará tus poderes como Superman,
                        el Hombre del Mañana. Enfréntate a Lex Luthor, su letal creación Ultraman <br>
                         y a las implacables tropas de Los Raptores, mientras recorres escenarios <br> caóticos, vibrantes y llenos de color.
                    </p>
                    <p class="text-lg">
                        El juego cuenta con un sistema de combate dinámico que te permite combinar puñetazos
                        superpoderosos con habilidades especiales como la visión de calor y el aliento congelante.
                    </p>
                </div>
                <div class="flex justify-center items-center">
                   <img id="metropolis" src="assets/img/metropolis.jpg" alt="Metrópolis de día"
                    class="rounded-2xl shadow-lg pulse-animation w-full max-w-3xl object-cover fade-image">
           </div>
            </div>
        </div>
    </main>

<section id="story-section" class="relative bg-gray-900 text-white overflow-hidden flex items-center justify-center min-h-[450px]">
  <div class="container mx-auto px-4 z-20 text-center">
    <h3 class="text-5xl font-bold mb-6 tracking-wide font-['Bebas_Neue'] text-superman-yellow">
      LA HISTORIA
    </h3>
    <p class="max-w-2xl text-lg leading-relaxed mx-auto">
      Metrópolis se encuentra al borde del colapso por los múltiples ataques de Ultraman y los despiadados
      soldados, Los Raptores. Buscando desprestigiar a Superman, siembran destrucción y culpan a Superman
      de cada catástrofe. Pero él, fiel a sus valores, sabe cuál es el camino correcto y decide enfrentarlos cara
      a cara, dispuesto a revelar al mundo quiénes son los verdaderos villanos.

      Desde las calles de Metrópolis hasta una prisión en 
      un universo de bolsillo, pasando por la lucha para
      escapar de un agujero negro y un combate final contra Ultraman en medio de una grieta dimensional que
      amenaza con devorar la ciudad, Superman deberá arriesgarlo todo. 
      El destino de Metrópolis… y quizá de toda la realidad, está en juego.
    </p>
  </div>


  <div class="hidden md:grid grid-cols-2 gap-0 relative h-[400px]"> 
  </div>
  <div id="left-carousel-container" class="hidden md:block absolute left-4 top-4 h-full w-40 overflow-hidden flex justify-center">
  <div id="scroll-up-col" class="scroll-container space-y-4"> 
      <img src="assets/img/p1.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p2.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p3.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p4.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p5.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p6.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p7.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p8.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p9.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p10.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p11.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p12.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/p13.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
    </div>
  </div>

  <div id="right-carousel-container" class="hidden md:block absolute right-0 top-0 h-full w-40 overflow-hidden flex justify-center">
    <div id="scroll-down-col" class="scroll-container space-y-4"> 
      <img src="assets/img/comic14.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" /> 
      <img src="assets/img/comic_1.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_2.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_3.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_4.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_5.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_6.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_7.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_8.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_9.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" /> 
      <img src="assets/img/comic_10.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_12.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      <img src="assets/img/comic_13.jpg" class="w-32 h-44 object-cover rounded-xl shadow-lg" />
      </div>
  </div>
</section>

    <section id="trailer-section" class="py-16 bg-superman-red">
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-4xl font-bold mb-8 font-['Bebas_Neue'] tracking-wide text-white">
                Trailer del Juego
            </h3>

            <div class="flex justify-center">
    <div class="aspect-video w-full max-w-3xl rounded-2xl overflow-hidden shadow-lg">
        <video class="w-full h-full" controls>
            <source src="assets/video/trailer.mp4" type="video/mp4">
            Tu navegador no soporta la reproducción de video.
        </video>
    </div>
</div>


        </div>
    </section>


    <section id="abilities-section" class="py-16 bg-gray-900">
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-5xl font-bold mb-12 font-['Bebas_Neue'] tracking-wide text-superman-red">
                Poderes y Habilidades
                    </h3> <br>
          
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gray-800 p-6 rounded-xl shadow-lg card-hover-effect">
                        <video  class="mx-auto mb-4 rounded-full w-28 h-28 object-cover" autoplay loop muted>
                        <source src="assets/video/habilidades/abrir_br.mp4" type="video/mp4">
                    </video>
                    <h4 class="text-xl font-bold mb-2">Súper Fuerza</h4>
                    <p class="text-sm text-gray-300">
                        Levanta objetos pesados, detén trenes y más con tu fuerza kryptoniana.
                    </p>
                </div>

                <div class="bg-gray-800 p-6 rounded-xl shadow-lg card-hover-effect">
                    <video  class="mx-auto mb-4 rounded-full w-28 h-28 object-cover" autoplay loop muted>
                        <source src="assets/video/habilidades/volar.mp4" type="video/mp4">
                    </video>
                    <h4 class="text-xl font-bold mb-2">Vuelo</h4>
                    <p class="text-sm text-gray-300">
                        Explora la ciudad y el mundo a velocidades increíbles.
                    </p>
                </div>

                <div class="bg-gray-800 p-6 rounded-xl shadow-lg card-hover-effect">
                     <video  class="mx-auto mb-4 rounded-full w-28 h-28 object-cover" autoplay loop muted>
                        <source src="assets/video/habilidades/laser.mp4" type="video/mp4">
                    </video>
                    <h4 class="text-xl font-bold mb-2">Visión de Calor</h4>
                    <p class="text-sm text-gray-300">
                        Dispara rayos de energía desde tus ojos para derretir obstáculos.
                    </p>
                </div>

                <div class="bg-gray-800 p-6 rounded-xl shadow-lg card-hover-effect">
                    <video  class="mx-auto mb-4 rounded-full w-28 h-28 object-cover" autoplay loop muted>
                        <source src="assets/video/habilidades/hielo.mp4" type="video/mp4">
                    </video>
                    <h4 class="text-xl font-bold mb-2">Aliento Congelante</h4>
                    <p class="text-sm text-gray-300">
                        Congela a tus enemigos o apaga incendios.
                    </p>
                </div>
            </div>

        </div>
    </section>

   <section id="enemies-section" class="py-8">
    <div class="text-center w-full px-4 fade-in-text" style="animation-delay: 1s;"> 
        <h3 class="text-5xl font-bold mb-12 font-['Bebas_Neue'] tracking-wide text-superman-yellow">
            Rogues Gallery
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 max-w-2xl mx-auto">
            
            <div class="bg-gray-900 p-4 rounded-xl shadow-lg card-hover-effect w-full"> 
                <video class="mx-auto mb-4 rounded-full w-24 h-24 object-cover" autoplay loop muted>
                    <source src="assets/video/Lex_Luthor.mp4" type="video/mp4">
                </video>
                <h4 class="text-2xl font-bold mb-2">Lex Luthor</h4>
                <p class="text-sm text-gray-300">
                    El archienemigo de Superman, un genio multimillonario y filántropo
                    que ve a Superman como una amenaza para la humanidad.
                </p>
            </div>

            <div class="bg-gray-900 p-4 rounded-xl shadow-lg card-hover-effect w-full">
                <video class="mx-auto mb-4 rounded-full w-24 h-24 object-cover" autoplay loop muted>
                    <source src="assets/video/kaiju.mp4" type="video/mp4">
                </video>
                <h4 class="text-2xl font-bold mb-2">Kaiju</h4>
                <p class="text-sm text-gray-300">
                    criaturas monstruosas creadas y utilizadas por Lex Luthor
                </p>
            </div>
            
            <div class="bg-gray-900 p-4 rounded-xl shadow-lg card-hover-effect w-full">
                <video class="mx-auto mb-4 rounded-full w-24 h-24 object-cover" autoplay loop muted>
                    <source src="assets/video/ultraman.mp4" type="video/mp4">
                </video>
                <h4 class="text-2xl font-bold mb-2">Ultraman</h4>
                <p class="text-sm text-gray-300">
                    Un clon corrupto de Superman creado por Lex Luthor, convertido en la temible versión malvada del Hombre de Acero.
                </p>
            </div>
            
            <div class="bg-gray-900 p-4 rounded-xl shadow-lg card-hover-effect text-center w-full">
                <video class="mx-auto mb-4 rounded-full w-24 h-24 object-cover" autoplay loop muted>
                    <source src="assets/video/raptor.mp4" type="video/mp4">
                </video>
                <h4 class="text-2xl font-bold mb-2">Raptors</h4>
                <p class="text-sm text-gray-300">
                    Son un grupo de fuerzas militares avanzadas asociadas con
                    PlanetWatch y LuthorCorp, que son utilizadas por el villano
                    para llevar a cabo sus planes contra Superman.
                </p>
            </div>
            
        </div>

    </div>
</section>
    <section id="sketches-section" class="py-16 bg-gray-900">
        <div class="container mx-auto px-4 text-center fade-in-text" style="animation-delay: 1.5s;">
            <h3 class="text-5xl font-bold mb-12 font-bebas tracking-wide text-superman-red">
                Bocetos y Arte Conceptual
            </h3>
            <div class="infinite-carousel">
                <div class="galeriaimg" id="galeriaimg">
                    <div class="carousel-slide"><img src="assets/img/inicio1.jpg" alt="Pantalla de Inicio" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/inicio2.jpg" alt="Fortaleza de la Soledad" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/inicio3.jpg" alt="Grieta en Metrópolis" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/inicio4.jpg" alt="Ártico" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/inicio5.jpg" alt="Río de Antiprotones" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/inicio6.jpg" alt="Superman C" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/inicio7.jpg" alt="Superman Completo" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/boceto1.jpg" alt="Superman Gana" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/boceto2.jpg" alt="Superman P" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/boceto3.jpg" alt="Superman H1" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/boceto4.jpg" alt="Superman H2" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/boceto5.jpg" alt="Pecho de Superman" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/boceto6.jpg" alt="Superman 2" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/boceto7.jpg" alt="Presentación del Juego" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/boceto8.jpg" alt="Presentación del Juego" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/camilla_s.jpg" alt="Metrópolis 2" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/camilla_s2.jpg" alt="Camilla S" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/camilla_s3.jpg" alt="Camilla S2" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/camilla_s4.jpg" alt="Camilla S3" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/metropolis.jpg" alt="Camilla S4" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/metropolis2.jpg" alt="Creación 1" class="carousel-image card-hover-effect rounded-xl" /></div>
                    <div class="carousel-slide"><img src="assets/img/metropolis3.jpg" alt="Boceto 2" class="carousel-image card-hover-effect rounded-xl" /></div>
                </div>
            </div>
        </div>
    </section>


  <section id="videos-section" class="py-16 bg-superman-yellow">
    <div class="container mx-auto px-4 text-center fade-in-text" style="animation-delay: 2s;">
        <h3 class="text-5xl font-bold mb-12 font-bebas tracking-wide text-superman-red">
            Galería de Videos
                    </h3>
        <div class="infinite-carousel">
            <div class="galeriaimg" id="galeria-videos">
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_1.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_2.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_3.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_4.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_5.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_6.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_7.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_8.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_9.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_10.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_11.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_12.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="carousel-slide">
                    <video class="carousel-video card-hover-effect rounded-xl" autoplay loop muted>
                        <source src="assets/video/video_13.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>


 <?php
$usuario_id = $_SESSION["usuario_id"] ?? null;
?>

<?php if ($usuario_id): ?>
<section id="info-section" class="py-16">
    <center>
        <div class="container mx-auto px-4 fade-in-text" style="animation-delay: 2.5s;">
            <h3 class="text-5xl md:text-6xl font-extrabold mb-4 font-['Bebas_Neue'] tracking-widest text-superman-yellow animate-pulse">
                Merch Oficial
            </h3>
            
            <p class="text-xl md:text-2xl text-white mb-8">
                Echa un vistazo a la mercancía oficial y lleva a casa algo especial.
            </p>
            
            <a href="http://localhost/superman/merch.php" 
               class="inline-block px-12 py-4 bg-red-600 text-white text-2xl font-bold rounded-full shadow-lg 
                      transition duration-300 ease-in-out transform hover:scale-105 hover:bg-red-700
                      focus:outline-none focus:ring-4 focus:ring-red-500 focus:ring-opacity-50
                      animated-merch-button">
                MERCH
            </a>
        </div>
    </center>
</section>
<?php endif; ?>


     <section id="developers-section" class="py-16 bg-gray-900">
  <div class="container mx-auto px-4 text-center fade-in-text" style="animation-delay: 3s;">
    <h3 class="text-4xl font-bold mb-8 font-['Bebas_Neue'] tracking-wide text-superman-yellow">
        El Equipo de Desarrollo
    </h3>

    <div class="flex flex-wrap justify-center gap-8">
        <div class="bg-gray-800 p-6 rounded-xl shadow-lg card-hover-effect w-72">
            <img src="assets/img/edgar.jpg" alt="Foto de Edgar Omar Soria Cruz"
                 class="mx-auto mb-4 rounded-full w-36 h-36 object-cover">
            <h4 class="text-2xl font-bold mb-2">Edgar Omar Soria Cruz</h4>
            <p class="text-sm text-gray-300">Dirección general, Programador principal y Guionista</p>
        </div>

        <div class="bg-gray-800 p-6 rounded-xl shadow-lg card-hover-effect w-72">
            <img src="assets/img/alan.jpg" alt="Foto de Alan Rodrigo García Martínez"
                 class="mx-auto mb-4 rounded-full w-36 h-36 object-cover">
            <h4 class="text-2xl font-bold mb-2">Alan Rodrigo García Martínez</h4>
            <p class="text-sm text-gray-300">Dirección de arte, Diseño de escenarios y personajes</p>
        </div>
          <div class="bg-gray-800 p-6 rounded-xl shadow-lg card-hover-effect w-72">
            <img src="assets/img/sandra.jpg" alt="Foto de Sandra Patricia Vázquez Coronado"
                 class="mx-auto mb-4 rounded-full w-36 h-36 object-cover">
            <h4 class="text-2xl font-bold mb-2">Sandra Patricia Vázquez Coronado</h4>
            <p class="text-sm text-gray-300">Programadora, Documentación y Redes sociales</p>
        </div>

        <div class="bg-gray-800 p-6 rounded-xl shadow-lg card-hover-effect w-72">
            <img src="assets/img/jacob.jpg" alt="Foto de Jacob Alejandro Cortez Martínez"
                 class="mx-auto mb-4 rounded-full w-36 h-36 object-cover">
            <h4 class="text-2xl font-bold mb-2">Jacob Alejandro Cortez Martínez</h4>
            <p class="text-sm text-gray-300">Programador y Apoyo en diseño de personajes</p>
        </div>
         <div class="bg-gray-800 p-6 rounded-xl shadow-lg card-hover-effect w-72">
            <img src="assets/img/vivian.jpg" alt="Foto de Vivian Yusnier Rodríguez Ríos"
                 class="mx-auto mb-4 rounded-full w-36 h-36 object-cover">
            <h4 class="text-2xl font-bold mb-2">Vivian Yusnier Rodríguez Ríos</h4>
            <p class="text-sm text-gray-300">Programación Web, Documentación y Apoyo en presentaciones</p>
        </div>


    </div>
  </div>
</section>

<footer class="bg-black text-center py-6">
    <div class="container mx-auto px-4">
        <p class="text-gray-400 text-sm">&copy; 2024 MASTERS STUDIOS. Todos los derechos reservados. Superman y todos los personajes y elementos relacionados son marcas registradas de DC Comics.</p>
    </div>
</footer>


    
 <script>
     document.addEventListener('DOMContentLoaded', function() {
    const trackImg = document.getElementById('galeriaimg');
    const itemsImg = trackImg.children;
    const totalItemsImg = itemsImg.length;

    // Clona y añade los elementos de la galería de imágenes
    for (let i = 0; i < totalItemsImg; i++) {
        const clone = itemsImg[i].cloneNode(true);
        trackImg.appendChild(clone);
    }

    const trackVideo = document.getElementById('galeria-videos');
    const itemsVideo = trackVideo.children;
    const totalItemsVideo = itemsVideo.length;

    // Clona y añade los elementos de la galería de videos
    for (let i = 0; i < totalItemsVideo; i++) {
        const clone = itemsVideo[i].cloneNode(true);
        trackVideo.appendChild(clone);
    }
});
    </script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const scrollUpCol = document.getElementById('scroll-up-col');
    const scrollDownCol = document.getElementById('scroll-down-col');

    if (!scrollUpCol || !scrollDownCol || scrollUpCol.children.length === 0) return;

    // Calcular la altura de UN SOLO SET de imágenes (8 imágenes originales + 1 extra al inicio para el loop)
    // Para el carrusel derecho, ahora hay 9 imágenes en el "primer set" visualmente para el loop.
    // Para el izquierdo, seguimos con 8 en el "primer set".
    
    // Altura de una imagen individual
    const imageHeight = scrollUpCol.children[0].offsetHeight;
    const imageMargin = 16; // Asumiendo 'space-y-4' es 16px
    const singleImageTotalHeight = imageHeight + imageMargin;

    // Altura de un set completo (8 imágenes, las originales)
    const singleSetOriginalHeight = (imageHeight * 8) + (imageMargin * 8); 

    let scrollPositionLeft = 0;
    let scrollPositionRight = 0;

    const scrollSpeed = 0.5; // Velocidad de desplazamiento

    function animateScroll() {
      // CARRUSEL IZQUIERDO (SUBE)
      scrollPositionLeft -= scrollSpeed;
      if (scrollPositionLeft <= -singleSetOriginalHeight) {
        scrollPositionLeft = 0; 
      }
      scrollUpCol.style.transform = `translateY(${scrollPositionLeft}px)`;

      // CARRUSEL DERECHO (BAJA)
      scrollPositionRight += scrollSpeed;
      // Aquí la lógica es un poco diferente. Si la "última" imagen (la 8) está al inicio,
      // al bajar, queremos que la 8 reaparezca arriba cuando la 7 haya bajado completamente.
      // Si la posición de scroll alcanza la altura total de las 8 imágenes originales,
      // saltamos hacia atrás por esa misma altura para que el siguiente bloque (que comienza con la 8) se muestre.
      if (scrollPositionRight >= singleImageTotalHeight) { // Cuando la primera imagen (boceto8.jpg) ya salió de la vista por arriba
          scrollPositionRight -= singleSetOriginalHeight; // Retrocede la altura de un set original
      }

      scrollDownCol.style.transform = `translateY(${scrollPositionRight}px)`;

      requestAnimationFrame(animateScroll);
    }

    // Inicializa la posición del carrusel derecho para que la última imagen (boceto8.jpg) esté visible arriba
    // Necesitamos que el carrusel derecho inicie ya desplazado NEGATIVAMENTE para que el boceto8.jpg clonado al inicio
    // sea el que se vea arriba, y el boceto1.jpg original esté justo debajo.
    scrollDownCol.style.transform = `translateY(${-singleImageTotalHeight}px)`; // Lo desplazamos para que boceto1 quede visible debajo de boceto8

    animateScroll();
  });
</script>




<script>
    /**
     * Función para alternar la imagen entre 'metropolis.jpg' y 'metropolis3.jpg'
     * en el elemento con el ID 'metropolis'.
     */
    function alternarImagenMetropolis() {
        const imagen = document.getElementById('metropolis');
        if (imagen) {
            // Verifica la fuente actual y la cambia a la alternativa.
            const rutaBase = 'assets/img/';
            const actualSrc = imagen.getAttribute('src');

            if (actualSrc.endsWith('metropolis.jpg')) {
                imagen.setAttribute('src', rutaBase + 'metropolis3.jpg');
                imagen.setAttribute('alt', 'Metrópolis de noche'); // Opcional: actualiza el texto alternativo
            } else {
                imagen.setAttribute('src', rutaBase + 'metropolis.jpg');
                imagen.setAttribute('alt', 'Metrópolis de día'); // Opcional: actualiza el texto alternativo
            }
        }
    }

    // Llama a la función 'alternarImagenMetropolis' cada 3000 milisegundos (3 segundos)
    // para crear el efecto de cambio infinito.
    document.addEventListener('DOMContentLoaded', () => {
        // Ejecuta el cambio inicialmente después de 3 segundos y luego lo repite.
        // Puedes cambiar 3000 por el intervalo que prefieras (en milisegundos).
        setInterval(alternarImagenMetropolis, 3000);
    });
</script>
<script> 
/* ============================================================
   ELEMENTOS
   ============================================================ */
const btnRegistro = document.getElementById('btn-registrate');
const btnLogin = document.getElementById('btn-login');
const userInfo = document.getElementById('user-info');
const username = document.getElementById('username');
const btnLogout = document.getElementById('btn-logout');

// MODAL REGISTRO
const modalRegistro = document.getElementById('registroModal');
const cerrarRegistro = document.getElementById('cerrarModal');
const formRegistro = document.getElementById('form-registro');

// MODAL LOGIN
const modalLogin = document.getElementById('loginModal');
const cerrarLogin = document.getElementById('cerrarLoginModal');
const formLogin = document.getElementById('form-login');


/* ============================================================
   ABRIR / CERRAR MODAL DE REGISTRO
   ============================================================ */
btnRegistro?.addEventListener('click', (e) => {
    e.preventDefault();
    modalRegistro.classList.remove('hidden');
});

cerrarRegistro?.addEventListener('click', () => {
    modalRegistro.classList.add('hidden');
});

modalRegistro?.addEventListener('click', (e) => {
    if (e.target === modalRegistro) modalRegistro.classList.add('hidden');
});


/* ============================================================
   REGISTRO (PHP)
   ============================================================ */
formRegistro?.addEventListener("submit", async (e) => {
    e.preventDefault();

    const nombre = formRegistro.elements["nombre"].value;
    const correo = formRegistro.elements["correo"].value;
    const password = formRegistro.elements["password"].value;

    let datos = new FormData();
    datos.append("nombre", nombre);
    datos.append("correo", correo);
    datos.append("password", password);

    try {
        const res = await fetch("registro.php", {
            method: "POST",
            body: datos
        });

        const data = await res.json();
        alert(data.msg);

        if (data.status === "success") {
            modalRegistro.classList.add("hidden");
            window.location.href = "index.php";
        }
    } catch (err) {
        console.error(err);
        alert("Error en el servidor: " + err.message);
    }
});

/* ============================================================
   ABRIR / CERRAR MODAL LOGIN
   ============================================================ */
btnLogin?.addEventListener('click', (e) => {
    e.preventDefault();
    modalLogin.classList.remove('hidden');
});

cerrarLogin?.addEventListener('click', () => {
    modalLogin.classList.add('hidden');
});

modalLogin?.addEventListener('click', (e) => {
    if (e.target === modalLogin) modalLogin.classList.add('hidden');
});


/* ============================================================
   LOGIN (PHP)
   ============================================================ */
formLogin?.addEventListener("submit", async (e) => {
    e.preventDefault();

    const correo = formLogin.elements["correo"].value;
    const password = formLogin.elements["password"].value;

    let datos = new FormData();
    datos.append("correo", correo);
    datos.append("password", password);

    try {
        const res = await fetch("login.php", {
            method: "POST",
            body: datos
        });

        const data = await res.json();

        if (data.status === "success") {
            // Cerrar modal
            modalLogin.classList.add("hidden");

            // Recargar index.php para mostrar nombre del usuario
            window.location.href = "index.php";
        } else {
            // Si hay error, mostrar mensaje
            alert(data.msg);
        }
    } catch (err) {
        console.error(err);
        alert("Error en el servidor: " + err.message);
    }
});


/* ============================================================
   CERRAR SESIÓN
   ============================================================ */
btnLogout?.addEventListener("click", (e) => {
    e.preventDefault();

    fetch("logout.php")
    .then(() => {
        location.reload();
    });
});


/* ============================================================
   MOSTRAR SESIÓN ACTIVA (si usas JS para mostrar nombre)
   ============================================================ */
function mostrarSesion(nombre) {
    username.textContent = nombre;
    userInfo.classList.remove('hidden');
    btnLogin.classList.add('hidden');
    btnRegistro.classList.add('hidden');
}
</script>

</body>
</html>