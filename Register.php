
<?php
include 'conn.php';
$conn=OpenCon();
 $valid = 1;
 $error_message="";
 
 if (isset($_POST['login'])) {
	
	echo "<script> window.location.href='Login.php'</script>";
 }
if (isset($_POST['signIn'])) {

    $username= $_POST['username'];
    $fullname= $_POST['fullname'];
    $email= $_POST['email'];
	$phone= $_POST['phone'];
    $address= $_POST['address'];
    $password=$_POST['password'];
	$re_password=$_POST['rePassword'];
   
 
    if(empty($fullname)) {
        $valid = 0;
        $error_message .= "Invalid Fullname Field"."<br>";
    }

if(empty($phone)) {
        $valid = 0;
        $error_message .= "Invalid phone Number Field"."<br>";
    }
	
if(empty($address)) {
        $valid = 0;
        $error_message .= "Invalid address Field"."<br>";
    }
    if(empty($username)) {
        $valid = 0;
        $error_message .= "Invalid Username "."<br>";
    } else {
            $sql="select username from customers where username='$username'";
       $result = mysqli_query($conn,$sql); 
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $count = mysqli_num_rows($result);                           
            if($count==1) {
                $valid = 0;
                $error_message .= " Username already Exists"."<br>";
            }
        }
    
    if( empty($password) || empty($re_password) ) {
        $valid = 0;
        $error_message .= "Password and re-password empty"."<br>";
    }

    if( !empty($password) && !empty($re_password) ) {
        if($password != $re_password) {
            $valid = 0;
            $error_message .= "Password and re-passord doesn't mutch"."<br>";
        }
    }

    if($valid == 1) {
		
		 $sql = "INSERT INTO customers(username,fullName,email,phone,address,password)VALUES('$username','$fullname','$email','$phone','$address','$password')";
   
    $retval =mysqli_query($conn, $sql) ;
    
    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }
   echo "<script>alert('Successfully Add new Customers !'); window.location.href='Login.php';</script>";
       
}
mysqli_close($conn);
		
	}
		
	?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <div class="logo-container">
        <img src="Logo_Medco-Medical-Care.png" alt="Medco Care Logo">
    </div>
	
	<br/>
	 <?php
         if($error_message != '') 
		 {
     echo "<div class='error' style='padding: 10px; font-size:small;margin-bottom:20px;color:red'>".$error_message."</div>";
          }
      ?>
	  <br/>
    <div class="container">
	
        <form action="" method="POST">
            <h2>Register</h2>
            <input type="text" name="username" placeholder="Username" >
			 <input type="text" name="fullname" placeholder="Fullname" >
            <input type="email" name="email" placeholder="Email" >
			 <input type="text" name="phone" placeholder="Phone" >
			  <input type="text" name="address" placeholder="Address" >
            <input type="password" name="password" placeholder="Password" >
			 <input type="password" name="rePassword" placeholder="Re-Password" >
     
            <button type="submit" name="signIn" >Register</button>
			<br/>
		  <button type="submit" name="login" >Cancel</button>
        </form>
    </div>
</body>
</html>