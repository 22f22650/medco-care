
<?php

include 'conn.php';
$conn=OpenCon();
if(! $conn ) 
{
 die('Could not connect: ' . mysql_error());
}

if(isset($_POST['add']))

 {	  
   $qty= $_POST['qty'];
   $itemName= "X-Ray Machine";
   $itemID= 1;
   $price= 15000;
   $total= (int)$qty*$price; 
 
 $sql = "INSERT INTO cart(item_id,item_name,price,qty,total)VALUES('$itemID','$itemName','$price','$qty','$total')";
    
 $retval =mysqli_query($conn, $sql) ;
     header("location:product.php"); 
    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }
}
if(isset($_POST['add1']))

 {	  
   $qty1= $_POST['qty1'];
   $itemName= "Blood Analysis Machine";
   $itemID= 2;
   $price= 2500 ;
   $total= (int)$qty1*$price; 
 
 $sql = "INSERT INTO cart(item_id,item_name,price,qty,total)VALUES('$itemID','$itemName','$price','$qty1','$total')";
    
 $retval =mysqli_query($conn, $sql) ;
     header("location:product.php"); 
    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }
}
if(isset($_POST['add2']))

 {	  
   $qty2= $_POST['qty2'];
   $itemName= "Robotic Devices";
   $itemID= 3;
   $price= 300000 ;
   $total= (int)$qty2*$price; 
 
 $sql = "INSERT INTO cart(item_id,item_name,price,qty,total)VALUES('$itemID','$itemName','$price','$qty2','$total')";
    
 $retval =mysqli_query($conn, $sql) ;
     header("location:product.php"); 
    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }
}

if(isset($_POST['add3']))

 {	  
   $qty3= $_POST['qty3'];
   $itemName= "Wheel Chair";
   $itemID= 4;
   $price= 30;
   $total= (int)$qty3*$price; 
 
 $sql = "INSERT INTO cart(item_id,item_name,price,qty,total)VALUES('$itemID','$itemName','$price','$qty3','$total')";
    
 $retval =mysqli_query($conn, $sql) ;
     header("location:product.php"); 
    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }
	
 }
	
	if(isset($_POST['add4']))

 {	  
   $qty3= $_POST['qty4'];
   $itemName= "SIUI Apogee 3800 Omni Ultrasound System";
   $itemID= 5;
   $price= 25000 ;
   $total= (int)$qty3*$price; 
 
 $sql = "INSERT INTO cart(item_id,item_name,price,qty,total)VALUES('$itemID','$itemName','$price','$qty3','$total')";
    
 $retval =mysqli_query($conn, $sql) ;
     header("location:product.php"); 
    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }
	
}

if(isset($_POST['add5']))

 {	  
   $qty3= $_POST['qty5'];
   $itemName= "Pressure Device";
   $itemID= 6;
   $price= 100 ;
   $total= (int)$qty3*$price; 
 
 $sql = "INSERT INTO cart(item_id,item_name,price,qty,total)VALUES('$itemID','$itemName','$price','$qty3','$total')";
    
 $retval =mysqli_query($conn, $sql) ;
     header("location:product.php"); 
    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }
	
}
?>
