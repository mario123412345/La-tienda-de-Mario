<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url('https://cutewallpaper.org/23/america-nature-wallpaper-hd/3013127654.jpg');
        }
        a:hover{
            color:rgb(3, 128, 42);

        }
        a:active{
            color:rgb(59, 59, 59);

        }
        .sesion{
            text-align: center;
        }
    </style>

</head>
<body>
    
        <a href="index.html">
            <h1>Volver</h1>
        </a>

        <?php
            $mysqli=new mysqli("localhost","root","mario1234@","vehiculos",3306);
            if ($mysqli->connect_errno){
                echo "Fallo (".$mysqli->connect_errno.")".$mysqli->connect_error;
            }
            if ($_SERVER["REQUEST_METHOD"]=="POST"){
                $Correo=$_POST['correo'];
                $Contraseña=$_POST['contraseña'];
                $sql="SELECT*FROM personas 
                WHERE correo='$Correo' and contraseña='$Contraseña'";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "Has iniciado sesión";
                  }
                } else {
                  echo "No existes";
                }
                
            };
        ?>
        <div class="rec">
            <div class="sesion">
                <h1>Iniciar sesion</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <label for="correo">Correo:</label>
                        <input type="text" name="correo" required><br>
                        <label for="contraseña">Contraseña</label>
                        <input type="text" name="contraseña" required><br>
                        <input type="submit" value="Iniciar sesión" onclick="bienvenida()">
                    </form>
                    <h2>¿No tienes cuenta?</h2>
                    <a href="http://localhost/pagina/nuevo.php">
                        <h2>Crea una</h2>
                    </a>
                   
            </div>
        </div>
    
</body>
</html>