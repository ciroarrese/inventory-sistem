<?php
    require 'main.php';

    /** INICIO -> PARAMETROS */
    // Obtenemos los datos del formulario
    $name = limpiar_cadena($_POST['name']);
    $lastname = limpiar_cadena($_POST['lastname']);

    $user = limpiar_cadena($_POST['user']);
    $email = limpiar_cadena($_POST['email']);

    $pass1 = limpiar_cadena($_POST['pass1']);
    $pass2 = limpiar_cadena($_POST['pass2']);
    /** FIN -> PARAMTEROS */

    /** INICIO -> DATOS OBLIGATORIOS */ 
    //validamos que los datos obligatorios sean ingresados
    if(empty($name) || empty($lastname) || empty($user) || empty($pass1) || empty($pass2)) {
        
        echo '
            <div class="notification is-danger is-light">
                <b>¡ERROR!</b><br>
                No has completado los campos obligatorios
            </div>
        ';
        exit();
    }
    /** FIN -> DATOS OBLIGATORIOS */

    /** INICIO -> VALIDACION FORMATO - PATTERN */
    // validamos que los datos coincidan con su pattern de cada campo
    if(!verificar_datos('[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}',$name)){

        echo '
            <div class="notification is-warning is-light">
                <b>¡ADVERTENCIA!</b><br>
                El <em>NOMBRE</em> no coincide con el formato solicitado
            </div>
        ';
        exit();

    }
    
    if(!verificar_datos('[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}',$lastname)){

        echo '
            <div class="notification is-warning is-light">
                <b>¡ADVERTENCIA!</b><br>
                El <em>APELLIDO</em> no coincide con el formato solicitado
            </div>
        ';
        exit();

    }
    
    if(!verificar_datos('[a-zA-Z0-9$_.\-]{4,20}',$user)){

        echo '
            <div class="notification is-warning is-light">
                <b>¡ADVERTENCIA!</b><br>
                El <em>USUARIO</em> no coincide con el formato solicitado
            </div>
        ';
        exit();

    }
    
    if(!verificar_datos('[a-zA-Z0-9$@_#&%!¡¿?.\-]{7,100}',$pass1)){

        echo '
            <div class="notification is-warning is-light">
                <b>¡ADVERTENCIA!</b><br>
                La <em>PASSWORD</em> no coincide con el formato solicitado
            </div>
        ';
        exit();

    }
    /** FIN -> VALIDACION FORMATO - PATTERN */

    
    /** INICIO -> VALIDACION EMAIL */
    // validamos si el cliente ingresó un email
    if ($email){
        // validamos si el formato del email no es correcto
        if(email_format(!$email)){

            echo '
            <div class="notification is-warning is-light">
                <b>¡ADVERTENCIA!</b><br>
                El <em>EMAIL</em> ingresado no posee una formato válido
            </div>
            ';
            exit();
        }
        
        // validamos si el mail exite en la db
        if(existInDb($email,'email')){
            
            echo '
            <div class="notification is-warning is-light">
                <b>¡ADVERTENCIA!</b><br>
                El <em>EMAIL</em> ingresado ya se encuentra en uso.<br>
                El mail debe ser único
            </div>
            ';
            exit();

        }
    }
    /** FIN -> VALIDACION EMAIL */

    /** INICIO -> VALIDACION USUARIO */
    if(existInDb($user, 'user')){
        echo '
            <div class="notification is-warning is-light">
                <b>¡ADVERTENCIA!</b><br>
                El <em>USUARIO</em> ingresado ya se encuentra en uso.<br>
                El usuario debe ser único
            </div>
            ';
        exit();
    }
    /** FIN -> VALIDACION USUARIO */
    
    /** INICIO -> VALIDACION PASSWORD */
    // validamos que los campos de las contraseñas sean iguales
    if($pass1 !== $pass2) {

        echo '
            <div class="notification is-warning is-light">
                <b>¡ADVERTENCIA!</b><br>
                Las <em>PASSWORDS</em> no coinciden entre si
            </div>
        ';
        exit();

    } else {
        // si son iguales hasheamos la pass para almacenarla
        $passHash = password_hash($pass1, PASSWORD_BCRYPT, ['cost' => 10]);

    }
    /** FIN -> VALIDACION PASSWORD */

    /** INICIO -> INSERCION DE USUARIO */
    // En caso de que no se halla podido insertar informamos
    if(!createUser($name, $lastname, $user, $passHash, $email)){
        echo '
            <div class="notification is-danger is-light">
                <b>¡ERROR!</b><br>
                El <em>USUARIO</em> no se pudo registrar.<br>
                Verifique los datos o vuelva a intentar más tarde
            </div>
        ';
        exit();
    } else {
        // en caso de que haya sido exitoso informamos
        echo '
            <div class="notification is-success is-light">
                <b>GUARDADO</b><br>
                El USUARIO se registró correctamente.
            </div>
        ';
    }
    /** FIN -> INSERCION DE USUARIO */




    