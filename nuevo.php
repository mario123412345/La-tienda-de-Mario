<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sesion{
            text-align: center;
            border: 1px;
        }
       
    </style>
</head>
<body>
    <a href="sesion.php">
    <h1>Volver</h1>
    </a>
    <?php
        $mysqli=new mysqli("localhost","root","mario1234@","vehiculos", 3306);
        if ($mysqli->connect_error){
            die("Error".$mysqli->connect_error);
        }
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $usuario=$_POST['usuario'];
            $Correo=$_POST['correo'];
            $Contraseña=$_POST['contraseña'];
            $sql="INSERT INTO personas(usuario,correo,contraseña) 
            VALUES('$usuario','$Correo','$Contraseña')";
            if ($mysqli->query($sql)===TRUE){
                echo "Crear";
                header("Location: sesion.php");
                exit();
            }else{
                echo "Error".$mysqli->error;
            }
        }
    ?>
    <div class="sesion">
    <h1>Crear nuevo usuario</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required><br>
            <label for="correo">Correo:</label>
            <input type="text" name="correo" required><br>
            <label for="contraseña">Contraseña</label>
            <input type="text" name="contraseña" required><br>
            <input type="submit" value="Crear">
        </form>
    </div>
</body>
</html>