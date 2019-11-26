<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /SistemaGestion/public/vista/login.html");
 }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    </head>

    <body>

    <a href='../../../public/vista/login.html'>Cerrar Sesión</a>

        <table border style="width:100%">
            <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Eliminado</th>
            <th>Rol</th>
            </tr>

            <?php
                include '../../../config/conexionBD.php';
                $sql = "SELECT * FROM usuario";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo " <td>" . $row["usu_cedula"] . "</td>";
                        echo " <td>" . $row['usu_nombres'] ."</td>";
                        echo " <td>" . $row['usu_apellidos'] . "</td>";
                        echo " <td>" . $row['usu_direccion'] . "</td>";
                        echo " <td>" . $row['usu_telefono'] . "</td>";
                        echo " <td>" . $row['usu_correo'] . "</td>";
                        echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                        echo " <td>" . $row['usu_eliminado'] . "</td>";
                        echo " <td>" . $row['usu_rol'] . "</td>";
                        echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
                        echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
                        echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>
        </table border>

        <table border style="width:100%">
            <tr>
            <th>Fecha y hora</th>
            <th>Lugar</th>
            <th>Coordenadas</th>
            <th>Remitente</th>
            <th>Invitados</th>
            <th>Motivo de la reunión</th>
            <th>Observaciones</th>
            </tr>

            <?php
                include '../../../config/conexionBD.php';
                $sql = "SELECT * FROM reunion";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo " <td>" . $row["reu_fecha_hora"] . "</td>";
                        echo " <td>" . $row['reu_lugar'] ."</td>";
                        echo " <td>" . $row['reu_coordenadas'] . "</td>";
                        echo " <td>" . $row['reu_remitente'] . "</td>";
                        echo " <td>" . $row['reu_invitados'] . "</td>";
                        echo " <td>" . $row['reu_motivo'] . "</td>";
                        echo " <td>" . $row['reu_observaciones'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo " <td colspan='7'> No existen reuniones registradas en el sistema </td>";
                    echo  "<a href='crear_reunion.html'>Cerrar Reunion</a></td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>
            <a href='crear_reunion.html'>Crear Reunion</a>
            <br>
            <label for="motivo">Ingrese el motivo de la reunión: </label>
            <input type="text" id="motivo" name="motivo" value="" placeholder="Ingrese motivo ..." required />
            <input type="submit" id="buscar" name="buscar" value="BUSCAR" />
            <br><br>
        </table border>
    </body>
</html>