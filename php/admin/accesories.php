<?php

    include '../conexion.php';

    date_default_timezone_set("America/Bogota");
    include '../class/accesories.php';

    $accesories = new accesories(

        $nameO,
        $_POST['name'],
        $_POST['quantity'],
        $_POST['price'],
        $_POST['info'],
        $_POST['img'],
        $id

    );

    $sql = $accesories->add();

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../main/admin/index.php';
        </script>";
    }

?>