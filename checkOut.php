


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
                <li><a href="Home page.html">Home</a></li>
                <li><a href="About us.html">About Us</a></li>
                <li><a href="product.html">Products</a></li>
                <li><a href="Blog of healt.html">Blog of Health</a></li>
                <li><a href="Contact.html">Contact</a></li>
                <li><a href="IT Solution.html">IT Solutions</a></li>
            </ul>
        </nav>
  
    </header>
	
	  <?php 
session_start();
$usr=$_SESSION['userID'];
echo"<h3 style='color:#333'><a href='logOut.php'><img src='person-icon.png'/></a> \t \t" .$usr;
echo"</h3>";
?>
  
 <div class="container">
        

 <?php
include 'conn.php';
$conn=OpenCon();
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}
	
$sql = 'SELECT * FROM cart';

$total=0;
$result = mysqli_query($conn,'SELECT sum(total) as total FROM cart');
$retval = mysqli_query( $conn,$sql);
 
while ($rows = mysqli_fetch_array($result)) 
{
	$total= $rows['total'];
		
}

echo"<table collspacing='5' cellspacing='5' border='0px' style='font-size:medium; color: blue' >";
echo"<tr>";
   echo"<td>ID</td>";
   echo"<td>Item ID</td>";
   echo"<td>Item Name</td>";
   echo"<td>Price (OMR)</td>";
   echo"<td>Qty</td>";
    echo"<td>Total</td>";
	echo"<td>Delete</td>";
    echo"</tr>";
$product_details="";
$dat=date("Y-m-d H:i:s");	
	
while($record=mysqli_fetch_array($retval))
{
     $field1=$record['id'];
	 $field2=$record['item_id'];
	 $field3=$record['item_name'];
	 $field4=$record['price'];
	 $field5=$record['qty'];
	 $field6=$record['total'];
$product_details.="\n Product Name \n:".$field3."\n Qty \n:".$field5."\n Price\n:".$field4."/";	 
  
  echo"<tr>";
   echo"<td>".$field1."</td>";
   echo"<td>".$field2."</td>";
   echo"<td>".$field3."</td>";
   echo"<td>".$field4."</td>";
   echo"<td>".$field5."</td>";
    echo"<td>".$field6."</td>";
echo"<td>"." <a  href=cart-item-delete.php?id=".$field1."&usr=".$usr."> <img src='del.png'/> </a>"."</td>";
    echo"</tr>";
	
}	
echo"<tr>";
   echo"<td >Total Price (OMR)</td>";
   echo"<td colspan='5'>".$total."</td>";
  echo"</tr>"; 
echo"</table>";
?>

</div>
  <div class="container">

<form name="frm" method="post" action="add_order.php">

  <div class="form-group">
                <label for="payment">Payment Method:</label>
                <select id="payment" name="payment" required>
                    <option value="cash">Cash</option>
                    <option value="visa">Visa (coming soon)</option>
                </select>
            </div>
<input type="hidden" name="total" value="<?php echo $total;?>" /> 
<input type="hidden" name="date_order" value="<?php echo $dat;?>" />
<input type="hidden" name="prod_details" value="<?php echo $product_details;?>" />
<input type="hidden" name="customerID" value="<?php echo $usr;?>" />
<br/>
<br/>
<p>

   <button type="submit" name="add" style="width:150px;background-color:green;color:white">Submit Order</button>

<button type="submit" name="add1" style="width:150px;background-color:gray;color:white">Add More </button>
<button type="submit" name="cancel" style="width:150px;background-color:red;color:white">Cancel</button>

</p>
</form>

</div>      
		
		
</form>
	
	<footer>
        <p>&copy; 2024 MEDCO CARE. All rights reserved.</p>
    </footer>
</body>
</html>