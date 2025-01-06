<!DOCTYPE html> 
<?php 
  session_start();
  // Creamos las variables de antemano.
  // Si tienen los valores de la session puestos con recordar  (es decir, fue definido previamente),
  // entonces asigna ese valor a las variables.
  // Si no, asigna una cadena vacía ('') como valor predeterminado.
  $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
  $contrasenia = isset($_SESSION['contrasenia']) ? $_SESSION['contrasenia'] : '';
  
?>
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Recordar</title> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
<link rel="stylesheet" href="../CSS/styles.css">
</head> 
<body>
    <form name="login" method="POST" action="recordar.php">

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Usuario:</label>
          <!-- Comprueba si se ha presionado el botón de recordar y enviar, y si se ha introducido un valor.
                Si es así lo almacena en una session y luego almacena el valor de una session en una variable.
                Si no es así, no pone nada, a no ser que se haya dado un valor a la session anteriormente, en cuyo
                caso lo recordará hasta que se le introduzca uno nuevo. -->
          <input type="text" name="usuario" class="form-control" placeholder="Introduzca el nombre de su usuario" aria-label="Introduzca su nombre de usuario"
          value="<?php
          if (isset($_POST['submit']) && isset($_POST['usuario']) &&  isset($_POST['recordar'])) {
              $_SESSION['usuario'] = $_POST['usuario'];
              $usuario = $_SESSION['usuario'];
              echo $usuario;
          }
          elseif(isset($usuario)){
            echo $usuario;
          }
          ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Contraseña</label>
          <!-- Lo mismo para la contraseña. -->
          <input type="password" name="contrasenia" class="form-control" id="exampleInputPassword1" placeholder="Password" 
            value="<?php
            if (isset($_POST['submit']) && isset($_POST['contrasenia']) &&  isset($_POST['recordar'])) {
                $_SESSION['contrasenia'] = $_POST['contrasenia'];
                $contrasenia = $_SESSION['contrasenia'];
                echo $contrasenia;
            }
            elseif(isset($contrasenia)){
              echo $contrasenia;
            }
            ?>">
        </div>
        <br>

        <div class="form-check">
          <input class="form-check-input" name="recordar" type="checkbox" value="Cultivo" id="flexCheckDefault">
          <label class="form-check-label ultimo-check" for="flexCheckDefault">
              Recordar
          </label> 
      </div>

        <input name="submit" type="submit" id="submit" value="Iniciar sesión"> 
    </form>
</body>
</html>