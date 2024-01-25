<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse:collapse;
            width:100%;
        }
        table td{
            border:1px solid cadetblue;
            text-align:center;
            padding: 1.5rem;
        }
        .button{
            border-radius: .5rem;
            color:blue;
            padding:1rem;
        }
    </style>
</head>
<body>
<?php
        $mysqli=new mysqli("localhost","root","mario1234@","vehiculos",3306);
        if($mysqli->connect_errno){
            echo "Fallo(".$mysql->connect_errno.")".$mysqli->connect_error;
        }
        $query='select*from personas';
        $result=$mysqli->query($query);
        $num_results=$result->num_rows;
        echo "<table>";
        echo "
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Contraseña</th>
        </tr>";
        for($i=0;$i<$num_results;$i++){
            $row=$result->fetch_assoc();
            echo "<tr>";
            echo("<td>".$row['id']."</td>");
            echo("<td>".$row['usuario']."</td>");
            echo("<td>".$row['correo']."</td>");
            echo("<td>".$row['contraseña']."</td>");
            echo("<td>
                <a class='button' href='editar.php?id=".urlencode($row['id'])."'>Editar</a>
                <a class='delete-button' href='borrar.php?id=".urlencode($row['id'])."'>Borrar</a>
                </td>");

            echo "</td>";

        }
        echo "</table>";

    ?>
</body>
</html>