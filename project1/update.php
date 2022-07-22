<?php
include ("config.php");
error_reporting (0);
$rn = $_GET ['rn'];
$fn = $_GET ['fn'];
$em = $_GET ['em'];
$pn = $_GET ['pn'];
$ut = $_GET ['ut'];
?>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
   
</head>
<body>
     
   <div class="register">
     <h2>Registration</h2>
     <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
     
     <form action="" method="post" >
       <div class="input-box"   name = name >
         <input type="text" value="<?php echo "$fn" ?>" name = name placeholder="Enter your name" required>
       </div>
       <div class="input-box" name = email >
         <input type="text"  value="<?php echo "$em" ?>" name = email placeholder="Enter your email" required>
       </div>
      
       
       
       <div class="input-box" name = phone_number >
         <input type="number" value="<?php echo "$pn" ?>" name = phone_number placeholder="Enter your Number" required>
       </div>
       <div class="input-box" name = roll_number >
         <input type="number" value="<?php echo "$rn" ?>" name = roll_number placeholder="Enter your Roll Number" required>
       </div>
       <div>
       <select name="user_type" value="<?php echo "$ut" ?>"  >
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
       </div>

       <div class="input-box button">
         <input type="Submit" name = "submit" value="update">
       </div><br>

       


        
          
      </form>
      
   
  </div>
</body>
</html>
<?php
if ($_POST['submit'])
{
  $name =$_POST['name'];
  $email =$_POST['email'];
  $phone_number =$_POST['phone_number'];
  $roll_number =$_POST['roll_number'];
  $user_type = $_POST['user_type'];
  $query ="UPDATE user_form SET name='$name', email='$email',phone_number='$phone_number',roll_number='$roll_number',user_type='$user_type' WHERE roll_number='$roll_number' ";
  $data =mysqli_query($conn,$query);
if($data)
{
  $error[] = "Record Updated!!.";
 ?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL= http://localhost/project1/admin_page.php  ">    
<?php
}
else 
{
  $error[]= 'Failed to Update Record';
}
}

?>