<?php

@include 'connection/connect.php';

session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";

   $result = mysqli_query($con, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin/adminsite.php');
         exit;
      } elseif ($row['user_type'] == 'user') {
         $_SESSION['user_name'] = $row['name'];
         header('location:user/usersite.php');
         exit;
      }

   } else {
      $error[] = 'Email hoặc mật khẩu không đúng!';
   }
}
if (isset($error)) {
    foreach ($error as $err) {
        echo '<p style="color:red;">' . $err . '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <title>Login form</title>

</head>
<body>
   
<div class="form position-absolute top-50 start-50 translate-middle">

   <form action="" method="post">
      <h1>Login now</h1>
      <br>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="form-outline mb-4">
        <input type="email" name="email" required placeholder="Enter your email" class="form-control">
      </div>
      <div class="form-outline mb-4">
        <input type="password" name="password" required placeholder="enter your password" class="form-control">
      </div>
      
      <input type="submit" name="submit" value="login now" class="btn btn-primary btn-block mb-4">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>

</body>
</html>