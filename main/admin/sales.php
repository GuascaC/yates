<?php

    session_start();

    ini_set('display_errors', 0);

    date_default_timezone_set("America/Bogota");
    include '../../php/conexion.php';
    include '../../php/class/user.php';
    include '../../php/class/sales.php';
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

    $result = mysqli_fetch_assoc($query);

    if (mysqli_num_rows ($query) > 0)  {
    }else{
      /*echo"<script>
      window.location = '../../main/user/index.php';
      </script>";*/
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ventas</title>
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
      <div class="w-50">
        <h1>AdrenaMarine</h1>
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
</header>
  <main>
        <a href="./brand.php"><button class="btn btn-secondary">Marcas</button></a>
        <a href="./index.php"><button class="btn btn-secondary">Catálogo(Productos)</button></a>
        <a href="./locations.php"><button class="btn btn-secondary">Ubicaciones</button></a>
        <a href="./mech.php"><button class="btn btn-secondary">Mecánicos</button></a>
        <a href="./meeting.php"><button class="btn btn-secondary">Citas</button></a>
        <a href="./001.php"><button class="btn btn-secondary">Gestión</button></a>
        <a href="./service.php"><button class="btn btn-secondary">Servicios</button></a> 
        <a href="./special.php"><button class="btn btn-secondary">Especialidades</button></a>
    <section class="Catalog">  
    <h4>Ventas</h4>
    <div class="card text-start">
        <div class="card-body">
    <?php
            $sales = new sales();
            $sql = $sales->show();
        $query= mysqli_query($cone ,$sql);

        if (mysqli_num_rows ($query) > 0)  {
        while ($result = mysqli_fetch_assoc($query)){

      ?>
      <div class="card text-start">
        <div class="card-body">
          <h4 class="card-title">
          <?php
            $idS=$result['id_users'];
            $sql2 = "SELECT sales.id_users, users.id, users.name, users.mail FROM users INNER JOIN sales WHERE sales.id_users=('$idS') AND users.id =('$idS');";
            $query2 = mysqli_query($cone ,$sql2 );
            $result2 = mysqli_fetch_assoc($query2);
            echo "Compra de: ".$result2['name'] ?></h4>
          <p class="card-text"><?php echo $result2['mail'] ?></p>
          <p class="card-text"><?php echo $result['date'] ?></p>
          <p class="card-text"><?php 
            $idY=$result['id_yates'];
            $sql3 = "SELECT * FROM yates INNER JOIN sales WHERE sales.id_yates=('$idY') AND yates.id =('$idY');";
            $query3 = mysqli_query($cone ,$sql3 );
            $result3 = mysqli_fetch_assoc($query3);
            echo $result3['model'] ?></p>
          <p class="card-text"><?php 
            $idB=$result3['id_brand'];
            $sql4 = "SELECT yates.id_brand, brands.id, brands.brand FROM brands INNER JOIN yates WHERE yates.id_brand=('$idB') AND brands.id =('$idB');";
            $query4 = mysqli_query($cone ,$sql4 );
            $result4 = mysqli_fetch_assoc($query4);
            echo $result4['brand'] ?></p>
        </div>
      </div>
        </br>
      <?php
      }}else{
        echo '<p class="">No hay ventas registradas</p>';
      }
  ?>
  <?php
        $sales = new sales();
        $sql = $sales->show2();
        $query= mysqli_query($cone ,$sql);

        if (mysqli_num_rows ($query) > 0)  {
        while ($result = mysqli_fetch_assoc($query)){

      ?>
      <div class="card text-start">
        <div class="card-body">
          <h4 class="card-title">
          <?php
            $idS=$result['id_users'];
            $sql2 = "SELECT sales.id_users, users.id, users.name, users.mail FROM users INNER JOIN sales WHERE sales.id_users=('$idS') AND users.id =('$idS');";
            $query2 = mysqli_query($cone ,$sql2 );
            $result2 = mysqli_fetch_assoc($query2);
            echo "Compra de: ".$result2['name'] ?></h4>
          <p class="card-text"><?php echo $result2['mail'] ?></p>
          <p class="card-text"><?php echo $result['date'] ?></p>
          <p class="card-text"><?php 
            $idA=$result['id_accesory'];
            $sql3 = "SELECT sales.id_users, accesories.id, accesories.name FROM accesories INNER JOIN sales WHERE sales.id_accesory=('$idA') AND accesories.id =('$idA');";
            $query3 = mysqli_query($cone ,$sql3 );
            $result3 = mysqli_fetch_assoc($query3);
            echo $result3['name'] ?></p>
        </div>
      </div>
        </br>
      <?php
      }}else{
        echo '<p class="">No hay ventas registradas</p>';
      }
  ?>

    </section>
  </main>
  <br><br>
  <!--footer-->
  <footer>
  </footer>
  <script src="https://kit.fontawesome.com/0bf8ac12b9.js" crossorigin="anonymous"></script> <!--Link de conexión íconos-->
</body>
</html>
