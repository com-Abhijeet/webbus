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
                <li><a href="index.html">Home</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="signup.html">Sign Up</a></li>
            </ul>
        </div>

    </div>
    <div class="container">
        <h1>Register</h1><br>

        <form action="" method="post">
            <label for="name">Name</label>
            <input name="name" type="text" placeholder="Enter Username"><br>
            <label for="phone-number">phone number</label>
            <input name="phone-number" type="text" placeholder="Enter phone number"><br>
            <label for="email">email</label>
            <input name="email" type="email" placeholder="Enter Email"><br>
            <label for="username">UserName</label>
            <input name="username" type="text" placeholder="Enter Username"><br>
            <label for="password">Password</label>
            <input name="password" type="Password" placeholder="Enter Password"><br>
            <label for="cnf-pwd">Password</label>
            <input name="cnf-pwd" type="Password" placeholder="Re-Enter Password"><br>
            <a href="" class="hv-acc">Already have a account ? Login</a>
            
            <button class="btn1" type="submit">register</button>
        </form>

    </div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create database connection
    $servername = "localhost";  // Replace with your server name
    $username = "root";  // Replace with your SQL username
    $password = "";  // Replace with your SQL password
    $dbname = "acebusDB";  // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve values from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username2 = $_POST['username'];
    $repeat_password = $_POST['cnf-pwd'];

    // Check if username or email already exists
    $check_user = "SELECT * FROM users WHERE username = '$username2' OR email = '$email'";
    $result = $conn->query($check_user);

    if ($result->num_rows != 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Username or email already exists")';  //not showing an alert box.
        echo '</script>';
        // echo "Username or email already exists";
    } else {
        // Check if password matches repeat password
        if ($password != $repeat_password) {
            // echo "Passwords do not match";
            echo '<script type="text/javascript">';
            echo ' alert("Passwords do not match!   ")';  //not showing an alert box.
            echo '</script>';
            
        } else {
            // Insert values into database
            $sql = "INSERT INTO users (Name,username ,email, password) VALUES ('$name','$username2', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo '<script type="text/javascript">';
                echo ' alert("User Successfully Registerd   ")';  //not showing an alert box.
                echo '</script>';
                header("login.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
}
?>