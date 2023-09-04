<?php

    session_start();

    ini_set('display_errors', 0);

    date_default_timezone_set("America/Bogota");
    include '../../../php/conexion.php';
    include '../../../php/class/user.php';
    include '../../../php/class/meeting.php';
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
  <title>Editar Citas</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../styles/styless.css">
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
    <section class="Catalog">  
    <h4>Citas</h4>
    <div class="card text-start">
        <div class="card-body">
    <?php
        $meeting = new meeting(0,0,0,0,$_POST['id']);
        $sql = $meeting->show2();
        $query= mysqli_query($cone ,$sql);

        if (mysqli_num_rows ($query) > 0)  {
        while ($result = mysqli_fetch_assoc($query)){

      ?>
      <div class="card text-start">
        <div class="card-body">
          <form action="../../../php/admin/edit/meeting.php" method="post">
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
          <div class="col-md-6"><?php
            $idH=$result['id_hour'];
            $sql2 = "SELECT meetings.id_hour, hour.id, hour.hour FROM meetings INNER JOIN hour WHERE meetings.id_hour=('$idH') AND hour.id =('$idH');";
            $query2 = mysqli_query($cone ,$sql2 );
            $result2 = mysqli_fetch_assoc($query2);?></p>
            <select class="form-control" autocomplete="on" required name="hour">
            <option value="<?php echo $result['id_hour']?>"> <?php echo $result2['hour']?></option>
            <?php
            $sql3 = "SELECT * FROM hour";
            $query3 = mysqli_query($cone ,$sql3 );

            if (mysqli_num_rows ($query3) > 0)  {
            while ($result3 = mysqli_fetch_assoc($query3)){
            ?>
              <option value="<?php echo $result3['id']?>"><?php echo $result3['hour']?></option>
              <?php
            }}
        ?>
            </select>
        </div>
        <div class="col-md-6">
        <label>Fecha</label><br>
        <input type="date" placeholder="Fecha" autofocus autocomplete="on" required name="date" value="<?php echo $result['date'] ?>"><br>
        </div>
        <div class="col-md-6"><?php
            $idM=$result['id_mech'];
            $sql4 = "SELECT meetings.id_mech, mech.id, mech.name FROM meetings INNER JOIN mech WHERE meetings.id_mech=('$idM') AND mech.id =('$idM');";
            $query4 = mysqli_query($cone ,$sql4 );
            $result4 = mysqli_fetch_assoc($query4);?></p>
            <select class="form-control" autocomplete="on" required name="mech">
            <option value="<?php echo $result['id_mech']?>"> <?php echo $result4['name']?></option>
            <?php
            $sql5 = "SELECT * FROM mech";
            $query5 = mysqli_query($cone ,$sql5 );

            if (mysqli_num_rows ($query5) > 0)  {
            while ($result5 = mysqli_fetch_assoc($query5)){
            ?>
              <option value="<?php echo $result5['id']?>"><?php echo $result5['name']?></option>
              <?php
            }}
        ?>
            </select>
        </div>
        <div class="col-md-6"><?php
            $idS=$result['id_services'];
            $sql6 = "SELECT meetings.id_services, service.id, service.service FROM meetings INNER JOIN service WHERE meetings.id_services=('$idS') AND service.id =('$idS');";
            $query6 = mysqli_query($cone ,$sql6 );
            $result6 = mysqli_fetch_assoc($query6);?></p>
            <select class="form-control" autocomplete="on" required name="service">
            <option value="<?php echo $result['id_services']?>"> <?php echo $result6['service']?></option>
            <?php
            $sql7 = "SELECT * FROM service";
            $query7 = mysqli_query($cone ,$sql7 );

            if (mysqli_num_rows ($query7) > 0)  {
            while ($result7 = mysqli_fetch_assoc($query7)){
            ?>
              <option value="<?php echo $result7['id']?>"><?php echo $result7['service']?></option>
              <?php
            }}
        ?>
            </select>
        </div>
        <div class="col-md-6"><?php
            $idS=$result['id_location'];
            $sql8 = "SELECT meetings.id_location, location.id, location.name FROM meetings INNER JOIN location WHERE meetings.id_location=('$idS') AND location.id =('$idS');";
            $query8 = mysqli_query($cone ,$sql8 );
            $result8 = mysqli_fetch_assoc($query8);?></p>
            <select class="form-control" autocomplete="on" required name="location">
            <option value="<?php echo $result['id_location']?>"> <?php echo $result8['name']?></option>
            <?php
            $sql9 = "SELECT * FROM location";
            $query9 = mysqli_query($cone ,$sql9 );

            if (mysqli_num_rows ($query9) > 0)  {
            while ($result9 = mysqli_fetch_assoc($query9)){
            ?>
              <option value="<?php echo $result9['id']?>"><?php echo $result9['name']?></option>
              <?php
            }}
        ?>
            </select>
        </div>
            <a href="../meeting.php" class="btn btn-light text-dark">Cancelar</a>
           <input type="submit" button class="btn btn-primary text-light" value="enviar">
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
