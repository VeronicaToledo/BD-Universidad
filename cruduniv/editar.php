<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body style="background-color:rgb(255,128,0)">
    <?php
    if (isset($_POST['enviar'])) {
        //Aqui entra cuando se preciona el boton de enviar
        $id = $_POST['CodPersona'];
        $CI = $_POST['CI'];
        $nombre = $_POST['Nombre'];
        $A_Primer = $_POST['A_Primer'];
        $A_Segundo = $_POST['A_Segundo'];
        $Sexo = $_POST['Sexo'];
        $telefono = $_POST['telefono'];
        $Direccion = $_POST['Direccion'];
        $email = $_POST['email'];

        $sql = "UPDATE `personas`  SET `CI`='$CI', `Nombre`='$nombre', `A_Primer`='$A_Primer', `A_Segundo` = '$A_Segundo', `Sexo` = '$Sexo', `telefono` = '$telefono', `Direccion` = '$Direccion', `email` = '$email' WHERE `personas`.`CodPersona`='$id'";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "<script language='JavaScript'>alert('Los datos se actualizaron correctamente');
                location.assign('index.php');
                </script>";
        } else {
            echo "<script language='JavaScript'>alert('Los datos NO se actualizaron correctamente');
                location.assign('index.php');
                </script>";
        }
        mysqli_close($conexion);
    } else {
        //Aqui entra si No se ha precionado el boton enviar
        $id = $_GET['CodPersona'];
        $sql = "select * from personas where CodPersona='" . $id . "'";
        $resultado = mysqli_query($conexion, $sql);

        $fila = mysqli_fetch_assoc($resultado);

        $CodPersona = $fila['CodPersona'];
        $CI = $fila['CI'];
        $nombre = $fila['Nombre'];
        $A_Primer = $fila['A_Primer'];
        $A_Segundo = $fila['A_Segundo'];
        $Sexo = $fila['Sexo'];
        $telefono = $fila['telefono'];
        $Direccion = $fila['Direccion'];
        $email = $fila['email'];

        mysqli_close($conexion);
    ?>
        <th>
            <h2 style="color:aliceblue">PROYECTO UNIVERSIDAD UNIBETH - BASE DE DATOS II - SEM II/2022</h2>
            <h3 style="color:aliceblue">Por Univ. Delfin R. Gareca C. & Univ. Veronica Toledo R.</h3>
            <h1 style="color:blue">EDITAR DATOS DE PERSONAS</h1>
        </th>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <table>
                <tr>
                    <th><label for="">Código Persona</label></th>
                    <td><input type="text" name="CodPersona" value="<?php echo $CodPersona ?>"></td>
                    <th><label for="">CI</label></th>
                    <td><input type="text" name="CI" value="<?php echo $CI ?>"></td>
                    <th><label for=""> Nombres </label></th>
                    <td><input type="text" name="Nombre" value="<?php echo $nombre ?>"></td>
                </tr>
                <tr>
                    <th><label for=""> Apellido 1</label></th>
                    <td><input type="text" name="A_Primer" value="<?php echo $A_Primer ?>"> <br></td>
                    <th> <label for=""> Apellido 2</label></th>
                    <td><input type="text" name="A_Segundo" value="<?php echo $A_Segundo ?>"> <br></td>
                    <th><label for=""> Sexo </label></th>
                    <td><input type="text" name="Sexo" value="<?php echo $Sexo ?>"> <br></td>
                </tr>
                <tr>
                    <th><label for=""> Telefono Celular </label></th>
                    <td><input type="text" name="telefono" value="<?php echo $telefono ?>"> <br></td>
                    <th><label for=""> Dirección </label></th>
                    <td><input type="text" name="Direccion" value="<?php echo $Direccion ?>"> <br></td>
                    <th><label for=""> Correo Electronico </label></th>
                    <td><input type="text" name="email" value="<?php echo $email ?>"> <br></td>
                </tr>
            </table>

            <input type="hidden" name="CodPersona" value="<?php echo $CodPersona ?>">

            <input type="submit" name="enviar" value="ACTUALIZAR">
            <a href="index.php">Regresar</a>
        </form>
    <?php
    }
    ?>

</body>

</html>