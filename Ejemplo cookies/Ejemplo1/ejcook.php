<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (!isset($_COOKIE['nombre']) ){
        setcookie('nombre', 'Arman', time() + 60);
        // No podemos poner el echo justo después de crear la cookie
        // porque las cookies no están disponibles en la misma solicitud en la que se crean. 
        // El navegador necesita recibir la cabecera Set-Cookie del servidor, 
        // y solo en la siguiente solicitud incluirá la cookie en las cabeceras enviadas de vuelta al servidor
    }else{
        echo $_COOKIE['nombre'];

    }
    ?>
</body>
</html>