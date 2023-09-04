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
        0
    );

    $owner = $_SESSION['id'];

    $sql = "INSERT INTO meetings(id_services, id_hour, date, id_location, id_mech, id_users) VALUES ('$service','$hour','$date','$location','1','$owner')";

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../main/user/meeting.php';
        </script>";
    }

?>