  <?php
include 'conn.php';
$conn=OpenCon();
$productID=$_GET['id'];
$customerID=$_GET['usr'];

//echo $itemId,$userID;

mysqli_query($conn,"delete from  orders where ordersID=$productID " );
 header("location:allListOrders.php?id=".$customerID."");

?>