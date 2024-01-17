<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <!-- navbar-item es el logo y la acción al cliquear el logo -->
        <a class="navbar-item" href="index.php?vista=home">
            <img src="./img/logo.png" width="35">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <!-- Barra Navegación Superior -->
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">

            <!-- Usuario -->
            <div id="user" class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Usuario
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item" href="index.php?vista=user_new">
                        Nuevo
                    </a>
                    <a class="navbar-item" href="index.php?vista=user_list">
                        Lista
                    </a>
                    <a class="navbar-item" href="index.php?vista=user_search">
                        Buscar
                    </a>
                    <hr class="navbar-divider">
                </div>
            </div>

            <!-- Categorias -->
            <div id="categories" class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Categorias
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        Nueva
                    </a>
                    <a class="navbar-item">
                        Lista
                    </a>
                    <a class="navbar-item">
                        Buscar
                    </a>
                    <hr class="navbar-divider">
                </div>
            </div>

            <!-- Productos -->
            <div id="Products" class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Productos
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        Nuevo
                    </a>
                    <a class="navbar-item">
                        Lista
                    </a>
                    <a class="navbar-item">
                        Por categoria
                    </a>
                    <a class="navbar-item">
                        Buscar
                    </a>
                    <hr class="navbar-divider">
                </div>
            </div>
        </div>

        <!-- Botones Finales -->
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <!-- Boton Mi Cuenta -->
                    <a class="button is-primary is-rounded">
                        Mi cuenta
                    </a>
                    <!-- Boton Salir -->
                    <a href="index.php?vista=logout" class="button is-outlined is-rounded">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>