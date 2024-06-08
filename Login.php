

<?php
include 'conn.php';
$conn=OpenCon();
 $valid = 1;
 $error_message="";
if (isset($_POST['login'])) {

    $user= $_POST['txtUser'];  
    $pass=$_POST['txtPass'];

if(empty($pass)) {
        $valid = 0;
        $error_message .= "Invalid Password"."<br>";
    }
    if(empty($user)) {
        $valid = 0;
        $error_message .= "Invalid User ID "."<br>";
    } 
	
	if ($user=="admin" && $pass=="admin" )
    
    {
        setcookie('User',$user,time()+60*60*7);
        setcookie('pass',$pass,time()+60*60*7);
        session_start();
        $_SESSION['userID']=$user;
        header("location: AdminSession.php");
    }else
	
      $sql="select username from customers where username='$user' and password='$pass' ";
       $result = mysqli_query($conn,$sql); 
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $count = mysqli_num_rows($result); 
       if($count == 1)
	   {
		setcookie('User',$user,time()+60*60*7);
        setcookie('pass',$pass,time()+60*60*7);
        session_start();
        $_SESSION['userID']=$user;
      header("location:product.php");
       }
       else{
  $error_message .= "Invalid Username  or password"."<br>";
}   
    
mysqli_close($conn);
		
	}
		
	?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medco Care - Login</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
      <header>
        <img src="Logo_Medco-Medical-Care.png" />
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="AboutUs.html">About Us</a></li>
            
                <li><a href="Blog-of-healt.html">Blog of Health</a></li>
                <li><a href="Contact.html">Contact</a></li>
                <li><a href="IT-Solution.html">IT Solutions</a></li>
            </ul>
        </nav>
    </header>
	<br>
	 <?php
         if($error_message != '') 
		 {
     echo "<div class='error' style='padding: 10px;margin-bottom:20px;color:red'>".$error_message."</div>";
          }
      ?>
    <div class="login-container">
        <h2>Medco Care - Login</h2>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="txtUser" >
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="txtPass" >
            </div>
            <button type="submit" name="login">Login</button>
            <p>Don't have an account? <a href="Register.php">Register here</a></p>
        </form>
    </div>
</body>
</html>