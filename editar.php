<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Músico</title>
</head>
<body>
    <?php
    echo "sandia";
    $mysqli=new mysqli("localhost","root","mario1234@","vehiculos",3306);
    if ($mysqli->connect_errno){
        echo "Fallo (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }
    if (isset($_GET['id'])){
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $usuario=$_POST['usuario'];
            $correo=$_POST['correo'];
            $contraseña=$_POST['contraseña'];
            $query="UPDATE personas SET 
                      usuario='$nuevoNombre',
                      correo='$nuevocorreo',
                      contraseña='$nuevacontraseña',
                      WHERE id='$id'";
            if ($mysqli->query($query)){
                header("Location:tabla.php");
                exit();
            }else{
                echo "Error".$mysqli->error;
            }
        }else{
            $id=urldecode($_GET['id']);
            $query="SELECT*FROM personas WHERE id='$id'";
            $result=$mysqli->query($query);
            if ($result->num_rows>0){
                $row=$result->fetch_assoc();
                echo "<form action='' method='post'>";
                echo "<input type='hidden' name='usuario' value='".$row['usuario']."'>";
                echo "Nombre: <input type='text' name='usuario' value='".$row['usuario']."'><br>";
                echo "Fecha de nacimiento: <input type='text' name='correo' value='".$row['correo']."'><br>";
                echo "Fecha de muerte: <input type='text' name='contraseña' value='".$row['contraseña']."'><br>";
                echo "<input type='submit' value='Guardar cambios'>";
                echo "</form>";
            }else{
                echo "Error";
            }
        }
    }else{
        echo "Haz tus cambios";
    }
    echo "huesp";
    ?>
</body>
</html>