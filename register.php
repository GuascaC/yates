<?php

    session_start();

    ini_set('display_errors', 0);

    date_default_timezone_set("America/Bogota");
    include './php/conexion.php';
    include './php/class/user.php';
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

    $sql = $user->authenticateA();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    if (mysqli_num_rows ($query) > 0)  {
      echo"<script>
      window.location = './main/admin/001.php';
      </script>";
    }else{
      $sql = $user->login();

      //echo $sql;
  
      $query = mysqli_query($cone,$sql);

      if (mysqli_num_rows ($query) > 0)  {
        echo"<script>
        window.location = './main/user/index.php';
        </script>";
      }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./styles/styless.css">
</head>
<body>
  <header class="d-flex w-100">
      <!--encabezado redes sociales-->
      <div class="text-white w-25 icons">
        <a onclick=""><i class="fa-brands fa-whatsapp"></i></a>
        <a onclick=""><i class="fa-brands fa-instagram"></i></a>
        <a onclick=""><i class="fa-brands fa-facebook-f"></i></a>
        <a onclick=""><i class="fa-brands fa-twitter"></i></a>
      </div>
      <div class="w-50">
        <h1>AdrenaMarine</h1>
      </div>
  </header>
  <main>
    <!--formulario inicio sesión-->
    <section class="card container text-center">
      <h3>Regístrate</h3>
      <br><br>
      <form id="form" action="./php/register.php" method="post" class="formInicio card-body w-70 m-auto d-flex">
        <div class="col-md-6">
          <div class="text-left">
            <label><i class="fa-solid fa-user"></i>Correo electrónico</label><br>
              <input class="" type="email" placeholder="Correo electrónico" autofocus autocomplete="on" required name="mail">
            </div>
        </div>
        <div class="col-md-6">
          <div class="text-left">
            <label><i class="fa-solid fa-user"></i>Nombre</label><br>
            <input class="" type="text" placeholder="Nombre" autocomplete="on" required name="name">
          </div>
        </div>
        <div class="col-md-6">
          <div class="text-left">
            <label><i class="fa-solid fa-user"></i>Tipo de Documento</label><br>
              <select class="form-control" placeholder="Tipo de documento"autocomplete="on" required name="t_doc">
                <option value="">Seleccione una opción</option>
                <option value="1">Tarjeta de Identidad</option>
                <option value="2">Cédula de Ciudadanía</option>
                <option value="3">Tarjeta de Extranjería</option>
                <option value="4">Pasaporte</option>
                <option value="5">Permiso especial de permanencia</option>
              </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="text-left">
            <label><i class="fa-solid fa-user"></i>Documento</label><br>
            <input type="number" placeholder="Documento" autocomplete="on" required name="doc">
          </div>
        </div>
        <div class="col-md-6">
          <div class="text-left">
              <label><i class="fa-solid fa-lock"></i>Contraseña</label><br>
                <input maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="iPass" type="password" placeholder="Contraseña" name="password" required>
                <img onclick="PassV()" src="./img/visible.png">
          </div>
        </div>      
        <div class="col-md-6">
          <div class="text-left">
            <label><i class="fa-solid fa-lock"></i>Confirmar contraseña</label><br>
              <input maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="iPass2" type="password" placeholder="Confirmar contraseña" name="password2" required>
              <img onclick="PassV02()" src="./img/visible.png">
          </div>
        </div>     
        <div>
        <a class="link" href="./login.php">Inicia sesión</a>
        </div>
        <button type="submit" class="button1">Registrar</button>
      </form>
    </section>
  </main>
  <br><br>
  <!--footer-->
  <footer>
  </footer>
  <script src="https://kit.fontawesome.com/0bf8ac12b9.js" crossorigin="anonymous"></script> <!--Linki de conexión íconos-->
  <script src="./scripts/main.js"></script>
</body>
</html>