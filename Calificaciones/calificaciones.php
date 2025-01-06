<?php
    session_start();
    $lista = isset($_SESSION['lista']) ? $_SESSION['lista'] : array();
    // Si el valor de la session existe lo coge, sino se convierte en un array.
    $n1;
    $n2;
    $n3;
    if (isset($_POST['btnSubir'])) {
        $n1 = $_POST['nota1'];
        $n2 = $_POST['nota2'];
        $n3 = $_POST['nota3'];
        $media = ($n1 + $n2 + $n3) / 3;
        
        // Le añade un array a la lista, la suma de los arrays se copia en SESSION['lista'], 
        // al volver a reiniciar la página se le asignará el valor de la session de vuelta a el array lista
        $lista[] = array(
            "alumno" => $_POST['alumno'], 
            "nota1" => $n1, 
            "nota2" => $n2, 
            "nota3" => $n3, 
            "media" =>  round($media, 1) // Para que los decimales de la media seán de 1 solo dígito
        );
        $_SESSION['lista'] = $lista;
        header('Location: calificaciones.php');
                                       // Ponemos el header aquí para que cuando coja el enlace con el método post
                                       // se redireccione al enlace normal y así no se vuelva a 
                                       // enviar el valor cada vez que se recarga la página.
    }
    // Cogemos el enlace con los datos enviados mediante el método git y borramos el valor de SESSION['lista']
    if(isset($_GET['borrar'])){
        $_SESSION['lista'] = array();

        header('Location: calificaciones.php');
        // Ponemos el header aquí para evitar problemas similares
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    

</style>
</head>
<body>
    <h1>Lista de Artículos</h1>
        <form name="login" method="POST" action="calificaciones.php">
            <div class="mb-3">
            <!--  Pongo que la nota mínima que se pueda poner xon el ratón sea 1 y la máxima 10, y con step que también recorra decimales -->
                <input type="text" name="alumno" required class="form-control" placeholder="Introduzca el nombre de su usuario" aria-label="Introduzca su nombre de usuario">
                <input type="number" required name="nota1" class="form-control" id="exampleFormControlInput1" placeholder="Nota1" min="1" max="10" step="0.1">
                <input type="number" required name="nota2" class="form-control" id="exampleFormControlInput1" placeholder="Nota2" min="1" max="10" step="0.1">
                <input type="number" required name="nota3" class="form-control" id="exampleFormControlInput1" placeholder="Nota3" min="1" max="10" step="0.1">
            </div>
            <input type="submit" id="submit" name="btnSubir" value="Subir"> 
        </form>
    <br>
    <h2>Lista de Alumnos</h2>
    <?php
        $tabla = "";
        $tabla .= "<table border.='1'>";
        $tabla .= "<tr>";
        $tabla .= "<th>Nombre</th>";
        $tabla .= "<th>Nota1</th>";
        $tabla .= "<th>Nota2</th>";
        $tabla .= "<th>Nota3</th>";
        $tabla .= "<th>Media</th>";
        $tabla .= "</tr>";
        foreach($lista as $nota_alumno){
            $tabla .= "<tr>";
            // Usamos htmlspecialchars para evitar inyecciones de código malicioso
                $tabla .= "<td>". htmlspecialchars($nota_alumno['alumno']) ."</td>";
                $tabla .= "<td>". htmlspecialchars($nota_alumno['nota1']) ."</td>";
                $tabla .= "<td>". htmlspecialchars($nota_alumno['nota2']) ."</td>";
                $tabla .= "<td>". htmlspecialchars($nota_alumno['nota3']) ."</td>";
                $tabla .= "<td>". htmlspecialchars($nota_alumno['media']) ."</td>";
            $tabla .= "</tr>";
        }

        $tabla .= "</table>";
        echo $tabla;
    ?>
    <form name="login" method="GET" action="calificaciones.php">
    <br>
    <!--  Si se clicka en este enlace se envía un enlace con el método git para borrar el array de la lista de alumnos -->
    <a href="calificaciones.php?borrar">Borrar datos...</a>
    </form>
</body>
</html>