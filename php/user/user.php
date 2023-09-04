<?php
    session_start();
    include '../../php/conexion.php';
    date_default_timezone_set("America/Bogota");
    include_once '../class/user.php';

    $user = new user(
        $_POST['name'],
        $_POST['doc'],
        $_POST['t_doc'],
        $_POST['mail'],
        md5($_POST['password']),
        1,
        $_POST['id']
    );
    $sql = $user->edit();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if ($query > 0) {
        echo"<script>
        window.alert('Hecho!, Se finalizara la sesión');
        window.location = '../logout.php';
        </script>";
    }

?>