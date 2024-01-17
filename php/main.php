<?php

    /**
     * 2023-2024 Ciro Vignolles Arrese
     *
     * NOTICE OF LICENSE
     *
     * MIT License
     * 
     * Copyright (c) [2023] [Ciro Vignolles Arrese]
     * 
     * Permiso otorgado, de forma gratuita, a cualquier persona que obtenga una copia
     * de este software y archivos de documentación asociados (el "Software"), para
     * tratar el Software sin restricciones, incluidos, entre otros, los derechos
     * de uso, copia, modificación, fusión, publicación, distribución, sublicencia
     * y/o venta de copias del Software, y a permitir a las personas a las que el
     * Software se les proporcione a hacer lo mismo, sujeto a las siguientes condiciones:
     * 
     * El aviso de copyright anterior y este aviso de permisos se incluirán en
     * todas las copias o partes sustanciales del Software.
     * 
     * EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA
     * O IMPLÍCITA, INCLUYENDO PERO NO LIMITADO A LAS GARANTÍAS DE COMERCIALIZACIÓN,
     * IDONEIDAD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS
     * AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER
     * RECLAMO, DAÑO U OTRO EVENTO SIMILAR, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO
     * O CUALQUIER OTRO MOTIVO, QUE SURJA DE O EN CONEXIÓN CON EL SOFTWARE O EL USO
     * U OTROS NEGOCIOS EN EL SOFTWARE.
     * 
     * [Para más información sobre la Licencia MIT, consulte:
     * https://opensource.org/licenses/MIT]
     *
     * @author    Ciro Vignolles Arrese <ciroarrese.code@gmail.com>
     * @copyright 2007-2017 Ciro Vignolles Arrese
     * @license   https://opensource.org/licenses/MIT
     */

    /**
     * Función que nos permitirá conectarnos y manejar una DB
     * 
     * @param string $motor El tipo de motor que usa la DB
     * @param string $host Nombre de usario para conectarnos a la base de datos (root en nuestro caso)
     * @param string $db nombre de la DB a la que nos conectamos
     * @param string $user nombre de usario para ingresar a la DB
     * @param string $pass password para conectarnos a la DB
     * 
     * @return object retorna el objeto que nos permitirá trabajar con la DB
     */
    function dbConnect($motor = 'mysql', $host = 'localhost', $db = 'inventario', $user = 'root', $pass = '') {
    
        try {
            $pdo = new PDO($motor.':host='.$host.';dbname='.$db,$user,$pass);
    
            // si se establece la conexión informamos
            if ($pdo) {
                return $pdo;
            }
    
        } catch (\Throwable $th) {
            // manejamos el error en caso de no poder establecer conexión
            echo '<b>Error de conexión: </b>' . $th->getMessage();
        }

    }

    /**
     * Función que prueba mediante un insert que estemos logrando realizar querys a la DB
     * 
     * @param object $pdo Objeto de conexión a nuestra DB
     * @param string $cat Nombre categoría a insertar
     * @param string $ubi Ubicación
     * 
     * @return null
     * 
     */
    function pruebaInsertCategoria($pdo,$cat,$ubi){
        try {

            // preparamos la consulta
            $query = $pdo -> prepare('
                INSERT
                INTO categoria(categoria_nombre, categoria_ubicacion)
                VALUES (:categoria, :ubicacion);
            ');
    
            // pasamos los parámetros
            $query->bindParam(':categoria',$cat);
            $query->bindParam(':ubicacion',$ubi);
    
            // ejecutamos la consulta y alamecnamos los resultados
            $result = $query -> execute();
            
            if ($result) {
                // si es positivo mostramos las filas afectadas
                echo '<b>Insercion exitosa.</b><br> Filas afectadas: ' . $query -> rowCount() . '<br><br>';
            }
    
        } catch (\Throwable $th) {
            // mostramos el error que nos devuelvea
            throw $th;
        }
    }

    /**
     * Función encargada de comparar una cadena de texto con
     * una expresión regular dada y retornar si el texto coincide o no
     * con la expresión.
     * 
     * @param string $expresion Expresion regular para validar la cadena de texto
     * @param string $cadena Cadena de texto a validar por la expresion
     * 
     * @return bool Devuelve true si $cadena coincide con $expresion
     */
    function verificar_datos($expresion, $cadena){

        $result = (preg_match("/^".$expresion."$/", $cadena)) ? true : false;

        return $result;

    }

    /**
     * Función encargada de impedir inyección SQL al momento de tomar datos desde formularios
     * 
     * @param string $cadena Cadena de caracteres a formatear
     * 
     * @return string Retorna la cadena de caracteres formateada
     */
    function limpiar_cadena($cadena){

        //sacamos los espacios
		$cadena=trim($cadena);
        // quitamos las posibles "/" que haya
		$cadena=stripslashes($cadena);

        // función que nos permitirá reemplzar caracteres sincro NO CASE SENSITIVE
		$cadena=str_ireplace("<script>", "", $cadena);
		$cadena=str_ireplace("</script>", "", $cadena);
		$cadena=str_ireplace("<script src", "", $cadena);
		$cadena=str_ireplace("<script type=", "", $cadena);
		$cadena=str_ireplace("SELECT * FROM", "", $cadena);
		$cadena=str_ireplace("DELETE FROM", "", $cadena);
		$cadena=str_ireplace("INSERT INTO", "", $cadena);
		$cadena=str_ireplace("DROP TABLE", "", $cadena);
		$cadena=str_ireplace("DROP DATABASE", "", $cadena);
		$cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
		$cadena=str_ireplace("SHOW TABLES;", "", $cadena);
		$cadena=str_ireplace("SHOW DATABASES;", "", $cadena);
		$cadena=str_ireplace("<?php", "", $cadena);
		$cadena=str_ireplace("?>", "", $cadena);
		$cadena=str_ireplace("--", "", $cadena);
		$cadena=str_ireplace("^", "", $cadena);
		$cadena=str_ireplace("<", "", $cadena);
		$cadena=str_ireplace("[", "", $cadena);
		$cadena=str_ireplace("]", "", $cadena);
		$cadena=str_ireplace("==", "", $cadena);
		$cadena=str_ireplace(";", "", $cadena);
		$cadena=str_ireplace("::", "", $cadena);
		$cadena=str_ireplace("'", "", $cadena);
		$cadena=str_ireplace('"', "", $cadena);
        
		$cadena=trim($cadena);
		$cadena=stripslashes($cadena);
		
        return $cadena;
	}

    /**
     * Funció para renombrar fotos
     * 
     * @param string $name Cadena de texto a formatear
     * 
     * @return string retorna la cadena de texto formateada
     */
    function pic_rename($name){
        $name = str_ireplace(' ', '_', $name);
        $name = str_ireplace('/', '_', $name);
        $name = str_ireplace('#', '_', $name);
        $name = str_ireplace('-', '_', $name);
        $name = str_ireplace('$', '_', $name);
        $name = str_ireplace('.', '_', $name);
        $name = str_ireplace(',', '_', $name);

        // agragamos un valor aleatorio entre 0 y 1000 al final
        $name = $name.'_'.rand(0, 1000);

        return $name;
    }

    /**
     * Funcion encargada de sumar una paginación a nuestra aplicación
     * 
     * @param int $pag pagina en la que nos encontramos
     * @param int $total cantidad total de paginas
     * @param string $url ruta de la pagina
     * @param int $buttons cantidad de botones que queremos mostrar
     * 
     * @return string variable con el html de la paginación
     * 
     */
    function table_pag($pag, $total, $url, $buttons){
        $paginator = '
            <nav class="pagination is-rounded" role="navigation" aria-label="pagination">
        ';

        // primera parte. Boton anterior y primera página
        if ($pag <= 1) {
            $paginator .= '
                <a class="pagination-previous is-disabled" disabled>
                    Anterior
                </a>

                <ul class="pagination-list">
            ';
        } else {
            $paginator .= '
                <a class="pagination-previous" href="'.$url.($pag - 1).'">
                    Anterior
                </a>

                <ul class="pagination-list">
                    <li>
                        <a class="pagination-link" href="'.$url.'1">
                            1
                        </a>
                    </li>
                    <li>
                        <span class="pagination-ellipsis">
                            &hellip;
                        </span>
                    </li>
            ';
        }

        // Tercera parte. Generar botones intermedios
        $count = 0; # contador de botones
        for ($i=$pag;$i <= $total; $i++) { 

            // validamos que la antidad de botones sea la deseada
            if ($count >= $buttons) {
                break; # cortamos el ciclo
            }

            // Si el boton es el elegido actualmente, lo resltamos. Caso contrario queda normal
            if ($pag == $i) {
                $paginator .= '
                    <li>
                        <a class="pagination-link is-current" href="'.$url.$i.'">
                            '.$i.'
                        </a>
                    </li>
                ';
            } else {
                $paginator .= '
                    <li>
                        <a class="pagination-link" href="'.$url.$i.'">
                            '.$i.'
                        </a>
                    </li>
                ';
            }

            // Contamos que se agregó un botón para llevar la cuenta
            $count ++;
            
        }

        // Tercera parte. Boton siguiente y última pagina
        if ($pag == $total) {
            $paginator .= '
                </ul>
                <a class="pagination-next is-disabled" disabled>
                    Siguiente
                </a>
            ';
        } else {
            $paginator .= '
                    <li>
                        <span class="pagination-ellipsis">
                            &hellip;
                        </span>
                    </li>
                    <li>
                        <a class="pagination-link" href = "'.$url.$total.'"aria-label="Goto page 47">
                            '.$total.'
                        </a>
                    </li>  
                </ul>
                <a class="pagination-next" href="'.$url.($pag + 1).'">
                    Siguiente
                </a>
            ';
        }

        $paginator .= '</nav>';
        
        return $paginator;
    }

    /**
     * Funcion para validar el formato cargado del email
     * 
     * @param string $email cadena de caracteres con el mail ingresado
     * 
     * @return boolean verdadero si el formato es correcto, falso si el formato es incorrecto
     * 
     */
    function email_format($email){
        return (filter_var($email, FILTER_VALIDATE_EMAIL))? true : false;
    }

    /**
     * Funcion para validar si un email existe en nuestra base de datos
     * 
     * @param string $search cadena de texto con el valor del email a buscar
     * @param string $type 'email' || 'user' cadena de texto cuyo valor identificará en donde se debe buscar el valor $search dentro de la DB.
     * 
     * @return boolean falso si el mail no existe, verdadero si el mail existe en la db
     */
    function existInDb($search, $type){
        // iniciamos la conexión
        $conecction = dbConnect();

        // ejecutamos la query que nos validará si el email existe en la DB
        if($type === 'email'){
            $chech = $conecction->query("
                SELECT usuario_email
                FROM usuario
                WHERE usuario_email = '$search'
            ");
        }

        if($type === 'user'){
            $chech = $conecction->query("
                SELECT usuario_usuario
                FROM usuario
                WHERE usuario_usuario = '$search'
            ");
        }

        // cerramos la conexión
        unset($conecction);

        // retornamos true si la consulta retorno filas
        return ($chech->rowCount() > 0)? true : false;
    }

    /**
     * Funcion encargada de ineertar un usuario nuevo en la tabla usuarios dentro de la DB
     * 
     * @param string $name cadena de caracteres con los el nombre del usuario
     * @param string $lastname cadena de caracteres con el apellido del usuario
     * @param string $userName cadena de caracteres con el usuario
     * @param string $password cadena de caracteres con la pass del usuario
     * @param string $email cadena de caracteres con el email del usuario
     * 
     * @return boolean retorna TRUE o FALSE si la insercion fue exitosa o no.
     */
    function createUser($name, $lastname, $userName, $password, $email){
        $db = dbConnect();

        $createUser = $db->prepare("
            INSERT INTO
            usuario(
                usuario_nombre,
                usuario_apellido,
                usuario_usuario,
                usuario_clave,
                usuario_email
            )
            VALUES (
                :name,
                :lastname,
                :userName,
                :password,
                :email
            );
        ");

        $marks = [
            ':name' => $name,
            ':lastname' => $lastname,
            ':userName' => $userName,
            ':password' => $password,
            ':email' => $email
        ];

        $createUser->execute($marks);
        $success = ($createUser->rowCount() == 1) ? TRUE : FALSE;

        unset($createUser);
        return $success;
    }

    /**
     * Funcion encargada de validar que un usario exista en la DB
     * 
     * @param string $user cadena de texto con el usuario a buscar
     * @param string $pass cade de texto con la pass que se ingresó
     * 
     * @return mixed retorna $result o FALSE en caso de no exitir
     */
    function check_login($user, $pass){
        $db = dbConnect();

        // realizamos la query para obtener los datos de ese usuario
        $result = $db->query("
            SELECT *
            FROM usuario
            WHERE usuario_usuario = '$user'
        ");
        
        unset($db);

        // si el resultado es ditinto de 1 hay resultados retornamos false
        if ($result->rowCount() !== 1) {
            return false;
        }

        // si hay resultados los convertimos en un objeto
        $result = $result->fetch(PDO::FETCH_OBJ);
        
        
        // validamos si la contraseña es distinta
        if(!password_verify($pass, $result->usuario_clave) && !$result->usuario_usuario !== $user) {
            return false;
        }
        
        return $result;
    }

?>