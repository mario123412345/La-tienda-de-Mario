<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .todo{
            text-align: center;
        }
    </style>
    
</head>
<body>
    
    <div class="todo">
        <h1>¿Desea comprar el producto?</h1>
            <button onclick="fincompra()">
            <h1>Comprar</h1>
            </button>
            <a href="index.html">
        <h1>Volver a la página principal</h1>
    </a>
    </div>
    <?php
        $mysqli = new mysqli("localhost", "root", "mario1234@", "vehiculos", 3306);
        if ($mysqli->connect_error){
            die("Error".$mysqli->connect_error);
        }
        
    ?>
    
    
    <script src="js.js"></script>
</body>
</html>