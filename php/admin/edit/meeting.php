<?php

    session_start();

    include '../../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../../class/meeting.php';

    $meeting = new meeting(
        $_POST['service'],
        $_POST['hour'],
        $_POST['date'],
        $_POST['location'],
        $_POST['id']
    );

    $sql = $meeting->edit();    

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
            echo"<script>
            window.alert('Hecho!');
            window.location = '../../../main/admin/meeting.php';
            </script>";
    }

?>