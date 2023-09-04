<?php

    session_start();
    ini_set('display_errors', 0);
    date_default_timezone_set("America/Bogota");
    include '../../php/conexion.php';
    include '../../php/class/user.php';
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

    $sql = $user->authenticateU();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    $result = mysqli_fetch_assoc($query);

    $id = $result['id'];

    if (mysqli_num_rows ($query) > 0)  {
    }else{
      /*echo"<script>
      window.location = '../../main/admin/001.php';
      </script>";*/
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuario</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/styless.css">
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
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $result['name'] ?>
          </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="../../main/user/user.php">Mi Info</a></li>
          <li><a class="dropdown-item" href="../../php/logout.php">Cerrar sesión</a></li>
        </ul>
        </div>
      <div class="w-50">
        <h1>AdrenaMarine</h1>
      </div>
  </header>
  <main>
    <section class="Catalog">
      <h3>Editar tu información</h3>
      <div class="card text-start">
        <div class="card-body">
      <?php

      $sql2 = "SELECT * FROM documents";
      $query2 = mysqli_query($cone ,$sql2 );
      $result2 = mysqli_fetch_assoc($query2);

        if (mysqli_num_rows ($query) > 0)  {{

      ?>
      <form action="../../php/user/user.php" method="post">
      <div class="card text-start">
        <div class="card-body">
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
          <h4 class="card-title"><?php echo "Nombre: "?></h4>
          <input class="card-text" type="text" placeholder="Nombre" autofocus autocomplete="on" name="name" value="<?php echo $result['name'] ?>"> 
          <p class="card-text"><?php echo "Correo electrónico: "?></p>
          <input class="card-text" type="text" placeholder="Correo" autofocus autocomplete="on" name="mail" value="<?php echo $result['mail'] ?>"> 
          <p class="card-text">Contraseña:</p>
          <input type="hidden" name="password" value="<?php echo $result['password'] ?>">
          <input class="card-text" type="text" placeholder="Contraseña" autofocus autocomplete="on" name="password" value=""> 
          <p class="card-text"><?php echo "Documento: "?></p>
          <input class="card-text" type="text" placeholder="Documento" autofocus autocomplete="on" name="doc" value="<?php echo $result['document'] ?>"> 
          <p class="card-text"><?php echo "Tipo de documento: "?></p>
          <select class="form-control" autocomplete="on" required name="t_doc">
          <option value="<?php echo $result['id_documents']?>"> <?php echo $result2['type']?></option><?php 

            if (mysqli_num_rows ($query2) > 0)  {
                while ($result2 = mysqli_fetch_assoc($query2)){
                ?>
                <option value="<?php echo $result2['id']?>"><?php echo $result2['type']?></option>
                <?php
            }}
            ?>
            </select>
          <a href="./user.php" class="btn btn-light text-dark">Cancelar</a>
          <input type="submit" button class="btn btn-primary text-light" value="Enviar">
          </form>
        </div>
      </div>
      <?php

    }}
  ?>
    </section>
  </main>
  <br><br>
  <!--footer-->
  <footer>
  </footer>
  <script src="https://kit.fontawesome.com/0bf8ac12b9.js" crossorigin="anonymous"></script> <!--Linki de conexión íconos-->
</body>
</html>
