<?php
session_start();
include "config.php";

$msg = "";
$error = "";

if(isset($_POST['signup'])){
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";

    // Validation
    if($username == "" || $password == ""){
        $error = "All fields are required!";
    }
    else{
        // Check if user already exists
        $check = mysqli_query($conn, "SELECT * FROM adminss WHERE username='$username'");

        if(mysqli_num_rows($check) > 0){
            $error = "Username already exists!";
        }
        else{
            // Insert user
            $sql = "INSERT INTO adminss (username, password) VALUES ('$username', '$password')";
            
            if(mysqli_query($conn, $sql)){
                $msg = "Signup successful! You can login now.";
            } else {
                $error = "Something went wrong!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('wb.avif');
            background-size: cover;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card p-4 shadow" style="width:350px;">
        <h4 class="text-center mb-3">SIGN UP</h4>

        <?php if($msg){ ?>
            <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>

        <?php if($error){ ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <form method="POST">
            <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button type="submit" name="signup" class="btn btn-success w-100">Sign Up</button>
        </form>

        <br>
        <p class="text-center">
            Already have an account? <a href="login.php">Login</a>
        </p>
    </div>
</div>

</body>
</html>