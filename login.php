<?php
  $connect=mysqli_connect('localhost','root','','WeBuy') or die("Connection Failed");
  if(!empty($_POST['continue']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query=$connect->query("SELECT password FROM create_account WHERE email='$email'");
    $hashed_password=$query->fetch_assoc()['password'];
    
    if(!password_verify($password, $hashed_password))
    {
      ?>
      <script type="text/javascript">
       alert("Entered Email Or Password Is Incorrect"); 
       window.location.href ="login.html";
      </script>
      
      <?php
      
    }
    else
    {
      header("Location: home.html");
    }
  }
?>