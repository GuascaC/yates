<?php

    session_start();

    include '../../conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../../class/yacht.php';

    $yacht = new yacht(
        $_POST['modelO'],
        $model = $_POST['model'],
        0,
        $price = $_POST['price'],
        $info = $_POST['info'],
        0,
        $brand = $_POST['brand'],
        $_POST['img'],
        $_SESSION['id']
    );


    $sql = $yacht->edit();    

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
            echo"<script>
            window.alert('Hecho!');
            window.location = '../../../main/admin/index.php';
            </script>";
    }

?>