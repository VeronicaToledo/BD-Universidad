<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body style="background-color:rgb(255,128,0)">
    <h2 style="color:aliceblue">PROYECTO UNIVERSIDAD UNIBETH - BASE DE DATOS II - SEM II/2022</h2>
    <h3 style="color:aliceblue">Por Univ. Delfin R. Gareca C.  &  Univ. Veronica Toledo R.</h3>
    <h1 style="color:blue">BIENVENIDO</h1>
    <h2 style="color:aliceblue">Ingrese al Sistema cons sus datos:</h2>

    <?php
    if (isset($_POST['enviar'])) {
        //echo "Presiono el boton de ingresar";
        if (empty($_POST['Nombre']) || empty($_POST['CI'])) {
            echo "<script language='JavaScript'>alert('El Nombre o el CI no han sido ingresados');
                location.assign('login.php');
                </script>";
        } else {
            include("conexion.php");
            $nombre = $_POST['Nombre'];
            $CI = $_POST['CI'];
            $sql = "select * from personas where Nombre='" . $nombre . "' and CI='" . $CI . "'";
            $resultado = mysqli_query($conexion, $sql);
            if ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<script language='JavaScript'>alert('BIENVENIDO');
                    location.assign('index.php');
                    </script>";
            } else {
                echo "<script language='JavaScript'>alert('El nombre o CI son erroneos');
                    location.assign('login.php');
                    </script>";
            }
        }
    } else {

    ?>
        <center>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"><br>
                <label for="">NOMBRES:</label>
                <input type="text" name="Nombre"><br>
                <label for="">CI</label>
                <input type="text" name="CI"><br>
                <input type="submit" name="enviar" value="INGRESAR">
            </form>
        </center>
        <a href="login.php" >Salir</a>
    <?php
    }
    ?>
</body>

</html>