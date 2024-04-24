<?php
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $enc_pass=password_hash($password, PASSWORD_DEFAULT);
  $conn=new mysqli('localhost','root','','webuy');
  $query="select * from create_account where email='$email'";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
  if($count>0)
  {
    ?>
      <script type="text/javascript">
       alert("Account already exists with this Email ID"); 
       window.location.href ="create account.html";
      </script>
      
      <?php
  }
  else{
    $stmt=$conn->prepare("insert into create_account(name, mobile, email, password)values(?, ?, ?, ?)");
    $stmt->bind_param("siss",$name, $mobile, $email, $enc_pass);
    $stmt->execute();
    header("Location: login.html");
    $stmt->close();
    $conn->close();
  }
?>