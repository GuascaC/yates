<?php

    include 'conexion.php';
    date_default_timezone_set("America/Bogota");
    include './class/user.php';
    
    $user = new user(
        $_POST['name'],
        $_POST['doc'],
        $_POST['t_doc'],
        $_POST['mail'],
        $padssword = md5($_POST['password']),
        1,
        0
    );

    $passwordC= md5($_POST['password2']);

    if ($passwordC == $password) {

        $sql = "SELECT * FROM users WHERE mail = '$email'";

           //echo $sql;
    
            $query = mysqli_query($cone,$sql);

            if ($query > 0) {
                echo"<script>
                window.alert('Correo ya registrado');
                window.location = '../login.php';
                </script>";
            }else{

                $sql = "SELECT * FROM users WHERE mail = '$email' AND id_status = '2'";

                //echo $sql;
        
                $query = mysqli_query($cone,$sql);

                if ($query > 0) {
                    echo"<script>
                    window.alert('Usuario Desactivado, contactese con un administrador');
                    window.location = '../register.php';
                    </script>";
                }else{

                    $sql = $user->register();

                    //echo $sql;
    
                    $query = mysqli_query($cone,$sql) ;
    
                    if ($query > 0) {
                        echo"<script>
                        window.location = '../login.php';
                        </script>";
                    }else{
                        echo'<script>
                        window.alert("Error en registro");
                        window.location = "../register.php";
                        </script>';
                    }
                }
            }   
    }else{
        echo'<script>
        window.alert("Las contraseñas no coinciden");
        window.location = "../register.php";
        </script>';
    }

?>