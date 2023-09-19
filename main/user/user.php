<?php

    session_start();
    ini_set('display_errors', 0);
    date_default_timezone_set("America/Bogota");
    include '../../php/conexion.php';
    include '../../php/class/user.php';
    include '../../php/class/yacht.php';
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    
    $user = new user(
        0,
        0,
        0,
        $_SESSION['email'],
        $_SESSION['password'],
        0,
        0,
    );   

    $sql = $user->login();

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
      <div class="text-white icons">
        <a onclick=""><i class="fa-brands fa-whatsapp"></i></a>
        <a onclick=""><i class="fa-brands fa-instagram"></i></a>
        <a onclick=""><i class="fa-brands fa-facebook-f"></i></a>
        <a onclick=""><i class="fa-brands fa-twitter"></i></a>
      </div>
      <div class="w-75 me-5">
        <h1>AdrenaMarine</h1>
      </div>
        <div class="dropdown ms-5">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $result['name'] ?>
          </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="../../main/user/user.php">Mi Info</a></li>
          <li><a class="dropdown-item" href="../../php/logout.php">Cerrar sesión</a></li>
        </ul>
        </div>
</header>
  <main>
    <a href="./index.php"><button class="btn btn-outline-danger" id=""><i class="fa-solid fa-arrow-left px-3 justify-content-center"></button></i></a>
    <a href="./yatch.php"><button class="btn btn-secondary">Tus yates</button></a>
    <section class="Catalog">
      <h3>Tu información</h3>
      <div class="card text-start">
        <div class="card-body">
      <?php

      $sql2 = "SELECT * FROM documents";
      $query2 = mysqli_query($cone ,$sql2 );
      $result2 = mysqli_fetch_assoc($query2);

        if (mysqli_num_rows ($query) > 0)  {{

      ?>
      <div class="card text-start">
        <div class="card-body">
        <form action="./edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
          <h4 class="card-title"><?php echo "Nombre: ".$result['name'] ?></h4>
          <p class="card-text"><?php echo "Correo electrónico: ".$result['mail'] ?></p>
          <p class="card-text"><?php echo "Documento: ".$result['document'] ?></p>
          <p class="card-text"><?php 
            $idD=$result['id_documents'];
            $sql3= "SELECT users.id_documents, documents.id, documents.type FROM users INNER JOIN documents WHERE users.id_documents=('$idD') AND documents.id =('$idD');";
            $query3= mysqli_query($cone ,$sql3);
            $result3= mysqli_fetch_assoc($query3);
            echo "Tipo de documento: ".$result3['type'] ?></p>
          <input type="submit" button class="btn btn-primary text-light" value="Editar">
          </form>
          <form action="../../php/user/inactivate.php" method="post">
          <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
          <input type="submit" button class="btn btn-danger text-light" value="DESACTIVAR CUENTA">
          </form>
        </div>
      </div>
      <?php

    }}
  ?>
        </div>
      </div>
    </section>
  </main>
  <br><br>
  <!--footer-->
  <footer>
  </footer>
  <script src="https://kit.fontawesome.com/0bf8ac12b9.js" crossorigin="anonymous"></script> <!--Linki de conexión íconos-->
</body>
</html>
