<?php

if (isset($_GET["id"]))
{
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    //create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM childitem WHERE id = $id";
    $connection->query($sql);
}

header("location: childwear.php");
exit;
?>