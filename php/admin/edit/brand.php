<?php

    session_start();

    include '../../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../../class/brand.php';
    $brand = new brand(
        $brand = $_POST['brand'],
        $_POST['id']
    );

    $sql = $brand->edit;    

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
            echo"<script>
            window.alert('Hecho!');
            window.location = '../../../main/admin/brand.php';
            </script>";
    }

?>