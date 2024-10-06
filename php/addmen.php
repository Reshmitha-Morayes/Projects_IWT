<?php
    include_once "../config.php";

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $img = $_POST['img'];
        $price = $_POST['price'];

        $q = "insert into menItem(id,name,img,price)values('','$name','$img','$price')";

        $query = mysqli_query($conn, $q);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Men's Wear</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f8f9fa;">

    <nav style="background-color: #333; color: white; padding: 15px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="menwear.php" style="color: white; text-decoration: none; font-size: 24px;">Men's Wear</a>
        </div>
    </nav>

    <div style="max-width: 600px; margin: 40px auto; background-color: white; padding: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 8px;">

        <form method="post" action="submitmen.php">

            <div style="background-color: #6c757d; padding: 15px; border-radius: 8px;">
                <h2 style="color: white; text-align: center;">Add New Men's Wear</h2>
            </div>
            <br>

            <label for="name" style="font-weight: bold;">Item Name</label><br>
            <input type="text" name="name" id="name" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;"><br><br>

            <label for="img" style="font-weight: bold;">Item Image</label><br>
            <input type="text" name="img" id="img" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;"><br><br>

            <label for="price" style="font-weight: bold;">Item Price</label><br>
            <input type="text" name="price" id="price" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;"><br><br>

            <button type="submit" name="submit" id="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Submit</button>
            <a href="menwear.php" id="cancel" style="background-color: #17a2b8; color: white; padding: 10px 20px; border: none; border-radius: 4px; text-decoration: none; margin-left: 10px;">Cancel</a>

        </form>
    </div>

</body>
</html>
