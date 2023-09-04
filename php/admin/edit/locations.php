<?php

    session_start();

    include '../../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../../class/location.php';

    $location = new location(
        $_POST['location'],
        $_POST['name'],
        $_POST['schedule'],
        $_POST['id']
    );

    $sql = $location->edit();    

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
            echo"<script>
            window.alert('Hecho!');
            window.location = '../../../main/admin/locations.php';
            </script>";
    }

?>