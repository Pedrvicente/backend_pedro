<?php
    

    session_start();
    session_unset();
    session_destroy();
    echo "<script>window.open('../public/index.php','_self')</script>";


?>