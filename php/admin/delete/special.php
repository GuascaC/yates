<?php

    session_start();

    include '../../../php/conexion.php';
    include '../../../php/class/special.php';

    date_default_timezone_set("America/Bogota");

    $special = new special(
        0,
        $_POST['id']
    );

    $sql = $special->delete();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../../main//admin/special.php';
        </script>";
    }

?>