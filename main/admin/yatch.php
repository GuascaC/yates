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
        0
    );   

    $sql = $user->authenticateA();

    //echo $sql;

    $query = mysqli_query($cone,$sql) ;

    $result = mysqli_fetch_assoc($query);

    $id = $result['id'];

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
  <title>Editar Yate</title>
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
    <section class="Catalog">
      <h3>Editar Yate</h3>
      <div class="card text-start">
        <div class="card-body">
<?php
        $yacth = new yacht(0,$_POST['model'],0,0,0,0,0,0,0);
        $sql = $yacth->show2();
        $query= mysqli_query($cone ,$sql );

        if (mysqli_num_rows ($query) > 0)  {
        while ($result = mysqli_fetch_assoc($query)){

      ?>
      <form action="../../php/admin/edit/yatch.php" method="post">
      <div class="card text-start">
        <div class="card-body">
          <input type="hidden" name="modelO" value="<?php echo $result['model'] ?>">
          <p class="card-title">Modelo: </p>
          <input class="card-text" name="model" type=text value="<?php echo $result['model'] ?>">
          <p class="card-title">Imagen: </p>
          <img class="card-img-top" src="<?php echo $result['img'] ?>" alt="">
          <p>Proporcione un link a la imagen</p>
          <input type="text" name="img" value="<?php echo $result['img'] ?>" placeholder="Link Imagen">
          <p class="card-title">Precio: </p>
          <input class="card-text" type="number" placeholder="Precio" autofocus autocomplete="on" name="price" value="<?php echo $result['price'] ?>"> 
          <p class="card-title">Información: </p>
          <input class="card-text" type="text" placeholder="Información" autofocus autocomplete="on" name="info" value="<?php echo $result['info'] ?>"> 
          <p class="card-title">Marca: </p>
          <div class="col-md-6"><?php
            $idB=$result['id_brand'];
            $sql2 = "SELECT yates.id_brand, brands.id, brands.brand FROM yates INNER JOIN brands WHERE yates.id_brand=('$idB') AND brands.id =('$idB');";
            $query2 = mysqli_query($cone ,$sql2 );
            $result2 = mysqli_fetch_assoc($query2);?></p>
            <select class="form-control" autocomplete="on" required name="brand">
            <option value="<?php echo $result['id_brand']?>"> <?php echo $result2['brand']?></option>
            <?php
            $sql3 = "SELECT * FROM brands";
            $query3 = mysqli_query($cone ,$sql3 );

            if (mysqli_num_rows ($query3) > 0)  {
            while ($result3 = mysqli_fetch_assoc($query3)){
            ?>
              <option value="<?php echo $result3['id']?>"><?php echo $result3['brand']?></option>
              <?php
            }}
        ?>
            </select>
        </div>
          <a href="./index.php" class="btn btn-light text-dark">Cancelar</a>
          <input type="submit" button class="btn btn-primary text-light" value="Enviar">
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
  <script src="https://kit.fontawesome.com/0bf8ac12b9.js" crossorigin="anonymous"></script> <!--Link de conexión íconos-->
</body>
</html>
