<?php
include ("config.php");
error_reporting (0);
$roll_number=$_GET['rn'];
$query = " DELETE FROM user_form WHERE roll_number ='$roll_number' ";
$data=mysqli_query($conn ,$query);
if($data)
{
    $error[] = 'Record Deleted From Database';

?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL= http://localhost/project1/admin_page.php  "> 
<?php
}
else
{
    echo "<font color='red'>Failed to Record From Database";
}
?>