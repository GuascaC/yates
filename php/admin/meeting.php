<?php
    session_start();
    include '../../php/conexion.php';
    date_default_timezone_set("America/Bogota");
    include_once '../class/meeting.php';

    $meeting = new meeting(
        $service = $_POST['service'],
        $hour= $_POST['hour'],
        $date = $_POST['date'],
        $location = $_POST['location'],
        $_SESSION['id']
    );

    $sql = $meeting->add();
    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../main/admin/meeting.php';
        </script>";
    }

?>