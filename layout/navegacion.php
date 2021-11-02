<body class="bg-dark">
    <div class="loader-main active-loader" id="loader">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="lds-ellipsis">
                <p>Cargando</p>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="./home.php"><img src="./img/logo-text.png"></img></a>
            <div class="nav-left">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Perfil</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Hola: <?php echo $_SESSION['name']; ?></a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="./perfil.php">Ajustes</a></li>
                                <li><a class="dropdown-item" href="#!">Iniciar Sesión</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./home.php">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./productos.php">Productos</a></li>
                        <li class="nav-item"><a class="nav-link active" href="./compras.php">Compras</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>

    <style>
        .nav-left {
            display: flex;
        }
    </style>