<?php

    session_start();

    //datos de conexion a la base de datos:
    $hostDataBase = "none";
    $nameDataBase = "none";
    $userForDataBase = "none";
    $passwordForDataBase = "none";

    $connection = mysqli_connect(
        $hostDataBase,
        $userForDataBase,
        $passwordForDataBase,
        $nameDataBase
    );

    $idForm = $_GET["id"];

    $sentencia = "DELETE FROM $nameDataBase WHERE id = $idForm";

    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["fwd-admin"]) && $connection->query($sentencia) === true) {

        header("Location: panelAdministracion.php");

    } else {

        echo "<script> alert('Error al eliminar la cotizacion!!!') </script>";

    }

?>
