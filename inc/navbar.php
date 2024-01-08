<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
    <!-- navbar-item es el logo y la acción la cliquear el logo -->
        <a class="navbar-item" href="index.php?vista=home">
            <img src="./img/logo.png" width="35">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
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

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary is-rounded">
                        Mi cuenta
                    </a>
                    <a class="button is-outlined is-rounded">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>