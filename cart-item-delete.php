
<?php
include 'conn.php';
$conn=OpenCon();
$itemId=$_GET['id'];
$userID=$_GET['usr'];
//echo $itemId;

mysqli_query($conn,"delete from  cart where id='$itemId'" );
 header("location:checkOut.php?id=".$userID."");

?>