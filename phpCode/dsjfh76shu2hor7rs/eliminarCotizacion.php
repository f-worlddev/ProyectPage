<?php

    session_start();

    //datos de conexion a la base de datos:
    $hostDataBase = "bd9q3f8enmnazxy6h4dr-mysql.services.clever-cloud.com";
    $nameDataBase = "bd9q3f8enmnazxy6h4dr";
    $userForDataBase = "u9lu7hrukyemg5yq";
    $passwordForDataBase = "hCAOr69x7mpgZpVjNzR8";

    $connection = mysqli_connect(
        $hostDataBase,
        $userForDataBase,
        $passwordForDataBase,
        $nameDataBase
    );

    $idForm = $_GET["id"];

    $sentencia = "DELETE FROM cotizaciones WHERE id = $idForm";

    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["fwd-admin"]) && $connection->query($sentencia) === true) {

        header("Location: panelAdministracion.php");

    } else {

        echo "<script> alert('Error al eliminar la cotizacion!!!') </script>";

    }

?>
