 
<?php
$usr=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Health IT Solutions</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <header>
        <img src="Logo_Medco-Medical-Care.png" />
        <nav>
            <ul>
			
                
   <li>
  <a class="active" href="allListOrders.php?id=<?php echo $usr;?>">List Orders</a> 
  </li>
           
		   </ul>
        </nav>
  
    </header>
	
<?php 

echo"<h3 style='color:#333'><a href='logOut.php'><img src='icon.png'/></a> \t \t" .$usr;
echo"</h3>";
?>


 <div class="container">
	
	<p style=" text-align:justifier;font-size:28px; margin:35px; font-weight:bold;" >
	
 All List Orders
	
	</p>
<p>
  <?php
	include 'conn.php';
$conn=OpenCon();
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}

	
$sql = "SELECT * FROM orders where customerID='$usr'";

 $retval = mysqli_query( $conn,$sql);
 
if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
}

echo"<table collspacing='0' cellspacing='0' border='1px' >";
echo"<tr>";
   echo"<td>ID</td>";
   echo"<td>Details</td>";
   echo"<td>Order Date </td>";
   echo"<td>Total Amount(OMR)</td>";
   echo"<td>Pay Method</td>";
    echo"<td>Customer ID</td>";
	echo"<td>Order Status</td>";
	echo"<td>Cancel order</td>";
    echo"</tr>";
								
while($record=mysqli_fetch_array($retval))
{
     $field1=$record['ordersID'];
	 $field2=$record['productDetails'];
	 $field3=$record['orderDate'];
	 $field4=$record['totalPrice'];
	 $field5=$record['payMethod'];
	 $field6=$record['customerID'];
	 $field7=$record['orderStatus']; 
  echo"<tr>";
   echo"<td>".$field1."</td>";
   echo"<td>".$field2."</td>";
   echo"<td>".$field3."</td>";
   echo"<td>".$field4."</td>";
   echo"<td>".$field5."</td>";
    echo"<td>".$field6."</td>";
	 echo"<td>".$field7."</td>";
echo"<td>"." <a  href=customer-order-delete.php?id=".$field1."&usr=".$usr."> <img src='del.png'/> </a>"."</td>";
    echo"</tr>";
	
}	
 
echo"</table>";
?>

</p>
</div>
		
  </body>
</html>