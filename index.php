<?php
    include_once("view/Vista.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
        $vista = new Vista();
        $vista->Login();
    ?>

</body>
</html>