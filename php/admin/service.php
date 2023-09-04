<?php

    include '../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../class/service.php';

    $service= new service(
        $_POST['service'],
        0
    );

    $sql = $service->add();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../main/admin/service.php';
        </script>";
    }

?>