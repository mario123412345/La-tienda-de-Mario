<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id=$_GET['id'];
    $mysqli=new mysqli("localhost", "root", "mario1234@", "vehiculos", 3306);
    if ($mysqli->connect_errno){
        echo "Fallo(".$mysqli->connect_errno.")".$mysqli->connect_error;
    }
    $query="DELETE FROM personas WHERE id='".$id."'";
    $mysqli->query($query);
    header("Location: tabla.php");
    exit();
    ?>
</body>
</html>