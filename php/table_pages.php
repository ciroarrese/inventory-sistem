<?php

// TODO Convertir en función para reutilizar en user_search y user_list

if (!isset($_GET['page'])) {
    $page = 1;
    
} else {
    $page = (int) $_GET['page'];
    
    if ($page < 1) {
        $page = 1;
    }
}

$page = limpiar_cadena($page);
$url = 'index.php?vista=user_list&page=';
$records = 10;
$search = '';