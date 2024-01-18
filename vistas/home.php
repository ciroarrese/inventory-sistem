<?php require "./php/main.php"; ?>
<div class="container is-fluid">
    <h1 class="title">Home</h1>
    <h2 class="subtitle">
        <?php
            echo welcome($_SESSION['name'], $_SESSION['lastname']);
        ?>
    </h2>
</div>