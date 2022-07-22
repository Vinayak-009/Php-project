<?php

@include 'config.php';
error_reporting (0);

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }
  
   if(empty($email)) {
      $error[] = 'enter email!';
    }else{
      $email = $_POST ["email"];  
if (!preg_match ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email) ){  
  $error[] = "Email is not valid.";  
          
} 
    }
    if(empty($pass)) {
      $error[] = 'enter password';
    }
    
    
    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
  

</head>
<body>
<link rel="stylesheet" href="logiin.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   
    
   <div class="register">
     <h2>LOGIN</h2><br>
     <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
     <form action="" method="post" >
       
       <div class="input-box" name = email >
         <input type="text" name = email placeholder="Enter your email" >
       </div>
       <div class="input-box" name = password >
         <input type="password" name = password placeholder="Enter password" >
       </div>

        
       <div class="input-box button">
       <!-- <input type="submit"  name="submit" value="login now" style="width: 204px;"  > -->
   
   <!-- <div class="signup-link">Not a member? <a href="register_form.php">Signup now</a></div> -->
         <input type="Submit" name = "submit" value="Login">
   </div>
       

   </form>

       
        <center>  <p>     Not a member?  <a href="register_form.php">sign up now</a>  </p> </center>
  

      
       

    
       
   


</body>
</html>
