<?php
    include_once "../config.php";
?>

<?php
    
        $name = $_POST['name'];
        $img = $_POST['img'];
        $price = $_POST['price'];

        $q = "insert into womenItem(id,name,img,price)values('','$name','$img','$price')";

        if(mysqli_query($conn, $q))
        {
            header("Location: womenwear.php");
        }

        mysqli_close($conn);

?>
