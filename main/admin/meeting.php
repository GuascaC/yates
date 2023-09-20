<?php

    session_start();

    ini_set('display_errors', 0);

    date_default_timezone_set("America/Bogota");
    include '../../php/conexion.php';
    include '../../php/class/user.php';
    include '../../php/class/meeting.php';
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
  <title>Agendar reunión</title>
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
        <a href="./index.php"><button class="btn btn-secondary">Catálogo(Productos)</button></a>
        <a href="./locations.php"><button class="btn btn-secondary">Ubicaciones</button></a>
        <a href="./mech.php"><button class="btn btn-secondary">Mecánicos</button></a>
        <a href="./001.php"><button class="btn btn-secondary">Gestión</button></a>
        <a href="./sales.php"><button class="btn btn-secondary">Ventas</button></a>
        <a href="./service.php"><button class="btn btn-secondary">Servicios</button></a> 
        <a href="./special.php"><button class="btn btn-secondary">Especialidades</button></a>
    <section class="Catalog">
    <h4>Citas</h4>
    <div class="card text-start">
        <div class="card-body">
    <?php
        $meeting = new meeting(0,0,0,0,0);
        $sql = $meeting->show();
        $query= mysqli_query($cone ,$sql);

        if (mysqli_num_rows ($query) > 0)  {
        while ($result = mysqli_fetch_assoc($query)){

      ?>
      <div class="card text-start">
        <div class="card-body">
        <form action="./edit/meeting.php" method="post">
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
          <?php
            $idS=$result['id_users'];
            $sql2 = "SELECT meetings.id_users, users.id, users.name, users.mail FROM users INNER JOIN meetings WHERE meetings.id_users=('$idS') AND users.id =('$idS');";
            $query2 = mysqli_query($cone ,$sql2 );
            $result2 = mysqli_fetch_assoc($query2);
            echo "Cita de: ".$result2['name'] ?></h4>
          <p class="card-text">
          <?php
            echo $result2['mail'] ?></p>
          <p class="card-text">          
            <?php
            $idH=$result['id_hour'];
            $sql3 = "SELECT meetings.id_users, hour.id, hour.hour FROM hour INNER JOIN meetings WHERE meetings.id_hour=('$idH') AND hour.id =('$idH');";
            $query3 = mysqli_query($cone ,$sql3 );
            $result3 = mysqli_fetch_assoc($query3);
            echo $result3['hour'] ?></p>
          <label>Fecha</label><br>
          <p><?php echo $result['date'] ?></p>
          <p class="card-text"><?php 
            $idL=$result['id_location'];
            $sql4 = "SELECT meetings.id_users, location.id, location.name FROM location INNER JOIN meetings WHERE meetings.id_location=('$idL') AND location.id =('$idL');";
            $query4 = mysqli_query($cone ,$sql4 );
            $result4 = mysqli_fetch_assoc($query4);
            echo $result4['name'] ?></p>
          <p class="card-text"><?php 
            $idSe=$result['id_services'];
            $sql5 = "SELECT meetings.id_users, service.id, service.service FROM service INNER JOIN meetings WHERE meetings.id_services=('$idSe') AND service.id =('$idSe');";
            $query5 = mysqli_query($cone ,$sql5 );
            $result5 = mysqli_fetch_assoc($query5);
            echo $result5['service'] ?></p>
          <p class="card-text"><?php 
            $idM=$result['id_mech'];
            $sql6 = "SELECT meetings.id_mech, mech.id, mech.name FROM meetings INNER JOIN mech WHERE meetings.id_mech=('$idM') AND mech.id =('$idM');";
            $query6 = mysqli_query($cone ,$sql6 );
            $result6 = mysqli_fetch_assoc($query6);
            echo $result6['name'] ?></p>
            <input type="submit" button class="btn btn-primary text-light" value="Editar">
            </form>
          <form action="../../php/admin/delete/meeting.php" method="post">
          <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
          <input type="submit" button class="btn btn-danger text-light" value="ELIMINAR">
          </form>
        </div>
      </div>
        </br>
      <?php
      }}else{
        echo '<p class="">No hay citas registradas</p>';
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
