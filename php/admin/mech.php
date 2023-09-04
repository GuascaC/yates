<?php

    include '../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../class/mech.php';

    $mech = new mech(
        $_POST['name'],
        $_POST['special'],
        $_POST['location'],
        0
    );

    $sql = "INSERT INTO mech(name, id_special, id_location) VALUES ('$name','$special','$location')";

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../main/admin/mech.php';
        </script>";
    }

?>