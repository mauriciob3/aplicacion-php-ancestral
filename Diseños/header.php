<?php
session_start();
$url_base = "http://localhost/ANCESTRAL/";

if (!isset($_SESSION['Nombreusuario'])) {
    header("Location:" . $url_base . "login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Sistema de Gestión</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
    <!-- Custom CSS -->
    <style>
        /* Barra de navegación */
        .navbar {
            background-color: #ffffff !important; /* Color blanco */
        }

        .navbar-brand img {
            max-height: 70px; /* Ajustar tamaño de la imagen */
            width: auto; /* Ancho automático */
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            font-size: 20px; /* Tamaño de letra más grande */
            font-weight: bold; /* Letra en negrita */
            color: #4e362a; /* Café medio oscuro */
            transition: color 0.3s; /* Transición de color al pasar el cursor */
        }

        .navbar-nav .nav-link:hover {
            color: #ff7f0e; /* Cambio a color naranja medio oscuro al pasar el cursor */
        }
    </style>
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid"> <!-- Cambio de container a container-fluid -->
                <a class="navbar-brand" href="#">
                    <img src="<?php echo $url_base;?>Diseños/logo.png" alt="Logo"> <!-- Incluir imagen del logo -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav"> <!-- Centrar botones -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo $url_base;?>Categorias/Cocteles/">Cocteles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base;?>Categorias/Contratistas/">Contratistas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base;?>Categorias/Eventos/">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base;?>Categorias/Nuestra_cultura/">Nuestra cultura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base;?>Categorias/Productos/">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base;?>Categorias/Sistema_de_pago/">Sistema de pago</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base;?>Categorias/Usuarios/">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base;?>cerrar.php/">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
    </header>

    <main class="container">
        <!-- Contenido principal -->
    </main>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-wcC+Lj3Brlln4n8DlCgeXN5nUCJwbFv/TdDMDlnxMqj+2bP4O1ra39gX9fsm1xnn" crossorigin="anonymous"></script>
</body>
</html>
