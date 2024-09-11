<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome (para los íconos de redes sociales) -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* Personalización de colores y estilos adicionales */
        .navbar-bg {
            background-color: #ffffff;
        }
        .primary-btn {
            background-color: #1e3a8a; /* Color azul fuerte */
        }
        .primary-btn:hover {
            background-color: #2563eb; /* Color hover azul más claro */
        }
        .secondary-btn {
            border-color: #4b5563; /* Color gris oscuro */
            color: #4b5563; /* Texto gris oscuro */
        }
        .secondary-btn:hover {
            background-color: #4b5563;
            color: #ffffff; /* Hover: gris oscuro y texto blanco */
        }
        /* Estilos adicionales de hover para los íconos */
        .social-icon:hover {
            transform: scale(1.2);
            transition: transform 0.3s ease-in-out;
        }
        /* Imagen de fondo personalizada */
        .bg-custom {
            background-image: url('/imgs/messi1.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover; /* Para que la imagen cubra toda el área */
            background-position: center; /* Para centrar la imagen */
        }
    </style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-custom"> <!-- Agrega la clase bg-custom para el fondo -->

    <!-- Navbar -->
    <nav class="navbar-bg p-6 flex justify-between items-center shadow-md">
        <div class="flex items-center space-x-3">
            <span class="bg-blue-600 h-4 w-4 rounded-full"></span>
            <h1 class="text-xl font-bold text-gray-800">LEON LABORAL</h1>
            <span class="text-gray-500">/ GESTOR DE TRABAJO</span>
        </div>
        <div class="flex space-x-6">
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">INICIAR SESIÓN</a>
            <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600">REGISTRAR</a>
        </div>
    </nav>

    <!-- Main Section -->
    <section class="flex justify-center items-center min-h-screen bg-gray-100 bg-opacity-70"> <!-- Agrega bg-opacity-70 para dar transparencia -->
        <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-16">
            <!-- Left side: Profile Card -->
            <div class="bg-gray-200 p-8 rounded-lg shadow-lg">
                <img src="{{ asset('imgs/images.jpeg') }}" alt="Profile" class="rounded-full w-32 h-32 mx-auto mb-4">
                <h2 class="text-center text-xl font-semibold text-gray-800">Neymar JR</h2>
                <p class="text-center text-gray-600">Futbolista Senior</p>
                <div class="flex justify-center space-x-4 mt-4">
                    <!-- Íconos de redes sociales -->
                    <a href="#" class="text-gray-600 hover:text-blue-600 social-icon">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 social-icon">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 social-icon">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-pink-600 social-icon">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                </div>
            </div>

            <!-- Right side: Introduction -->
            <div class="max-w-lg text-center md:text-left">
                <h1 class="text-4xl font-bold text-gray-900">Hola</h1>
                <p class="text-xl text-gray-700 mt-4">Este Jugador formo parte del equipo "LEON-LABORAL"</p>
                <div class="flex justify-center md:justify-start space-x-4 mt-6">
                    <a href="#" class="primary-btn text-white py-2 px-4 rounded-lg hover:bg-blue-700">CARRERA</a>
                    <a href="#" class="secondary-btn border text-gray-600 py-2 px-4 rounded-lg">TITULOS</a>
                </div>
                <p class="text-gray-600 mt-6 leading-relaxed">
                    Neymar da Silva Santos Júnior es un futbolista brasileño que juega como delantero en el Al-Hilal Saudi F. C. de la Liga Profesional Saudí. Es internacional absoluto con la selección de Brasil.​ Reconocido como un destacado goleador y creador de juego, es ampliamente considerado uno de los mejores jugadores del mundo.​
                </p>
            </div>
        </div>
    </section>

</body>
</html>
