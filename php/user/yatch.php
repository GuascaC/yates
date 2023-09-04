<?php

    session_start();

    include '../../php/conexion.php';

    date_default_timezone_set("America/Bogota");
    include_once '../class/user.php';
    include_once '../class/yacht.php';
    include_once '../class/sales.php';

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    
    $user = new user(
        0,
        0,
        0,
        $_SESSION['email'],
        $_SESSION['password'],
        0,
        0
    );

    $sql = "SELECT id FROM users WHERE mail = '$email' AND password = '$password'";

    $query = mysqli_query($cone,$sql) ;

    $result = mysqli_fetch_assoc($query);

    $id = $result['id'];

    $yacht = new yacht(
        $Yid = $_POST['id'],
    );

    $sql = "UPDATE yates SET id_users = ('$id') WHERE id = ('$Yid') ";

    $sale = new sales(

        $date = date('Y-m-d H:i:s'),
        $client = $id,
        $product = $Yid,
        $pay = 1,
    );

    $accesories = 0;
    
    $sql2 = "INSERT INTO sales(id_users, id_yates, id_pay, id_accesory) VALUES ('$client','$Yid','$pay','$accesories')";

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