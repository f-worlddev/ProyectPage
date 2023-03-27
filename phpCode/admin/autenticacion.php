<?php

    $urlImg = "../../Assets/Imagenes/iconBarraN.png";

    $adminCredenciales = array(
        "usuario" => "rt99",
        "password" => "99rt"
    );

    $passCrypt = password_hash($adminCredenciales["password"], PASSWORD_DEFAULT);

    echo "<div style='display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; width: 100%; height: 100%; background-color: rgb(236, 240, 250);'>";

    echo "<img src='$urlImg'>";

    echo "<h2>Autenticate para proceder al panel de administracion</h2>";

    echo "<form action='' method='POST' style='display: flex; flex-direction: column;'>";

    echo "<label for='inputU'>Usuario:</label>";
    echo "<input style='padding: 5px; font-size: 20px; margin: 20px' id='inputU' name='userAdmin'>";
    echo "<label for='inputP'>Contraseña</label>";
    echo "<input style='padding: 5px; font-size: 20px; margin: 20px' id='inputP' name='passAdmin'>";

    echo "<button type='submit' style='background-color: rgb(59, 156, 252); padding: 1vw 2vw; border: none; color: white; font-size: 20px; border-radius: 10px; cursor: pointer'>validar</button>";

    echo "</form>";
    
    echo "</div>";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        session_start();

        $inputUsuario = $_POST["userAdmin"];
        $inputPassword = $_POST["passAdmin"];
        
        if ($inputUsuario === $adminCredenciales["usuario"] && password_verify($inputPassword, $passCrypt)) {

            $_SESSION["fwd-admin"] = true;
            header("Location: panelAdministracion.php");

        } else {

            echo "<script> alert('Credenciales incorrectas! intentelo de nuevo...') </script>";

        }

    }

?>
