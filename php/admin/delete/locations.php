<?php

    session_start();

    include '../../../php/conexion.php';
    include '../../../php/class/location.php';

    date_default_timezone_set("America/Bogota");

    $location = new location(
        0,
        0,
        0,
        $_POST['id']
    );

    $sql = $location->delete();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../../main/admin/locations.php';
        </script>";
    }

?>