<html>
<head>
    <title>panel de administracion</title>
</head>
<body>
<?php

    session_start();

    $hostDataBase = "127.0.0.1";
    $nameDataBase = "phpform";
    $userForDataBase = "root";
    $passwordForDataBase = "egZRXcevpsvSb59";

    $connection = mysqli_connect(
        $hostDataBase,
        $userForDataBase,
        $passwordForDataBase,
        $nameDataBase
    );

    // if (!$connection) {
    //     echo "<h2>==> The connection to data base failed: " . mysqli_connect_error() . "</h2>";
    // } else {
    //     echo "<h2>==> The connection to data base sucessfull" . "</h2>";
    // }

    $peticion = "SELECT * FROM cotizaciones";

    $resultPetion = $connection->query($peticion);

?>

<style>

    body {
        margin: 0px;
        width: 100%;
        height: 100%;
        background-color: rgb(236, 240, 250);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #contenedorP {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    #contenedorCotizacion {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        border: 1px solid black;
        border-radius: 10px;
        padding: 10px;
        margin: 10px;
        width: 50%;
    }

    #contenedorCotizaciones {
        display: flex;
        flex-direction: column;
        align-items: center
    }

</style>

<?php if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["fwd-admin"])) { ?>
    
    <body>

        <h1>Cotizaciones aun sin responder</h1>

        <div id="contenedorP">
        
            <div id="contenedorCotizaciones"><?php for ($i = 0; $i < $resultPetion->num_rows; $i++) { $fila = $resultPetion->fetch_assoc() ?>

                <div id="contenedorCotizacion">
                    <h3 style='margin: 0px'>Fecha y hora</h3>
                    <p><?php echo $fila["fecha_recibido"] ?></p>
                    <h3 style='margin: 0px'>Nombre del cliente</h3>
                    <p><?php echo $fila["nombre_cliente"] ?></p>
                    <h3 style='margin: 0px'>Correo del cliente</h3>
                    <p><?php echo $fila["correo_cliente"] ?></p>
                    <h3 style='margin: 0px'>Servicio requerido</h3>
                    <p><?php echo $fila["servicio_seleccionado"] ?></p>
                    <h3 style='margin: 0px'>Descripcion</h3>
                    <p><?php echo $fila["descripcion_mensaje"] ?></p>
                </div>

            </div> <?php } ?>

            <center>
                <br>
                <a href="cerrarSession.php" style="text-decoration: none"><button style='background-color: red; padding: 1vw 2vw; border: none; color: white; font-size: 20px; border-radius: 10px; cursor: pointer; margin-bottom: 20px'>cerrar sesion</button></a>
                <br>
            </center>

        </div>

    </body>

<?php } else {?>
    
    <body style='margin: 0px'>
        <div style='display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; width: 100%; height: 100%; background-color: rgb(236, 240, 250);'>
            <h2>No haz iniciado sesion</h2>
            <a href='autenticacion.php'><button style='background-color: rgb(59, 156, 252); padding: 1vw 2vw; border: none; color: white; font-size: 20px; border-radius: 10px; cursor: pointer'>iniciar sesion</button></a>
        </div>
    </body>

<?php } ?>

</body>
</html>