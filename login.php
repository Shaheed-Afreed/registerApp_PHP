<?php
include 'connection.php';
if(isset($_POST['submit']))
{
$username=mysqli_real_escape_string($connection,$_POST['username']);
$password=mysqli_real_escape_string($connection,$_POST['password']);

$sql="select *from users where username ='$username' or email='$username'";
$result=mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);
if($row)
{
    if(password_verify($password,$row['password'])){
        header("location : welcome.php");
    }
}
else{
    echo '<script>
    alert("invalid username or password);
    window.location.href= "login.php";
    </script>';
}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include 'navbar.php';?>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
            <div class="card-header">
    <h1 style="text-align:center">Login</h1>
  </div>
  <div class="card-body">
  <form action="welcome.php" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">User Name/Email</label>
    <input type="text" class="form-control" name="username" >
   
  </div>
  
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter your Password ">
   
  </div>
  
  
  
  <input type="submit" class="btn btn-primary" value="Login" name="submit">
</form>
  </div>
</div>
        </div>

            </div>
        </div>
    </div>
</body>
</html>