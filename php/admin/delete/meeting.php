<?php

    session_start();

    include '../../../php/conexion.php';
    include '../../../php/class/meeting.php';

    date_default_timezone_set("America/Bogota");

    $meeting = new meeting(
        0,
        0,
        0,
        0,
        $_POST['id']
    );

    $sql = "DELETE FROM meetings WHERE id = $id";

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../../main/admin/meeting.php';
        </script>";
    }

?>