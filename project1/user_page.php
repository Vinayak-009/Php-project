<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="my.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="center">
    <!-- <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1> -->
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <form method="post">
        <div class="m-4">
          <!-- <nav class="nav nav-tabs">
              <a style="color: blue;" href="#" class="nav-item nav-link active">Open</a>
              <a style="color: blue;" href="my1.html" class="nav-item nav-link">Closed</a>
            </nav> -->
        </div><br>
        <div><table>
          <tr>
          <th>name</th>
          <th>email</th>
          <th>Phone_number</th>
          <th>roll_number</th>
          
          </tr>
          <?php 

  require_once('config.php');
  if(isset($_GET['page']))
  {
      $page = $_GET['page'];
  }
  else
  {
      $page = 1;
  }

  $num_per_page = 15;
  $start_from = ($page-1)*15;
  
  $query = "SELECT * FROM user_form limit $start_from,$num_per_page";
  $result = mysqli_query($conn,$query);



?>
<?php 
                    while($row=mysqli_fetch_assoc($result))
                    {
                ?>
                    <td> <?php echo $row['name'] ?> </td>
                    <td> <?php echo $row['email'] ?> </td>
                    <td> <?php echo $row['phone_number'] ?> </td>
                    <td> <?php echo $row['roll_number'] ?> </td>
                    
                    
                   
            </tr>
              <?php
                    }
               ?>
          
         
      
      </table></div> <br> <br>
        <?php
            $pr_query = "SELECT * FROM user_form ";
            $pr_result = mysqli_query($conn,$pr_query);
            $total_record = mysqli_num_rows($pr_result );

            $total_page = ceil($total_record/$num_per_page);
            if($page>1)
            {
                echo "<a href='user_page.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
            }

            
            for($i=1;$i<$total_page;$i++)
            {
                echo "<a href='user_page.php?page=".$i."' class='btn btn-primary'>$i</a>";
            }

            if($i>$page)
            {
                echo "<a href='user_page.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
            }
    
            
            ?>
            </form>
        </div>
        </body>
        </html>
    
    