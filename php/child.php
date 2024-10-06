<?php
    include_once "../config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child's Wear</title>
    
    <style>
       body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Navigation Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #302252;
            color: white;
        }

        .logo img {
            width: 50px;
            height: 50px;
        }

        .search-bar input {
            width: 300px;
            padding: 5px;
            font-size: 16px;
            border-radius: 20px;
            border: none;
        }

        .auth-buttons a, .auth-buttons button {
          margin-left: 10px;
          padding: 8px 15px;
          background-color: #747474;
          color: white;
          border: none;
          text-decoration: none;
          cursor: pointer;
          font-size: 16px; 
          font-family: Arial, sans-serif; 
        }

        .auth-buttons a:hover, .auth-buttons button:hover {
            background-color: #313131;
        }

        .nav-links {
            display: flex;
            justify-content: center;
            background-color: rgba(163, 151, 151, 0.8);
            padding: 10px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            margin: 0 5px;
        }

        .nav-links a:hover {
            background-color: #555;
            border-radius: 4px;
        }

        /* Main Content */
        h1 {
            text-align: center;
            margin-top: 20px;
        }

        hr {
            margin: 20px 0;
            color: rgb(247, 250, 247);
        }

        .women_w {
            display: grid; /* Use grid layout */
            grid-template-columns: 1fr 1fr 1fr 1fr; /* Four columns */
            column-gap: 20px; /* Space between columns */
            row-gap: 50px; /* Space between rows */
            padding: 20px; /* Add padding for the grid */
        }

        .product02 {
            border: 0px solid black;
            background-color: rgba(224, 219, 219, 0.5);
            text-align: center;
        }

        .product02 img {
            width: 80%; /* Set width to 80% */
            height: 340px; /* Fixed height */
            transition: 1s; /* Transition for hover effect */
            margin-top: 17px; /* Margin on top of the image */
        }

        .product02 img:hover {
            transform: scale(1.1); /* Zoom effect on hover */
            z-index: 1; /* Bring image to front on hover */
        }

        p, h3 {
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: bolder;
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }

        .buttonAdd {
            display: block;
            margin: 20px auto;
            background-color: #17a2b8; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            text-align: center;
        }

        .buttonAdd:hover {
            background-color: #138496;
        }

        /* Footer Styles */
        footer {
            background-color: #302252;
            color: #fff;
            padding: 20px;
            margin-top: 20px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap;
        }

        .footer-logo img {
            max-width: 150px;
            height: auto;
        }

        .footer-nav ul,
        .footer-social ul {
            list-style-type: none;
            padding: 0;
        }

        .footer-nav ul li,
        .footer-social ul li {
            margin-bottom: 10px;
        }

        .footer-nav ul li a,
        .footer-social ul li a {
            color: #fff;
            text-decoration: none;
        }

        .footer-social p {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .footer-location {
            max-width: 200px;
        }

        .footer-location address {
            line-height: 1.6;
        }

        /* Responsive Design for Footer */
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .footer-logo,
            .footer-nav,
            .footer-social,
            .footer-location {
                margin-bottom: 20px;
            }

            .nav-links {
                flex-direction: column;
                padding: 10px 0;
            }

            .nav-links a {
                padding: 10px 15px;
            }

            .women_w {
                grid-template-columns: 1fr 1fr; /* Change to two columns on smaller screens */
            }

            .product02 img {
                width: 100%; /* Full width on smaller screens */
                height: auto; /* Adjust height automatically */
                margin-left: 0; /* Remove left margin */
            }
        }

    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar">
        <div class="logo">
            <img src="H:/My folders/SLIIT/1st Year/IWT/Assignment/Web Page/indexImages/logo-search-grid-1x.png" alt="Logo">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="auth-buttons">
            <a href="../sign_in.html">Sign In</a>
            <button>Log In</button>
        </div>
    </nav>

    <!-- Navigation Links -->
    <div class="nav-links">
        <a href="index.html">Home</a>
        <a href="../textile.html">Textile</a>
        <a href="garment.html">Garment</a>
        <a href="feedback.html">Feedback</a>
        <a href="../about_us.html">About Us</a>
    </div>
   
    <h1>Child's Wear</h1>
    <hr><br>
    
    <div class="women_w">
        <?php
        $sql = "SELECT * FROM childitem";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                echo '<div class="product02">
                        <a href="#">
                            <img src="' . htmlspecialchars($row['img']) .'">
                            <p>' . htmlspecialchars($row['name']) . '</p>
                        </a>
                        <h3>Rs ' . htmlspecialchars($row['price']) . '/= </h3>
                    </div>';
            }
        } else {
            echo '<p>No items found.</p>';
        }
        ?>
    </div>

    <div style="margin-top: 20px;">
        <button class="buttonAdd" onclick="window.location.href='addChild.php'">Add New Child's Wear</button>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="H:/My folders/SLIIT/1st Year/IWT/Assignment/Web Page/indexImages/logo-search-grid-1x.png" alt="Logo">
            </div>
            <div class="footer-nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Branches</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <p>Follow Us On:</p>
                <ul>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">TikTok</a></li>
                    <li><a href="#">Google</a></li>
                    <li><a href="#">Telegram</a></li>
                </ul>
            </div>
            <div class="footer-location">
                <p>Our Location:</p>
                <address>
                    123 Ceylon Textile & Garment,<br>
                    Colombo,<br>
                    Sri Lanka
                </address>
            </div>
        </div>
    </footer>

</body>
</html>
