<div class="container is-fluid mb-6">
    <h1 class="title">Usuarios</h1>
    <h2 class="subtitle">Lista de usuarios</h2>
</div>

<div class="container pb-6 pt-6">

    <?php
        require_once './php/main.php'; // incluimos las funciones
        require_once './php/user_table_lister.php'; // incluimos el listador de usuarios
        
        $vista = 'user_list';
        $tpul = tablePages($vista);
        
        $records = 10;
        $search = '';

        table($tpul['page'], $tpul['url'], $records, $search);
        
    ?>

</div>