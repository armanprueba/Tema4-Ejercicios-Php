<?php

    session_start();
    $cesta = isset($_SESSION['cesta']) ? $_SESSION['cesta'] : array();
    // Si el valor de la session existe lo coge, sino se convierte en un array.
    $articulos = array(
        array("id" => 1, "nombre" => "Zapatillas Nike", "precio" => 60),
        array("id" => 2, "nombre" => "Sudadera Domyos", "precio" => 15),
        array("id" => 3, "nombre" => "Pala de pádel Vairo", "precio" => 50),
        array("id" => 4, "nombre" => "Pelota de baloncesto Molten", "precio"
        => 20)
        );
    // Creamos el array con todos los valores

    // Cogemos el enlace con los datos enviados mediante el método git
    if(isset($_GET['id'])){
        foreach($articulos as $articulo){
            // Si el id recogido está en un artículo se copia en el array cesta, este se copia en la session de cesta 
            // y la variable session total suma el precio de los articulos seleccionados
            if ($articulo['id'] == $_GET['id']){
                $cesta[] = $articulo;
                $_SESSION['cesta'] = $cesta;
                $_SESSION['total'] += $articulo['precio'];
            }; 
            
        }
        header('Location: carro.php'); // Ponemos el header aquí para que cuando coja el enlace con el método get
                                       // se redireccione al enlace normal y así no se vuelva a 
                                       // enviar el valor cada vez que se recarga la página.
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <style>
    body {
        background-color: #aaaaaa;
        color: #111111;
    }

</style>
</head>
<body>
    <h1>Lista de Artículos</h1>
        <form name="login" method="GET" action="carro.php">
            <!-- Crea una lista y la rellena recorriendo con php el array de articulos.
                 Cada lista tiene un enlace que al ser seleccionado redirecciona a la misma página enviandole de vuelta
                 una variable id mediante el método get -->
            <ul>
                <?php
                    foreach ($articulos as $articulo){?>
                        <li><a href="carro.php?id=<?php echo $articulo['id']?>">
                            <?php echo $articulo['nombre']?></a> (<?php echo $articulo['precio']?>) euros 
                        </li>
                <?php    }
                ?>
            </ul>
        </form>
    <br>
    <h2>Lista de Artículos</h2>
    <ul>
        <!-- Recorre el array que hemos creado para mostrar los productos que hemos seleccionado mediante el método get-->
        <?php
            foreach ($cesta as $articulo){?>
                <li><a href="carro.php?id=<?php echo $articulo['id']?>">
                    <?php echo $articulo['nombre']?></a> (<?php echo $articulo['precio']?>) euros 
                </li>
            <?php    }
        ?>
    </ul>
    <br>
    <!-- Muestra el precio total de los artículos que hemos seleccionado-->
    <p><?php echo $_SESSION['total']. "    euros"?></p>
</body>
</html>