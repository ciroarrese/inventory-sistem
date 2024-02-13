<?php
/**
 * Trabaja en conjunto con table_pages.php 
 * Se llama en user_list.php
 */

    $start = ($page > 0) ? (($records * $page) - $records) : 0; // Desde donde vamos a comenzar a mostrar los registros
    $table = ''; // iremos agrgando valores para finalmente imprimir la tabla

    if (isset($search) && $search != '') {
        // consulta para obtener los usuarios filtrados por $search, utilizando LIMIT
        $query_db = 'SELECT *
            FROM usuario 
            WHERE usuario_id != "'. $_SESSION['id'] .'"
                AND usuario_nombre LIKE "'. $search . '"
                OR usuario_apellido LIKE "' . $search . '"
                OR usuario_usuario LIKE "' . $search . '"
                OR usuario_email LIKE "' . $search . '"
            ORDER BY usuario_nombre ASC
            LIMIT '. $start .', '. $records .';
        ';

        // obtener el total de registros que coiciden con $serach en la tabla usuarios
        $query_total = 'SELECT COUNT(usuario_id)
            FROM usuario 
            WHERE usuario_id != "' . $_SESSION['id'] . '"
                AND usuario_nombre LIKE "' . $search . '"
                OR usuario_apellido LIKE "' . $search . '"
                OR usuario_usuario LIKE "' . $search . '"
                OR usuario_email LIKE "' . $search . '";
        ';

    } else {
        // consulta para obtener los usuarios utilizando LIMIT
        $query_db = 'SELECT *
            FROM usuario 
            WHERE usuario_id != "'. $_SESSION['id'] .'"
            ORDER BY usuario_nombre ASC
            LIMIT '. $start .', '. $records .';
        ';

        // consulta para obtener la cantidad total de registros en la tabla usuarios
        $query_total = 'SELECT COUNT(usuario_id)
            FROM usuario 
            WHERE usuario_id != "' . $_SESSION['id'] . '";
        ';
    }
    
    $db = dbConnect(); // creamos una conexión a la db

    $data = $db -> query($query_db); // ejecutamos la consulta en la DB
    $data = $data -> fetchAll(); // creamos una erray con los resultados de la query

    $total = $db -> query($query_total); // obtenemos el numero total de registros
    $total = (int)$total -> fetchColumn(); // convertimos en entero el resultado

    $nPages = ceil($total/$records); // calculamos la cantidad de páginas redondeando al numero entero siguiente

    unset($db); // cerramos la conexión a la db

    // cabecera de la tabla
    $table .= '
        <div class="table-container">
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr class="has-text-centered">
                        <th>#</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
    ';

    // cuerpo de la tabla con valores
    if ($total >= 1 && $page <= $nPages) {
        $recordCounter = $start + 1; // Iniciamos el contador de filas
        $startUser = $start + 1; // Numero de primer registro en la página

        // por cada fila mostramos un usuario
        foreach ($data as $row) {
            $table .= '
                <tr class="has-text-centered">
                    <td>'.$recordCounter.'</td>
                    <td>'.$row['usuario_nombre'].'</td>
                    <td>'.$row['usuario_apellido'].'</td>
                    <td>'.$row['usuario_usuario'].'</td>
                    <td>'.$row['usuario_email'].'</td>

                    <td>
                        <a href="index.php?vista=user_update&user_update='.$row['usuario_id'].'" class="button is-success is-rounded is-small">Actualizar</a>
                    </td>

                    <td>
                        <a href="'.$url.$page.'&user_delete='.$row['usuario_id'].'" class="button is-danger is-rounded is-small">Eliminar</a>
                    </td>
                </tr>
            ';

            $recordCounter ++;
        }

        $endUser = $recordCounter - 1; // número del último registro mostrado

    } else {
        // si quieren forzar una página mostramos que tiene que retoranar a la pagina 1
        if ($total >= 1) {
            $table .= '
                <tr class="has-text-centered">
                    <td colspan="7">
                        <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                            Haga clic acá para recargar el listado
                        </a>
                    </td>
                </tr>
            ';
        } else {
            // en el caso de no existir usuario mostramos que no hay nada que mostrar
            $table .= '
                <tr class="has-text-centered">
                    <td colspan="7">
                        No hay registros en el sistema
                    </td>
                </tr>
            ';
        }
        
    }

    // pie de tabla
    $table .= '
                </tbody>
            </table>
        </div>
    ';

    if ($total >= 1 && $page <= $nPages) {
        $table .= '
            <p class="has-text-right">
                Mostrando usuarios <strong>'.$startUser.'</strong> al <strong>'.$endUser.'</strong> de un <strong>total de '.$total.'</strong>
            </p>
        ';
    }

    // mosotramos el resultado
    echo $table;

    if ($total >= 1 && $page <= $nPages) {
        echo table_pag($page, $nPages, $url, 5);
        // echo paginador_tablas($page, $nPages, $url, 5);
    }
