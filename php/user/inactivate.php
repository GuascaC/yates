<?php

    session_start();

    include '../../php/conexion.php';
    include_once '../class/user.php';

    date_default_timezone_set("America/Bogota");

    $user = new user(
        0,
        0,
        0,
        0,
        0,
        0,
        $_SESSION['id']
    );

    $sql = $user->inactivate();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../login.php';
        </script>";
    }

?>