<?php

    $urlImg = "../../Assets/Imagenes/iconBarraN.png";

    //Credenciales de usuario administrador:
    $adminCredenciales = array(
        "usuario" => "none",
        "password" => "none"
    );

    $passCrypt = password_hash($adminCredenciales["password"], PASSWORD_DEFAULT);

?>

<body style='margin: 0px'>

    <style>
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0;
            padding: 0;
        }

        #Contenedor-Autentificacion{
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            text-align: center; 
            width: 100%; 
            height: 100%; 
            background-color: rgb(236, 240, 250);
        }

        #imagen-logo{
            margin: 1vw;
        }

        #Mensaje{
            margin: 1vw;
        }

        form{
            display: flex; 
            flex-direction: column;
        }

        input{
            padding: 0.5vw; 
            font-size: 20px; 
            width: 18vw;
            height: 5.5vh;
            margin: 0.6vw;
            margin-bottom: 2vw;
            border-radius: 0.8vw;
        }

        button{
            background-color: rgb(59, 156, 252); 
            padding: 1vw 2vw; 
            border: none; 
            color: white; 
            font-size: 1.3vw; 
            cursor: pointer;
            width: 13vw;
            align-self: center;
        }

        button[type='submit']:hover{
            border-radius: 2vw;
            transition: all 0.4s;
        }

        label{
            font-size: 1.3vw;
        }

    </style>

    <div id="Contenedor-Autentificacion">
    
        <img id="imagen-logo" src=<?php echo $urlImg ?>>
        
        <h2 id="Mensaje">Autenticate para proceder con el panel de administracion</h2>
            
        <form action='' method='POST'>

            <label for='inputU'>Usuario:</label>
            <input placeholder="Usuario Administrador" id='inputU' name='userAdmin' >

            <label type="text" for='inputP'>Contraseña:</label>
            <input type="password" id='inputP' name='passAdmin' placeholder="Contraseña Administrador">

            <button type='submit'>Validar</button>
        </form>
    </div>
</body>

<?php

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
