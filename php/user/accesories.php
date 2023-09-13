<?php

    session_start();

    include '../../php/conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../class/accesories.php';

    $id = $_SESSION['id'];  

    $accesories = new accesories(
        $Aid = $_POST['id'],
    );

    $sql = "UPDATE accesories SET quantity = quantity - 1 WHERE id = ('$Aid') ";

    $sale = new sales(

        $date = date('Y-m-d H:i:s'),
        $client = $id,
        $product = $Aid,
        $pay = 1,
        );

    $yatch = 0;
    $month = date('m');

    $sql2 = "INSERT INTO sales(id_users, id_yates, id_pay, id_accesory, month) VALUES ('$client','$yatch','$pay','$Aid','$month')";

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    $query2 = mysqli_query($cone,$sql2) ;
    
    if ($query2 > 0) {
    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!');
        window.location = '../../main/user/index.php';
        </script>";
    }else{
    echo"<script>
    window.alert('Se presento un error');
    window.location = '../../main/user/index.php';
    </script>";
    }}

?>





