<?php

    //conexion a la db y verificacion de estado
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

    // echo "<center>";
    // echo "<h1>Registros de la base de datos:</h1>";

    // if (!$connection) {
    //     echo "<h2>==> The connection to data base failed: " . mysqli_connect_error() . "</h2>";
    // } else {
    //     echo "<h2>==> The connection to data base sucessfull" . "</h2>";
    // }

    //modelo de la tabla
    $modelTable = "CREATE TABLE cotizaciones (
        id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre_cliente VARCHAR(50) NOT NULL,
        correo_cliente VARCHAR(60) NOT NULL,
        servicio_seleccionado VARCHAR(80),
        descripcion_mensaje VARCHAR(550) NOT NULL,
        fecha_recibido TIMESTAMP 
    )";

    // //aplicar el modelo de la tabla a la db
    // if ($connection->query($modelTable) === TRUE) {
    //     echo "<h4>==> The table was created correctly</h4>";
    // } else {
    //     echo "<h4>==> An error has ocurred: ". $connection->error . "</h4>";
    // }

    //capturando datos enviados desde el form
    $nameClient = $_POST["nombreUserForm"];
    $emailClient = $_POST["emailUserForm"];
    $serviceSelect = $_POST["serviceSelectedForm"];
    $descriptionMessage = $_POST["descriptionMessageForm"];

    // echo "<h1>Registros de los datos capturados:</h1>";
    
    // echo "<p>$nameClient</p>";
    // echo "<p>$emailClient</p>";
    // echo "<p>$serviceSelect</p>";
    // echo "<p>$descriptionMessage</p>";

    // echo "</center>";
    
    $urlImg = "../Assets/Imagenes/iconBarraN.png";

    if (strlen($nameClient) > 0 && strlen($emailClient) > 0 && strlen($serviceSelect) > 0 && strlen($descriptionMessage) > 0 ) {

        $queryFormat = "INSERT INTO cotizaciones (
            nombre_cliente, correo_cliente, servicio_seleccionado, descripcion_mensaje) VALUES (
            '$nameClient', '$emailClient', '$serviceSelect', '$descriptionMessage' )";

        if ($connection->query($queryFormat) === true) {
            
            echo "<title>Cotizacion eviada</title>";
            echo "<div style='display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; width: 100%; height: 100%; background-color: rgb(236, 240, 250);'>";
            echo "<img src='$urlImg'>";
            echo "<h2>Tu cotizacion se ha enviado correctamente</h2>";
            echo "<p>Nuestro equipo tardara lo menos posible en responderte a tu correo, gracias!</p>";
            echo "<a href='/'><button style='background-color: rgb(59, 156, 252); padding: 1vw 2vw; border: none; color: white; font-size: 1.1vw; border-radius: 10px; cursor: pointer'>vuelve atras</button></a>";
            echo "</div>";

            $connection->close();

        } else {

            echo "<title>Error interno</title>";
            echo "<div style='display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; width: 100%; height: 100%; background-color: rgb(236, 240, 250);'>";
            echo "<img src='$urlImg'>";
            echo "<h2>Error interno del servidor al procesar los datos, puede que hayas intentado ingresar valores de tipos diferentes a los esperados, no se creara otra vez!</h2>";
            echo "<p>$connection->error</p>";
            echo "<a href='/'><button style='background-color: rgb(59, 156, 252); padding: 1vw 2vw; border: none; color: white; font-size: 1.1vw; border-radius: 10px; cursor: pointer'>vuelve atras</button></a>";
            echo "</div>";

        };

    } else {

        echo "<title>Datos invalidos</title>";
        echo "<div style='display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; width: 100%; height: 100%; background-color: rgb(236, 240, 250);'>";
        echo "<img src='$urlImg'>";
        echo "<h2>Datos enviados invalidos</h2>";
        echo "<p>Puede que hayas enviado campos del fomulario vacios o con mas caracteres de los aceptados, vuelve a intentarlo...</p>";
        echo "<a href='/Cotizaciones.html'><button style='background-color: rgb(59, 156, 252); padding: 1vw 2vw; border: none; color: white; font-size: 1.1vw; border-radius: 10px; cursor: pointer'>vuelve atras</button></a>";
        echo "</div>";

    }

?>
