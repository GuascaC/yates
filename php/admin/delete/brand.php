<?php

    session_start();

    include '../../../php/conexion.php';
    include '../../../php/class/brand.php';

    date_default_timezone_set("America/Bogota");

    $brand = new brand(
        $_POST['name'],
        $_POST['id']
    );

    $sql = $brand->delete();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../../main/admin/brand.php';
        </script>";
    }

?>