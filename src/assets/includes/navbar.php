<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Sistema SEN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <!-- Administrador -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown">
                        Administrador
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="usuarios.php">Usuarios</a></li>
                    </ul>
                </li>

                <!-- Gestión -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="gestionDropdown" role="button" data-bs-toggle="dropdown">
                        Gestión
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="nuevos_pedidos.php">Nuevos Pedidos</a></li>
                        <li><a class="dropdown-item" href="modificar_pedidos.php">Modificar Pedidos</a></li>
                        <li><a class="dropdown-item" href="cancelar_pedidos.php">Cancelar Pedidos</a></li>
                    </ul>
                </li>

                <!-- Visualizar Pedidos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="visualizarDropdown" role="button" data-bs-toggle="dropdown">
                        Visualizar Pedidos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="localizar_pedidos.php">Localizar Pedidos</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
