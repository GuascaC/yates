<?php

    session_start();

    ini_set('display_errors', 0);

    date_default_timezone_set("America/Bogota");
    include '../../php/conexion.php';
    include '../../php/class/user.php';
    include '../../php/class/meeting.php';
    include '../../php/class/location.php';
    include '../../php/class/hour.php';
    include '../../php/class/service.php';
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
    <a href="./index.php"><button class="btn btn-secondary">Catálogo</button></a>
    <section class="Catalog">
    <h4>Citas</h4>
    <div class="card text-start">
        <div class="card-body">
    <?php
        $meeting = new meeting(0,0,0,0,$id);
        $sql = $meeting->show3();
        $query= mysqli_query($cone ,$sql);

        if (mysqli_num_rows ($query) > 0)  {
        while ($result = mysqli_fetch_assoc($query)){

        $idH=$result['id_hour'];
        $sql2 = "SELECT meetings.id_users, hour.id, hour.hour FROM hour INNER JOIN meetings WHERE meetings.id_hour=('$idH') AND hour.id =('$idH');";
        $query2 = mysqli_query($cone ,$sql2);
        $result2 = mysqli_fetch_assoc($query2);
        $idL=$result['id_location'];
        $sql3 = "SELECT meetings.id_users, location.id, location.name FROM location INNER JOIN meetings WHERE meetings.id_location=('$idL') AND location.id =('$idL');";
        $query3 = mysqli_query($cone ,$sql3);
        $result3 = mysqli_fetch_assoc($query3);
        $idSe=$result['id_services'];
        $sql4 = "SELECT meetings.id_users, service.id, service.service FROM service INNER JOIN meetings WHERE meetings.id_services=('$idSe') AND service.id =('$idSe');";
        $query4 = mysqli_query($cone ,$sql4 );
        $result4 = mysqli_fetch_assoc($query4);

      ?>
      <div class="card text-start">
        <div class="card-body">
          <h4 class="card-title"><?php echo $result['date'] ?></h4>
          <p class="card-text"><?php
            echo $result2['hour'];
          ?></p>
          <label>Fecha</label><br>
          <p><?php echo $result['date'] ?></p>
          <p class="card-text"><?php
            echo $result3['name'];
          ?></p>
          <p class="card-text"><?php
            echo $result4['service'];
          ?></p>
        </div>
      </div>
        </br>
      <?php

      }}else{
        echo '<p class="">No tienes citas registradas</p>';
      }
  ?>

      <form action="../../php/user/meeting.php" method="post" class="formInicio">  
      <h3>Añadir cita </h3>    
        <label></i>Sede</label><br>
        <select class="form-control" autocomplete="on" required name="location">
            <option value="">Seleccione una opción</option>
            <?php

            $location = new location(0,0,0,0);
            $sql = $location->show();
            $query = mysqli_query($cone ,$sql );

            if (mysqli_num_rows ($query) > 0)  {
            while ($result = mysqli_fetch_assoc($query)){
            ?>
              <option value="<?php echo $result['id']?>"><?php echo $result['name']?></option>
              <?php
            }}
        ?>
            </select>
            <label></i>Hora</label><br>
        <select class="form-control" autocomplete="on" required name="hour">
            <option value="">Seleccione una opción</option>
            <?php

            $hour = new hour();
            $sql = $hour->show();
            $query = mysqli_query($cone ,$sql );

            if (mysqli_num_rows ($query) > 0)  {
            while ($result = mysqli_fetch_assoc($query)){
            ?>
              <option value="<?php echo $result['id']?>"><?php echo $result['hour']?></option>
              <?php
            }}
        ?>
            </select>
        <label>Fecha</label><br>
        <input type="date" placeholder="Fecha" autofocus autocomplete="on" required name="date"><br>
        <label>Servicio</label><br>
            <select class="form-control" autocomplete="on" required name="service">
            <option value="">Seleccione una opción</option>
            <?php

            $service = new service(0,0);
            $sql = $service->show();
            $query = mysqli_query($cone ,$sql );

            if (mysqli_num_rows ($query) > 0)  {
            while ($result = mysqli_fetch_assoc($query)){
            ?>
              <option value="<?php echo $result['id']?>"><?php echo $result['service']?></option>
              <?php
            }}
        ?>
            </select>
        </div>
        <button type="submit" class="button1">Enviar</button>
      </form>      

    </section>
  </main>
  <br><br>
  <!--footer-->
  <footer>
  </footer>
  <script src="https://kit.fontawesome.com/0bf8ac12b9.js" crossorigin="anonymous"></script> <!--Link de conexión íconos-->
</body>
</html>
