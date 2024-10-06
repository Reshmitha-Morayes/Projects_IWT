<?php
    include_once "../config.php";

    $id = "";
    $name = "";
    $img = "";
    $price = "";

    $errormessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        if (!isset($_GET["id"])) {
            header("location: menwear.php");
            exit;
        }
        $id = $_GET["id"];
    
        $sql = "SELECT * FROM menitem WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
        if (!$row) {
            header("location: menwear.php");
            exit;
        }
    
        $name = $row["name"];
        $price = $row["price"];
    }
    else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
    
        do {
            if (empty($name) || empty($price)) {
                $errormessage = "All the fields are required!";
                break;
            }
            $sql = "UPDATE menitem SET name = '$name', price = '$price' WHERE id = $id";
    
            $result = $conn->query($sql);
    
            if (!$result) {
                $errormessage = "Invalid query: ".$conn->error;
                break;
            }
    
            $successMessage = "Update successfully";
            header("location: menwear.php");
            exit;
    
        } while (true);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Men's Wear</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f8f9fa;">

    <nav style="background-color: #333; color: white; padding: 15px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="menwear.php" style="color: white; text-decoration: none; font-size: 24px;">Men's Wear</a>
        </div>
    </nav>

    <div style="max-width: 600px; margin: 40px auto; background-color: white; padding: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 8px;">
        <h2>Edit Item</h2>

        <?php
        if (!empty($errormessage)) {
            echo "
                <div style='background-color: #f8d7da; padding: 10px; margin-bottom: 15px; border-radius: 5px; color: #842029;'>
                    <strong>$errormessage</strong>
                </div>
            ";
        }
        ?>

        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div style="margin-bottom: 15px;">
                <label for="name" style="font-weight: bold;">Item Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="price" style="font-weight: bold;">Item Price</label>
                <input type="text" name="price" value="<?php echo $price; ?>" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                    <div style='background-color: #d4edda; padding: 10px; margin-bottom: 15px; border-radius: 5px; color: #155724;'>
                        <strong>$successMessage</strong>
                    </div>
                ";
            }
            ?>

            <div style="display: flex; justify-content: space-between;">
                <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Submit</button>
                <a href="menwear.php" style="background-color: #6c757d; color: white; padding: 10px 20px; border: none; border-radius: 4px; text-decoration: none; text-align: center;">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
