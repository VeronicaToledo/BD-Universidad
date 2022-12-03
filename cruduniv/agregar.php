<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $id = $_POST['CodPersona'];
        $CI = $_POST['CI'];
        $nombre = $_POST['Nombre'];
        $A_Primer = $_POST['A_Primer'];
        $A_Segundo = $_POST['A_Segundo'];
        $Sexo = $_POST['Sexo'];
        $telefono = $_POST['telefono'];
        $Direccion = $_POST['Direccion'];
        $email = $_POST['email'];


        include("conexion.php");
       
        $sql = "INSERT INTO personas(`CodPersona`, `CI`, `Nombre`, `A_Primer`, `A_Segundo`, `Sexo`, `telefono`, `Direccion`, `email`) VALUES ('$id','$CI','$nombre','$A_Primer','$A_Segundo','$Sexo','$telefono','$Direccion','$email')";
        

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            //los datos ingresaron a la bd
            echo "<script language='JavaScript'> alert('Los datos fueron ingresados correctamente a la BD');
                location.assign('index.php');
                </script>";
        } else {
            //los datos NO ingresaron a la bd
            echo "<script language='JavaScript'> alert('ERROR: Los datos NO fueron ingresados correctamente a la BD');
                location.assign('index.php');
                </script>";
        }
        mysqli_close($conexion);
    } else {

    ?>
        <th>
            <h2>PROYECTO UNIVERSIDAD UNIBETH - BASE DE DATOS II - SEM II/2022</h2>
            <h3>Por Univ. Delfin R. Gareca C.  &  Univ. Veronica Toledo R.</h3>
            <h1>AGREGAR NUEVA PERSONA</h1>
        </th>
        
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <table>
                <tr>
                    <th><label for="">Codigo Persona:</label></th>
                    <td><input type="text" name="CodPersona"><br></td>                
                    <th><label for=""> CI: </label></th>
                    <td><input type="text" name="CI"><br></td>                
                    <th><label for="">Nombres:</label></th>
                    <td><input type="text" name="Nombre"><br></td>
                </tr>
                <tr>      
                    <th><label for=""> Apellido 1:</label></th>
                    <td><input type="text" name="A_Primer"></td><br>
                    <th><label for=""> Apellido 2:</label></th>
                    <td><input type="text" name="A_Segundo"> <br></td>
                    <th> <label for="">Sexo :</label></th>
                    <td><input type="text" name="Sexo"> <br></td>
                </tr>
                <tr>
                    <th><label for=""> Telefono Celular:</label></th>
                    <td><input type="text" name="telefono"> <br></td>
                    <th><label for="">Direccion:</label></th>
                    <td><input type="text" name="Direccion"> <br></td>
                    <th><label for=""> Correo Electronico:</label></th>
                    <td><input type="text" name="email"> <br></td>
                </tr>  
            </table>
            <table></table>

            <input type="submit" name="enviar" value="AGREGAR">
            <a href="index.php">Regresar</a>
        </form>
    <?php
    }
    ?>
    

</body>

</html>