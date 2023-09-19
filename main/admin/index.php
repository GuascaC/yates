<?php

    session_start();

    ini_set('display_errors', 0);

    date_default_timezone_set("America/Bogota");
    include '../../php/conexion.php';
    include '../../php/class/user.php';
    include '../../php/class/yacht.php';
    include '../../php/class/accesories.php';
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
  <title>Catálogo</title>
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
        <a href="./brand.php"><button class="btn btn-secondary">Marcas</button></a>
        <a href="./001.php"><button class="btn btn-secondary">Gestión</button></a>
        <a href="./locations.php"><button class="btn btn-secondary">Ubicaciones</button></a>
        <a href="./mech.php"><button class="btn btn-secondary">Mecánicos</button></a>
        <a href="./meeting.php"><button class="btn btn-secondary">Citas</button></a>
        <a href="./sales.php"><button class="btn btn-secondary">Ventas</button></a>
        <a href="./service.php"><button class="btn btn-secondary">Servicios</button></a> 
        <a href="./special.php"><button class="btn btn-secondary">Especialidades</button></a>
    <section class="Catalog">
      <h3>Catálogo</h3>
      <h4>Yates</h4>
      <div class="card text-start">
        <div class="card-body">

      <?php

        $yatch = new yacht(0,0,0,0,0,0,0,0,0);
        $sql = $yatch->show();
        $query= mysqli_query($cone ,$sql );

        if (mysqli_num_rows ($query) > 0)  {
        while ($result = mysqli_fetch_assoc($query)){

      ?>
      <form action="./yatch.php" method="post">
      <div class="card text-start">
        <div class="card-body">
          <input type="hidden" name="model" value="<?php echo $result['model'] ?>">
          <h4 class="card-title"><?php echo $result['model'] ?></h4>
          <img class="card-img-top" src="<?php echo $result['img'] ?>" alt="">
          <p class="card-text"><?php echo "Precio: ".$result['price'] ?></p>
          <p class="card-text"><?php echo $result['info'] ?></p>
          <p class="card-text"><?php
            $idB=$result['id_brand'];
            $sql2 = "SELECT yates.id_brand, brands.id, brands.brand FROM yates INNER JOIN brands WHERE yates.id_brand=('$idB') AND brands.id =('$idB');";
            $query2 = mysqli_query($cone ,$sql2 );
            $result2 = mysqli_fetch_assoc($query2);
            echo "Marca: ".$result2['brand'] ?></p>
          <input type="submit" button class="btn btn-primary text-light" value="Editar">
          </form>
          <form action="../../php/admin/delete/yatch.php" method="post">
          <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
          <input type="submit" button class="btn btn-danger text-light" value="ELIMINAR">
          </form>
        </div>
      </div>
      <br>
      <?php

    }}
  ?>

<h4>Accesorios</h4>

      <?php

        $accesory = new accesories(0,0,0,0,0,0,0);
        $sql = $accesory->show2();
        $query= mysqli_query($cone ,$sql );

        if (mysqli_num_rows ($query) > 0)  {
        while ($result = mysqli_fetch_assoc($query)){

      ?>
      <form action="./accesory.php" method="post">
      <div class="card text-start">
        <div class="card-body">
        <input type="hidden" name="name" value="<?php echo $result['name'] ?>">
          <h4 class="card-title"><?php echo $result['name'] ?></h4>
          <img class="card-img-top" src="<?php echo $result['img'] ?>" alt="">
          <p class="card-text"><?php echo $result['price'] ?></p>
          <p class="card-text"><?php echo $result['info'] ?></p>
          <input type="submit" button class="btn btn-primary text-light" value="Editar">
          </form>
          <form action="../../php/admin/delete/accesory.php" method="post">
          <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
          <input type="submit" button class="btn btn-danger text-light" value="ELIMINAR">
          </form>
        </div>
      </div>
      <br>
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
