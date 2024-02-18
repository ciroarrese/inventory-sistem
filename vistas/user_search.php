<div class="container is-fluid mb-6">
    <h1 class="title">Usuarios</h1>
    <h2 class="subtitle">Buscar usuario</h2>
</div>

<div class="container pb-6 pt-6">
    <?php
        require_once './php/main.php'; # Funciones #
        require_once "./php/user_table_lister.php"; # Paginador usuario #
        
        // si se encuentra seteada la variable 'user_search' llamamos a search_engine.php
        if (isset($_POST['user_search'])) {
            require_once "./php/search_engine.php";
        }

        // si no está iniciada la variable de sesión 'user_search' y se encuentra vacía
        if (!isset($_SESSION['user_search']) && empty($_SESSION['user_search'])) {
    ?>
        <div class="columns">
            <div class="column">
                <form action="" method="POST" autocomplete="off">

                    <input type="hidden" name="user_search" value="usuario">

                    <div class="field is-grouped">
                        <p class="control is-expanded">
                            <input class="input is-rounded" type="text" name="txt_buscador" placeholder="¿Qué estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30">
                        </p>
                        <p class="control">
                            <button class="button is-info" type="submit">Buscar</button>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    <?php
        } else { 
    ?>
        <div class="columns">
            <div class="column">

                <form class="has-text-centered mt-6 mb-6" action="" method="POST" autocomplete="off">
                    <input type="hidden" name="modulo_buscador" value="usuario">
                    <input type="hidden" name="eliminar_buscador" value="usuario">
                    <p>Estas buscando <strong>“<?php echo $_SESSION['user_search']; ?>”</strong></p>
                    <br>
                    <button type="submit" class="button is-danger is-rounded">Eliminar busqueda</button>
                </form>

            </div>
        </div>
    <?php
        # Eliminar usuario #
        if (isset($_GET['user_id_del'])) {
            require_once "./php/usuario_eliminar.php";
        }

        $vista = 'user_search';
        $tpus = tablePages($vista);

        $records = 15;
        $search = $_SESSION['user_search'];

        table($tpus['page'], $tpus['url'], $records, $search);

    }
    ?>
</div>