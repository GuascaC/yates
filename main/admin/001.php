<?php

    session_start();

    ini_set('display_errors', 0);

    date_default_timezone_set("America/Bogota");
    include '../../php/conexion.php';
    include '../../php/class/user.php';
    include '../../php/class/brand.php';
    include '../../php/class/special.php';
    include '../../php/class/location.php';
    include '../../php/class/service.php';
    include '../../php/class/hour.php';
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
    $rol = $_SESSION['rol'];    

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
  <title>Gestión Administrativa</title>
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
    <section class="">
      <h3>Gestión Administrativa</h3>
      <br><br>
        <a href="./brand.php"><button class="btn btn-secondary">Marcas</button></a>
        <a href="./index.php"><button class="btn btn-secondary">Catálogo(Productos)</button></a>
        <a href="./locations.php"><button class="btn btn-secondary">Ubicaciones</button></a>
        <a href="./mech.php"><button class="btn btn-secondary">Mecánicos</button></a>
        <a href="./meeting.php"><button class="btn btn-secondary">Citas</button></a>
        <a href="./sales.php"><button class="btn btn-secondary">Ventas</button></a>
        <a href="./service.php"><button class="btn btn-secondary">Servicios</button></a> 
        <a href="./special.php"><button class="btn btn-secondary">Especialidades</button></a>
      <form action="../../php/admin/yatch.php" method="post" class="formInicio">
      <h4>Añadir Yates</h4>  
      <div class="card text-start">
        <div class="card-body">      
        <label>Modelo</label><br> 
        <input type="text" placeholder="Modelo" autofocus autocomplete="on" required name="model"><br>
        <label>Precio</label><br> 
        <input type="number" placeholder="Precio" autofocus autocomplete="on" required name="price"><br>  
        <label>Información</label><br> 
        <input type="text" placeholder="Información" autofocus autocomplete="on" required name="info"><br> 
        <label>Serie</label><br> 
        <input type="text" placeholder="Serie" autofocus autocomplete="on" required name="serie"><br> 
        <label>Imagen</label><br> 
        <p>Proporcione un link a la imagen</p>
        <input type="text" required name="img"> <br>       
            <label>Marca</label><br>
            <select class="form-control" autocomplete="on" required name="brand"><br>
            <option value="">Seleccione una opción</option>
            <?php
            $brand = new brand(0,0);
            $sql = $brand->show();
            $query = mysqli_query($cone ,$sql );

            if (mysqli_num_rows ($query) > 0)  {
            while ($result = mysqli_fetch_assoc($query)){
            ?>
              <option value="<?php echo $result['id']?>"><?php echo $result['brand']?></option>
              <?php
            }}
        ?>
            </select>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      </div>
    </div>
        </br>
      <form action="../../php/admin/meeting.php" method="post" class="formInicio">  
      <h3>Añadir cita </h3>    
      <div class="card text-start">
        <div class="card-body">   
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
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>   
      </div>
    </div>
        </br>
      <form action="../../php/admin/accesories.php" method="post" class="formInicio">   
      <h4>Añadir Accesorios</h4> 
      <div class="card text-start">
        <div class="card-body">       
        <label>Nombre</label><br>
        <input type="text" placeholder="Modelo" autofocus autocomplete="on" required name="name"><br>  
        <label>Precio</label><br>
        <input type="number" placeholder="Precio" autofocus autocomplete="on" required name="price"><br> 
        <label>Información</label><br>
        <input type="text" placeholder="Información" autofocus autocomplete="on" required name="info"><br>
        <label>Cantidad</label><br>
        <input type="text" placeholder="Cantidad" autofocus autocomplete="on" required name="quantity"><br>
        <label>Imagen</label><br>
        <p>Proporcione un link a la imagen</p>       
        <input type="text" required name="img"> <br>       
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      </div>
    </div>
        </br>

      <form action="../../php/admin/special.php" method="post" class="formInicio">
      <h4>Añadir Especialidad</h4>   
      <div class="card text-start">
        <div class="card-body">     
        <label>Nombre</label><br>
        <input type="text" placeholder="Nombre" autofocus autocomplete="on" required name="special"><br>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      </div>
    </div>
        </br>

      <form action="../../php/admin/service.php" method="post" class="formInicio">
      <h4>Añadir Servicio</h4>  
      <div class="card text-start">
        <div class="card-body">      
        <label>Nombre</label><br>
        <input type="text" placeholder="Nombre" autofocus autocomplete="on" required name="service"><br>  
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      </div>
    </div>
        </br>

      <form action="../../php/admin/mech.php" method="post" class="formInicio">
      <h4>Añadir Mecánico</h4>   
      <div class="card text-start">
        <div class="card-body">     
        <label>Nombre</label><br>
        <input type="text" placeholder="Nombre" autofocus autocomplete="on" required name="name"><br>  
        <label>Especialidad</label><br>
        <select class="form-control" required name="special">
            <option value="">Seleccione una opción</option>
            <?php

            $special = new special(0,0);
            $sql = $special->show();
            $query = mysqli_query($cone ,$sql );

            if (mysqli_num_rows ($query) > 0)  {
            while ($result = mysqli_fetch_assoc($query)){
            ?>
              <option value="<?php echo $result['id']?>"><?php echo $result['special']?></option>
              <?php
            }}
        ?>
            </select>
        <label>Ubicación</label><br>
        <select class="form-control" required name="location">
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
            <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      </div>
    </div>
        </br>

      <form action="../../php/admin/location.php" method="post" class="formInicio">
      <h4>Añadir Sede</h4> 
      <div class="card text-start">
        <div class="card-body">       
        <label>Nombre</label><br>
        <input type="text" placeholder="Nombre" autofocus autocomplete="on" required name="name"><br>
        <label>Dirección</label><br>
        <input type="text" placeholder="Dirección" autofocus autocomplete="on" required name="location"><br>  
        <label>Horario inicio</label><br>
        <input type="time" placeholder="Horario" autofocus autocomplete="on" required name="schedule"><br>  
        <label>Horario Cierre</label><br>
        <input type="time" placeholder="Horario" autofocus autocomplete="on" required name="schedule2"><br>  
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      </div>
    </div>
    </br>
    <form action="../../php/admin/brand.php" method="post" class="formInicio">
      <h4>Añadir Marca</h4> 
      <div class="card text-start">
        <div class="card-body">       
        <label>Nombre</label><br>
        <input type="text" placeholder="Nombre" autofocus autocomplete="on" required name="name"><br>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      </div>
    </div>
    </section>
  </main>
  <!--footer-->
  <footer>
  </footer>
  <script src="https://kit.fontawesome.com/0bf8ac12b9.js" crossorigin="anonymous"></script> <!--Linki de conexión íconos-->
</body>
</html>
