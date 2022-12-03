<?php 
          
    $id=$_GET['CodPersona'];
    include("conexion.php");

    $sql="DELETE FROM personas WHERE CodPersona = $id";
    
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script language='JavaScript'>alert('Los datos se eliminaron correctamente de la BD');
                location.assign('index.php');
                </script>";
    }else{
        echo "<script language='JavaScript'>alert('Los datos NO se eliminaron de la BD');
                location.assign('index.php');
                </script>";
    }