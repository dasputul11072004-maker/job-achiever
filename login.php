<?php
include "config.php";
$error = "";
if(isset($_POST["login"])){
 $username=$_POST["username"]??"";
    $password=$_POST["password"]??"";

    if($username==""||$password==""){
        $$error="username and password required";
    }
   else{
    $sql = "SELECT* FROM adminss WHERE username = '$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result) > 0){
        $_SESSION['adminss_user'] = $username;
        header("Location: index.php");
    } else {
        $error = "Invalid Email or Password!";
    }

 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background-image: url('wb.avif');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="container  d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="row">
            <div class="col">
                <div class="card p-4 shadow" style="width:350px;">
                    <div class="card-body">
                        <h4 class="text-center mb-3">LOGIN</h4>
                        <?php if($error){?>
                            <div class="alart alart-danger"><?php echo $error;?> </div>
                        <?php } ?>

                        <form method="POST">
                            <input type="username" name="username" class="form-control mb-2" placeholder="username" required>

                            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                             <button type="submit" name="login" class="btn btn-primary w-100">Login</button>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>