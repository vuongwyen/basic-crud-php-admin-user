<?php

@include 'connection/connect.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($con, $insert);
         header('location:index.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <title>register form</title>

</head>
<body>
   
<div class="form position-absolute top-50 start-50 translate-middle">

   <form action="" method="post">
      <h1>Register now</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="form-outline mb-4">
        <input type="name" name="name" required placeholder="enter your name" class="form-control">
      </div>
      <div class="form-outline mb-4">
        <input type="email" name="email" required placeholder="enter your email" class="form-control">
      </div>
      <div class="form-outline mb-4">
        <input type="password" name="password" required placeholder="enter your password" class="form-control">
      </div>
      <div class="form-outline mb-4">
        <input type="password" name="cpassword" required placeholder="confirm your password" class="form-control">
      </div>
      <div class="form-outline mb-4">
        <select name="user_type" class="form-control">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      </div>
      <input type="submit" name="submit" value="register now" class="btn btn-primary btn-block mb-4">
      <p>already have an account? <a href="index.php">login now</a></p>
   </form>

</div>

</body>
</html>