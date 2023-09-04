<?php
    session_start();
    date_default_timezone_set("America/Bogota");
    include_once '../class/yacht.php';
    include '../conexion.php';

    $yacht = new yacht(
        0,
        $model = $_POST['model'],
        $owner = $id,
        $price = $_POST['price'],
        $info = $_POST['info'],
        $serie = $_POST['serie'],
        $brand = $_POST['brand'],
        $_POST['img'],
        $_SESSION['id']
    );

    $sql = $yacht->add();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../main/admin/index.php';
        </script>";
    }

?>