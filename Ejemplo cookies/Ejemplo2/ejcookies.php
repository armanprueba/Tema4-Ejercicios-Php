<?php 
    if(!isset($_COOKIE['usuario'])){
        $usuario = $_POST["usuario"];
        setcookie('usuario', $usuario, time() + 1000);
    }
    header ("Location:ejcookies.view.php");



       


