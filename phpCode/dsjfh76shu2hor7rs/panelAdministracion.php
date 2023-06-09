<?php

    session_start();

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

    // if (!$connection) {
    //     echo "<h2>==> The connection to data base failed: " . mysqli_connect_error() . "</h2>";
    // } else {
    //     echo "<h2>==> The connection to data base sucessfull" . "</h2>";
    // }

    $peticion = "SELECT * FROM cotizaciones";

    $resultPetion = $connection->query($peticion);

?>

<style>

    *{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

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
        border-radius: 1vw;
        padding: 0.4vw;
        background-color: white;
        
    }

    #contenedorCotizaciones {

        max-width: 100vw;
        padding: 0 2vw;
        min-height: 100vh;
        display:grid;
        grid-template: 1fr 1fr / 1fr 1fr;
        grid-auto-flow: row;
        grid-auto-rows: 1fr 1fr;
        grid-auto-columns: 1fr 1fr;
        align-content: center;
        align-items: center;
        justify-content: space-around;
        grid-gap: 2vw 2vw;
    }

    .buttonDelete {
        background-color: orange;
        border: none;
        border-radius: 10px;
        padding: 10px;
        font-size: 1vw;
    }

    .buttonDelete:hover{
        cursor: pointer;
    }

</style>

<?php if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["fwd-admin"])) { ?>

    <h1>Cotizaciones aun sin responder</h1>

    <div id="contenedorP">
    
        <div id="contenedorCotizaciones">
            
        <?php for ($i = 0; $i < $resultPetion->num_rows; $i++) { $fila = $resultPetion->fetch_assoc() ?>

            <div id="contenedorCotizacion">

                <h3 style='margin: 0px'>Fecha y hora</h3>
                <p><?php echo $fila["fecha_recibido"] ?></p>
                <h3 style='margin: 0px'>Nombre del cliente</h3>
                <p><?php echo $fila["nombre_cliente"] ?></p>
                <h3 style='margin: 0px'>Correo del cliente</h3>
                <p><?php echo $fila["correo_cliente"] ?></p>
                <h3 style='margin: 0px'>Servicio requerido</h3>
                <p><?php echo $fila["servicio_seleccionado"] ?></p>
                <h3 style='margin: 0px' >Descripcion</h3>
                <p><?php echo $fila["descripcion_mensaje"] ?></p>
                
                <form action="eliminarCotizacion.php?id=<?php echo $fila["id"] ?>" method="POST">
                    <input class="buttonDelete" type="submit" value="Eliminar Cotizacion">
                </form>

            </div>

        <?php } ?>

    </div>
    

    <br>
    <a href="cerrarSession.php" style="text-decoration: none"><button style='background-color: red; padding: 1vw 2vw; border: none; color: white; font-size: 20px; border-radius: 10px; cursor: pointer; margin-bottom: 20px'>Cerrar Sesion</button></a>

<?php } else {?>
    
    <div style='display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; width: 100%; height: 100%; background-color: rgb(236, 240, 250);'>
        <h2>No haz iniciado sesion</h2>
        <a href='autenticacion.php'><button style='background-color: rgb(59, 156, 252); padding: 1vw 2vw; border: none; color: white; font-size: 20px; border-radius: 10px; cursor: pointer'>iniciar sesion</button></a>
    </div>

<?php } ?>
