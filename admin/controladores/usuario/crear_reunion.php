<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Crear reunio</title>
        <style type="text/css" rel="stylesheet">
            .error{
            color: red;
            }
        </style>
    </head>
<body>
    <?php
        //incluir conexión a la base de datos
        include '../../config/conexionBD.php';
        $cedula = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
        $nombres = isset($_POST["lugar"]) ? mb_strtoupper(trim($_POST["lugar"]), 'UTF-8') : null;
        $apellidos = isset($_POST["coordenadas"]) ? mb_strtoupper(trim($_POST["coordenadas"]), 'UTF-8') : null;
        $direccion = isset($_POST["remitente"]) ? mb_strtoupper(trim($_POST["remitente"]), 'UTF-8') : null;
        $telefono = isset($_POST["invitados"]) ? trim($_POST["invitados"]): null;
        $correo = isset($_POST["motivo"]) ? trim($_POST["motivo"]): null;
        $fechaNacimiento = isset($_POST["observaciones"]) ? trim($_POST["observaciones"]): null;

        $sql = "INSERT INTO reunion VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono',
        '$correo', MD5('$contrasena'), '$fechaNacimiento' )";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha registrado correctamemte!!!</p>";
        } else {
            if($conn->errno == 1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }

        //cerrar la base de datos
        $conn->close();
        echo "<a href='../vista/crear_usuario.html'>Regresar</a> <br>";
        echo "<a href='../vista/login.html'>Iniciar sesion</a>";
    
    ?>
</body>
</html>