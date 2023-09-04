<?php

    session_start();

    include '../../../php/conexion.php';
    include '../../../php/class/yacht.php';

    date_default_timezone_set("America/Bogota");

    $yacht = new yacht(
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        $_POST['id']
    );

    $sql = $yacht->delete();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../../main/admin/index.php';
        </script>";
    }

?>