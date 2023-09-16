<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="index.html">Welcome  <?php echo $_SESSION["username"] ?></a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="signup.html">Sign Up</a></li>
            </ul>
        </div>

    </div>

    <div class="ind-container">
        <form action="" method="post">
            <h2>Search For a Bus to your next Destination</h2>
            <input type="text" name="srch-box" id="srch-box" placeholder="Search For a Bus">
        </form>
    </div>
</body>
</html>