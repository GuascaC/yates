<?php

    session_start();

    ini_set('display_errors', 0);

    date_default_timezone_set("America/Bogota");
    include '../../../php/conexion.php';
    include '../../../php/class/user.php';
    include '../../../php/class/mech.php';
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
  <title>Editar Mecánicos</title>
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
    <h4>Mecánicos</h4>
    <div class="card text-start">
        <div class="card-body">
    <?php
        $mech = new mech(0,0,0,$_POST['id']);
        $sql = $mech->show2();
        $query= mysqli_query($cone ,$sql);

        if (mysqli_num_rows ($query) > 0)  {
        while ($result = mysqli_fetch_assoc($query)){

    ?>
        <form action="../../../php/admin/edit/mech.php" method="post">
        <div class="card text-start">
        <div class="card-body">
            <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
            <h4 class="card-title"><?php echo "Nombre: ".$result['name'] ?></h4>
            <input class="card-text" type="text" placeholder="Nombre" autofocus autocomplete="on" name="name" value="<?php echo $result['name'] ?>"> 
            <p class="card-title">Especialidad: </p>
            <div class="col-md-6"><?php
            $idS=$result['id_special'];
            $sql2 = "SELECT mech.id_special, special.id, special.special FROM mech INNER JOIN special WHERE mech.id_special=('$idS') AND special.id =('$idS');";
            $query2 = mysqli_query($cone ,$sql2 );
            $result2 = mysqli_fetch_assoc($query2);?></p>
            <select class="form-control" autocomplete="on" required name="special">
            <option value="<?php echo $result['id_special']?>"> <?php echo $result2['special']?></option>
            <?php
            $sql3 = "SELECT * FROM special";
            $query3 = mysqli_query($cone ,$sql3 );

            if (mysqli_num_rows ($query3) > 0)  {
                while ($result3 = mysqli_fetch_assoc($query3)){
                ?>
                <option value="<?php echo $result3['id']?>"><?php echo $result3['special']?></option>
                <?php
            }}
            ?>
            </select>
            </div>
            <p class="card-title">ubicación: </p>
            <div class="col-md-6"><?php
            $idB=$result['id_location'];
            $sql4 = "SELECT mech.id_location, location.id, location.name FROM mech INNER JOIN location WHERE mech.id_location=('$idB') AND location.id =('$idB');";
            $query4 = mysqli_query($cone ,$sql4 );
            $result4 = mysqli_fetch_assoc($query4);?></p>
            <select class="form-control" autocomplete="on" required name="location">
            <option value="<?php echo $result['id_location']?>"> <?php echo $result4['name']?></option>
            <?php
            $sql5 = "SELECT * FROM location";
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
            <a href="../mech.php" class="btn btn-light text-dark">Cancelar</a>
            <input type="submit" button class="btn btn-primary text-light" value="Enviar">
        </form>
        </div>
    </div>
        </br>
    <?php
    }}else{
        echo '<p class="">No hay marcas registradas</p>';
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
