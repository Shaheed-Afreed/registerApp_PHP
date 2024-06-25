<?php
include 'connection.php';
if(isset($_POST['submit']))
{

    $username=mysqli_real_escape_string ($connection,$_POST['username']);
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $con_password=mysqli_real_escape_string($connection,$_POST['con_password']);

    $sql = "SELECT * FROM users WHERE username='$username'";
   
    $result=mysqli_query($connection,$sql);
    $count_user=mysqli_num_rows($result);

    $sql="SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection,$sql);
    $count_email= mysqli_num_rows($result);
    
    if($count_user==0||$count_email==0)
    {
        if($password==$con_password)
        {
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $sql="insert into users  (username,email,password) values ('$username','$email','$hash')";
            $result=mysqli_query($connection,$sql);
        }
        else
        {
            echo '<script>
            alert("password does not match");
            window.location.href ="register.php";
            </script>';
        }

    }
    else{
        echo '<script>
        alert("your email is already exits");
        window.location.href="index.php";
        </script>';
    
    }


}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include 'navbar.php';?>
    
<div class="container">
    <div class="row">
        <div class="col-md-9">
        <div class="card">
  <div class="card-header">
    <h1 style="text-align:center">Register</h1>
  </div>
  <div class="card-body">
  <form action="register.php" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input type="text" class="form-control" name="username" placeholder="Enter your User Name ">
   
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter your Email ID ">
   
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter your Password ">
   
  </div>
  <div class="mb-3">
    <label for="con_password" class="form-label"> Confirm Password</label>
    <input type="password" class="form-control" name="con_password" placeholder="Enter Confirm  Password ">
   
  </div>
  
  
  <input type="submit" id="btn" class="btn btn-primary" name="submit" value="signup">
</form>
  </div>
</div>
        </div>
    </div>
</div>
</body>
</html>