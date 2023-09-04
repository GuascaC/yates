<?php

    session_start();

    include '../../../php/conexion.php';
    include '../../../php/class/service.php';

    date_default_timezone_set("America/Bogota");

    $service= new service(
        0,
        $_POST['id']
    );

    $sql = $service->delete();

    echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../../main/admin/service.php';
        </script>";
    }

?>