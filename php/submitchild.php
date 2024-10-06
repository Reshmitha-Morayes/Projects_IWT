<?php
    include_once "../config.php";
?>

<?php
    
        $name = $_POST['name'];
        $img = $_POST['img'];
        $price = $_POST['price'];

        $q = "insert into childitem(id,name,img,price)values('','$name','$img','$price')";

        if(mysqli_query($conn, $q))
        {
            header("Location: childwear.php");
        }

        mysqli_close($conn);

?>
