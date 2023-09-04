<?php

    session_start();

    include '../../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../../class/accesories.php';

    $accesories = new accesories(

        $_POST['nameO'],
        $_POST['name'],
        $_POST['quantity'],
        $_POST['price'],
        $_POST['info'],
        $_POST['img'],
        $_POST['id']

    );

    $sql = $accesories->edit();  

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
            echo"<script>
            window.alert('Hecho!');
            window.location = '../../../main/admin/index.php';
            </script>";
    }

?>