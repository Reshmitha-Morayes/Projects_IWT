<?php
    include_once "../config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Wear</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">

    <nav style="background-color: #333; color: white; padding: 15px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="menwear.php" style="color: white; text-decoration: none; font-size: 24px;">Men's Wear</a>
            <ul style="list-style-type: none; margin: 0; padding: 0; display: flex;">
                <li style="margin-right: 15px;">
                    <a href="men.php" style="color: white; text-decoration: none; padding: 10px 15px;">Home</a>
                </li>
                <li>
                    <a href="addmen.php" style="background-color: #6c757d; color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px;">Add New</a>
                </li>
            </ul>
        </div>
    </nav>

    <div style="margin: 20px 0;"></div>

    <!-- Retrieve Mens Wear Items -->
    <table style="width: 100%; text-align: left;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 12px;">Item Id</th>
                <th style="padding: 12px;">Item Name</th>
                <th style="padding: 12px;">Item Price</th>
                <th style="padding: 12px;">Item Image</th>
                <th style="padding: 12px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "select * from menitem";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td style='padding: 12px;'>$row[id]</td>
                                <td style='padding: 12px;'>$row[name]</td>
                                <td style='padding: 12px;'>$row[price]</td>
                                <td style='padding: 12px;'>$row[img]</td>
                                <td style='padding: 12px;'>
                                    <a href='editmen.php?id=$row[id]' style='background-color: #28a745; color: white; padding: 8px 12px; text-decoration: none; border-radius: 5px;'>Edit</a>
                                    <a href='deletemen.php?id=$row[id]' style='background-color: #dc3545; color: white; padding: 8px 12px; text-decoration: none; border-radius: 5px; margin-left: 10px;'>Delete</a>
                                </td>
                              </tr>";
                    }
                }
            ?>
        </tbody>
    </table>

</body>
</html>
