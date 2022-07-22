

<?php

@include 'config.php';
// error_reporting (0);

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $phone_number = ($_POST['phone_number']);
   $roll_number =  mysqli_real_escape_string($conn,$_POST['roll_number']);
  //  $pass_check = password_verify($pass );


   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' && name = '$name' && user_type = '$user_type' && phone_number = '$phone_number' ";

   $result = mysqli_query($conn, $select);

 
 if(empty($name))
 {
  $error[] = "Enter your fullname !";
   }
 {if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
      $error[] = "Only alphabets and whitespace are allowed.";  
                   
    }
          
 }
  
if(empty($email))
 {
  $error[] = "Enter your email !";
   }
 if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $error[] = "Enter valid email id !";
   }
 if(empty($pass))
 {
  $error[] = "Enter your password";
  
 }

 if($cpass!=$pass)
 {
  $error[] = "Password and Confirm Password doesnot match";
   }
  if(empty($phone_number))
 {
  $error[] = "Enter your mobile number !";
   }
 if(!is_numeric($phone_number))
 {
  $error[] = "Mobile number must be numeric only!";
  $code = 2;
 }
  if(strlen($phone_number)!=10)
 {
  $error[] = "Mobile nuber should be 10 digit only!";

 }
else{
//Checking emailid and mobile number if already registered
$ret=mysqli_query($conn, "SELECT roll_number from user_form where email='$email' || password='$pass'");
$result=mysqli_fetch_array($ret);
if($result>0){


 $error[]= ('This email already associated with another account');
}
else{
$query=mysqli_query($conn,"insert into user_form(name,email,Password,user_type,phone_number,roll_number) values('$name','$email','$pass','$user_type','$phone_number','$roll_number')");
if($query){

header('location:login_form.php');
} else {
echo ('Something went wrong. Please try again.');

}
}
}
}

  

?>


   



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
</head>

<body>
   <link rel="stylesheet" href="register.css">
   


    
   <div class="register">
     <h2>Registration</h2><br>
     <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
   
     <form action="" method="post" >
       <div class="input-box"   name = name >
         <input type="text" name = name placeholder="Enter your name"  >
       </div>
       <div class="input-box" name = email >
         <input type="text" name = email placeholder="Enter your email"   >
       </div>
       <div class="input-box" name = password >
         <input type="password" name = password placeholder="Create password"  >
       </div>
       <div class="input-box" name = cpassword >
         <input type="password" name = cpassword placeholder="Confirm password"   >
       </div>
       <div>
       <select name="user_type">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
       </div>
       <div class="input-box" name = phone_number >
         <input type="number" name =phone_number placeholder="Enter your Number" >
       </div>
       <div class="input-box" name = roll_number >
         <input type="number" name = roll_number placeholder="Enter your Roll Number" >
       </div>
       
       
      
       
       <div class="input-box button">
         <input type="Submit" name = "submit" value="Register Now">
       </div>
      
       <!-- <input type="submit" name="submit" value="register now" class="input-box button"> -->
      <p>already have an account? <a href="login_form.php">login now</a></p>
         <!-- <h3>Already have an account? <a href="login_form.php">Login now</a></h3> -->
       
     </form>
   </div>





</body>
</html>