<?php

    session_start();

    include '../../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../../class/mech.php';

    $mech = new mech(
        $_POST['name'],
        $_POST['location'],
        $_POST['special'],
        $_POST['id']
    );

    $sql = $mech->edit();    

    echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
            echo"<script>
            window.alert('Hecho!');
            window.location = '../../../main/admin/mech.php';
            </script>";
    }

?>