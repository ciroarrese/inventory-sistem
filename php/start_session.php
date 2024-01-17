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
    $dbUser = check_login($user, $pass);
    
    if(!$dbUser){
        echo '
        <div class="notification is-danger is-light">
        <b>¡ERROR!</b><br>
        El USUARIO o la PASSWORD incorrectos
        </div>
        ';
        exit();
    }
    /** FIN -> CONSULTA EXISTENCIA DE DATOS */

    /** INICIO -> SETEO DE SESSION */
    $_SESSION['id'] = $dbUser->usuario_id;
    $_SESSION['name'] = $dbUser->usuario_nombre;
    $_SESSION['lastname'] = $dbUser->usuario_apellido;
    $_SESSION['user'] = $dbUser->usuario_usuario;
    $_SESSION['user'] = $dbUser->usuario_usuario;
    /** FIN -> SETEO DE SESSION */

    /** INICIO -> REDIRECCION */
    // validamos si hemos enviado los encabezados
    if(headers_sent()){
        echo '
        <script>
        window.location.href="index.php?vista=home"
        </script>
        ';
    } else {
        header('Location: index.php?vista=home');
    }
    /** FIN -> REDIRECCION */
