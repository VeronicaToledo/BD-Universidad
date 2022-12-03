<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><img src="" alt="" >Inicio</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estas Seguro?, se eliminaran los datos');
        }
    </script>
    

</head>

<body style="background-color:rgb(255,255,204)">
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <table>
            <tr>
                <th colspan="11">
                    <h2>PROYECTO UNIVERSIDAD UNIBETH- BASE DE DATOS II - SEM II/2022</h2>
                    <h3>Por Univ. Delfin R. Gareca C.  &  Univ. Veronica Toledo R.</h3>
                    <h1>LISTA DE PERSONAS</h1>
                </th>
            </tr>
            <tr>
                <td>
                    <label for="">CI:</label>
                    <input type="text" name="CI">
                </td>
                <td>
                    <label for="">Nombres:</label>
                    <input type="text" name="Nombre">
                </td>
                <td>
                    <input type="submit" name="enviar" value="BUSCAR">
                </td>
                <td>
                    <a href="index.php">Mostrar todas las personas</a>
                </td>
                <td>
                    <a href="agregar.php">Agregar Nueva Persona</a>
                </td>
                <td>
                    <a href="login.php" >Salir</a>                    
                </td>
            </tr>
        </table>
    </form>
    <table>
        <thead>
            <tr>
                <th>Cod. Persona</th>
                <th>CI</th>
                <th>Nombres</th>
                <th>Apellido 1</th>
                <th>Apellido 2</th>
                <th>Sexo</th>
                <th>Telf/Cel</th>
                <th>Direccion</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['enviar'])) {
                //Mostrar la Busqueda
                $CI = $_POST['CI'];
                $nombre = $_POST['Nombre'];
                if (empty($_POST['Nombre']) && empty($_POST['CI'])) {
                    echo "<script language='JavaScript'>alert('Ingrese el Nombre o el número de CI');
                        location.assign('index.php');
                        </script>";
                } else {
                    if (empty($_POST['Nombre'])) {
                        $sql = "select * from personas where CI=$CI";
                    }
                    if (empty($_POST['CI'])) {
                        $sql = "select * from personas where Nombre like '%" . $nombre . "%'";
                    }
                    if (!empty($_POST['Nombre']) && !empty($_POST['CI'])) {
                        $sql = "select * from personas where CI=.$CI and Nombre like '%" . $nombre . "%'";
                    }
                }
                $resultado = mysqli_query($conexion, $sql);
                while ($filas = mysqli_fetch_assoc($resultado)) {
            ?>
                    <tr>
                        <td> <?php echo $filas['CodPersona'] ?></td>
                        <td> <?php echo $filas['CI'] ?></td>
                        <td> <?php echo $filas['Nombre'] ?></td>
                        <td> <?php echo $filas['A_Primer'] ?></td>
                        <td> <?php echo $filas['A_Segundo'] ?></td>
                        <td> <?php echo $filas['Sexo'] ?></td>
                        <td> <?php echo $filas['telefono'] ?></td>
                        <td> <?php echo $filas['Direccion'] ?></td>
                        <td> <?php echo $filas['email'] ?></td>
                        <td>
                            <?php echo "<a href='editar.php?CodPersona=" . $filas['CodPersona'] . "'>EDITAR</a>"; ?>
                            -
                            <?php echo "<a href='eliminar.php?CodPersona=" . $filas['CodPersona'] . "' onclick='return confirmar()'>ELIMINAR</a>"; ?>
                        </td>
                    </tr>
                <?php
                }
            } else {
                //Mostrar todos las personas
                $sql = "select*from personas";
                $resultado = mysqli_query($conexion, $sql);
                while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td> <?php echo $filas['CodPersona'] ?></td>
                        <td> <?php echo $filas['CI'] ?></td>
                        <td> <?php echo $filas['Nombre'] ?></td>
                        <td> <?php echo $filas['A_Primer'] ?></td>
                        <td> <?php echo $filas['A_Segundo'] ?></td>
                        <td> <?php echo $filas['Sexo'] ?></td>
                        <td> <?php echo $filas['telefono'] ?></td>
                        <td> <?php echo $filas['Direccion'] ?></td>
                        <td> <?php echo $filas['email'] ?></td>
                        <td>
                            <?php echo "<a href='editar.php?CodPersona=" . $filas['CodPersona'] . "'>EDITAR</a>"; ?>
                            -
                            <?php echo "<a href='eliminar.php?CodPersona=" . $filas['CodPersona'] . "' onclick='return confirmar()'>ELIMINAR</a>"; ?>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>