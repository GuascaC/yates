<?php

    session_start();

    include '../../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../../class/special.php';

    $special = new special(
        $_POST['special'],
        $_POST['id']
    );

    $sql = $special->edit();    

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
            echo"<script>
            window.alert('Hecho!');
            window.location = '../../../main/admin/special.php';
            </script>";
    }

?>