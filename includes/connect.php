<?php 

    $connect = new mysqli ('localhost', 'root', '', 'lena');
    if(!$connect){
        die(mysqli_error($connect));
    }
    

?>