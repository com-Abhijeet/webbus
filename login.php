<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="signup.html">Sign Up</a></li>
            </ul>
        </div>

    </div>
    <div class="container">
        <h1>Login</h1><br>

        <form action="" method="post">
            <label for="username">Username</label>
            <input name="username" type="text" placeholder="Enter Username"><br>
            <label for="password">Password</label>
            <input name="password" type="Password" placeholder="Enter Password"><br>
            <a href="forgot.html" class="fgt-pwd-l">Forgot Password? </a><br>
            <button class="btn1" type="submit" onclick="">Login</button>
        </form>

    </div>
</body>
</html>
<?php
  session_start();
  require_once('connect.php');


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to validate user credentials
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Set session variables
        $_SESSION["username"] = $username;
        $_SESSION["loggedin"] = true;
        header("location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid login credentials. Please try again.');</script>";
    }
    
    }
$conn->close();

?>