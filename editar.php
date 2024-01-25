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
    $mysqli=new mysqli("localhost","root","mario1234@","musica",3306);
    if ($mysqli->connect_errno){
        echo "Fallo (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }
    if (isset($_GET['nombre'])){
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $nombre=$_POST['nombre'];
            $nuevoNombre=$_POST['nuevo_nombre'];
            $nuevaFechaNacimiento=$_POST['nueva_fecha_nacimiento'];
            $nuevaFechaMuerte=$_POST['nueva_fecha_muerte'];
            $nuevoGenero=$_POST['nuevo_genero'];
            $nuevaHistoria=$_POST['nueva_historia'];
            $query="UPDATE músico SET 
                      Nombre_único='$nuevoNombre',
                      Fecha_nacimiento='$nuevaFechaNacimiento',
                      Fecha_muerte='$nuevaFechaMuerte',
                      Nombre_genero='$nuevoGenero',
                      Historia='$nuevaHistoria'
                      WHERE Nombre_único='$nombre'";
            if ($mysqli->query($query)){
                header("Location:Intermedia3.php");
                exit();
            }else{
                echo "Error".$mysqli->error;
            }
        }else{
            $nombre=urldecode($_GET['nombre']);
            $query="SELECT*FROM músico WHERE Nombre_único='$nombre'";
            $result=$mysqli->query($query);
            if ($result->num_rows>0){
                $row=$result->fetch_assoc();
                echo "<form action='' method='post'>";
                echo "<input type='hidden' name='nombre' value='".$row['Nombre_único']."'>";
                echo "Nombre: <input type='text' name='nuevo_nombre' value='".$row['Nombre_único']."'><br>";
                echo "Fecha de nacimiento: <input type='text' name='nueva_fecha_nacimiento' value='".$row['Fecha_nacimiento']."'><br>";
                echo "Fecha de muerte: <input type='text' name='nueva_fecha_muerte' value='".$row['Fecha_muerte']."'><br>";
                echo "Género: <input type='text' name='nuevo_genero' value='".$row['Nombre_genero']."'><br>";
                echo "Historia: <input type='text' name='nueva_historia'>".$row['Historia']."</textarea><br>";
                echo "<input type='submit' value='Guardar cambios'>";
                echo "</form>";
            }else{
                echo "Error";
            }
        }
    }else{
        echo "Escribe el músico";
    }
    echo "huesp";
    ?>
</body>
</html>