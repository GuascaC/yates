<?php

    include '../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../class/location.php';


    $schedule = $_POST['schedule']."-".$_POST['schedule2'];

    $location = new location(
        $_POST['location'],
        $_POST['name'],
        $schedule,
        0
    );


    $sql = $location->add();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../main/admin/locations.php';
        </script>";
    }

?>