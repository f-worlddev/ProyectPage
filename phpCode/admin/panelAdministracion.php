<html>
<head>
    <title>panel de administracion</title>
</head>
<body>
<?php

    session_start()

?>

<?php if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["fwd-admin"])) { ?>
    
    <div style='display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; width: 100%; height: 100%;'>
        <h1>Panel de administracion, en progreso....</h1>
        <button style='background-color: red; padding: 1vw 2vw; border: none; color: white; font-size: 20px; border-radius: 10px; cursor: pointer'><a href="cerrarSession.php" style="text-decoration: none">cerrar sesion</a></button>
    </div>

<?php } else {?>

    <div style='display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; width: 100%; height: 100%; background-color: rgb(236, 240, 250);'>
    <h2>No haz iniciado sesion</h2>
    <a href='autenticacion.php'><button style='background-color: rgb(59, 156, 252); padding: 1vw 2vw; border: none; color: white; font-size: 20px; border-radius: 10px; cursor: pointer'>iniciar sesion</button></a>
    </div>

<?php } ?>

</body>
</html>