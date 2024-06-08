
	<div class="dvx">
	
	<p style=" text-align:justifier;font-size:28px; margin:35px; font-weight:bold;" >
	
 Checkout
	
	</p>
<p>

  <?php
	include 'conn.php';
$conn=OpenCon();
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}
	
$sql = 'SELECT * FROM cart';

 mysqli_select_db($conn,'ecowater_saver');
 $retval = mysqli_query( $conn,$sql);
 
if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
}
$total=0;
$result = mysqli_query($conn,'SELECT sum(total) as total FROM cart');
while ($rows = mysqli_fetch_array($result)) 
{
	$total= $rows['total'];
		
}
mysqli_close($conn);

echo"<table collspacing='0' cellspacing='0' border='1px' >";
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
echo"<td>"." <a  href=cart-item-delete.php?id=".$field1."&usr=".$userID."> <img src='img\del.png'/> </a>"."</td>";
    echo"</tr>";
	
}	
echo"<tr>";
   echo"<td >Total Price (OMR)</td>";
   echo"<td colspan='5'>".$total."</td>";
  echo"</tr>"; 
echo"</table>";
?>

<p style=" text-align:justifier;font-size:16px;" >
	
Payment method : <br>
<form name="frm" method="post" action="add_order.php">

By Card	<input type="radio" name="r" id="r1" value="visa"/> <img src="img\visa.png"/><br>
By Cash	<input type="radio" name="r" id="r2" value="cash" /><img src="img\cash.png"/>
<input type="hidden" name="total" value="<?php echo $total;?>" /> 
<input type="hidden" name="date_order" value="<?php echo $dat;?>" />
<input type="hidden" name="prod_details" value="<?php echo $product_details;?>" />
<input type="hidden" name="customerID" value="<?php echo $userID;?>" />
<br/>
<br/>

<input type='submit' name='add' class="btn btn-default" value='Place Order'/>
<input type='submit' name='add1' class="btn btn-default" value='Continue'/>
<input type='submit' name='cancel' class="btn btn-default" value='Cancel'/>

</form>
</p>
	
</p>
</div>
	
	
	
  </body>
</html>