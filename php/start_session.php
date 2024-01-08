<?php

    /** INICIO -> PARAMETROS */
    $user = limpiar_cadena($_POST['login_user']);
    $pass = limpiar_cadena($_POST['login_pass']);
    /** FIN -> PARAMETROS */

    /** INICIO -> VERIFICACION CAMPOS*/
    // validamos si no existen
    if (!$user || !$pass) {
        echo '
            <div class="notification is-danger is-light">
                <b>¡ERROR!</b><br>
                No has completado los campos correctamente
            </div>
        ';
        exit();
    }
    
    if (!verificar_datos('[a-zA-Z0-9$_.\-]{4,20}',$user)) {
        echo '
            <div class="notification is-danger is-light">
                <b>¡ERROR!</b><br>
                El formato de USER no coincide con el solicitado
            </div>
        ';
        exit();
    }
    
    if(!verificar_datos('[a-zA-Z0-9$@_#&%!¡¿?.\-]{7,100}', $pass)){
        echo '
            <div class="notification is-danger is-light">
                <b>¡ERROR!</b><br>
                El formato de la PASSWORD no coincide con el solicitado
            </div>
        ';
        exit();
    }
    /** FIN -> VERIFICACION CAMPOS*/

    /** INICIO -> CONSULTA EXISTENCIA DE DATOS */
    
    /** FIN -> CONSULTA EXISTENCIA DE DATOS */