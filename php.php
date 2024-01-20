<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leer - CRUD PHP</title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
        }
    
    </style>
</head>

<body>
    <?php
        $mysqli= new mysqli("localhost","root","mario1234@","vehiculos",3306);
        if ($mysqli->connect_errno){
            echo"Fallo(".$mysql->connect_errno.")".$mysqli->connect_error;
        }
        $query='select * from coches';
        $result=$mysqli->query($query);
        $num_results=$result->num_rows;
        echo"<table>";
        echo"
        <tr>
            <th>Nombre</th>
            <th>Caballos</th>
            <th>Creador</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Compra</th>
        </tr>";
        for($i=0;$i<$num_results;$i++){
            $row=$result->fetch_assoc();
            echo"<tr>";
            echo("<td>".$row['Nombre']."</td>");
            echo("<td>".$row['caballos']."</td>");
            echo("<td>".$row['creador']."</td>");
            echo("<td>".$row['marca']."</td>");
            echo("<td>".$row['precio']."</td>");
            echo("<td>
                <a class='button' href='compra.php?=".urlencode($row['Nombre'])."'>Comprar</a></td>");
            echo"</tr>";
        }
        echo "</table>"
    ?>
    <a href="http://localhost/pagina/tienda.html">
        <h2>Échale un ojo a nuestros productos</h2>
    </a>
</body>
</html>