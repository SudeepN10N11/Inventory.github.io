<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password==$row['password']) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        echo "<script>alert('No user found');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background: url('images/login1.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh; /* Ensure full height of viewport */
            overflow: hidden; /* Prevent scrolling on small screens */
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for login form */
            padding: 20px;
            border-radius: 10px;
            margin-top: 100px; /* Adjust as needed for vertical centering */
        }
        .form-group {
            margin-bottom: 20px; /* Spacing between form elements */
        }
        .btn-primary {
            width: 100%; /* Full-width button */
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="mt-5">Login</h2>
    <form method="POST" action="login.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
