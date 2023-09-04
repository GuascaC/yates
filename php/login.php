<?php

    session_start();

    include './class/user.php';

    date_default_timezone_set("America/Bogota");
    include 'conexion.php';

    $user = new user(
        0,
        0,
        0,
        $email = $_POST['email'],
        $password = md5($_POST['password']),
        0,
        0,
    );

    $sql = $user->login2();

    //echo $sql;

    $query = mysqli_query($cone,$sql);

    if (mysqli_num_rows ($query) > 0) {
        echo"<script>
        window.alert('Usuario Desactivado, contactese con un administrador');
        </script>";
        echo"<scrip>
        window.location = '../login.php';
        </script>";
    }else{
        $sql = $user->login();

        //echo $sql;
    
        $query = mysqli_query($cone,$sql);
    
        $result = mysqli_fetch_assoc($query);
    if (mysqli_num_rows ($query) > 0 and $result["id_roles"] == 2)  {
        echo"<script>
        window.location = '../main/admin/001.php';
        </script>";
    }elseif(mysqli_num_rows ($query) > 0 and $result["id_roles"] == 1){
        echo"<script>
        window.location = '../main/user/index.php';
        </script>";
    }else{
        echo"<script>
        window.alert('Error en inicio de sesión');
        window.location = '../login.php';
        </script>";
    }

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['rol'] = $result["id_roles"];
    $_SESSION['id'] = $result["id"];
}
?>
