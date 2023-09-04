<?php

    session_start();

    include '../../../php/conexion.php';
    include '../../../php/class/mech.php';

    date_default_timezone_set("America/Bogota");

    $mech = new mech(
        0,
        0,
        0,
        $_POST['id']
    );

    $sql = $mech->delete();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../../main/admin/mech.php';
        </script>";
    }

?>