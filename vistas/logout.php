<?php
    // destruimos la session
    session_destroy();

    // redirigimos al usuario a la página de login
    if (headers_sent()) {
        echo '
            <script>
                location.reload(true);
                window.location.href="index.php?vista=login";
            </script>
            ';
    } else {
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");

        header('Location: index.php?vista=login');
    }