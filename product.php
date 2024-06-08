
<?php
include 'conn.php';
$conn=OpenCon();
session_start();
$usr=$_SESSION['userID'];
if(! $conn ) 
{
 die('Could not connect: ' . mysql_error());
}

$sql = "SELECT * from cart";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
	//echo $rowcount;
}
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

    <section class="products">
        <h2 >Our Products</h2>
		 <a href="checkOut.php?id=<?php echo $usr;?>"><img src="basket.png" width="40px" height="40px" /></a>
	
	<input type="text"  name="nbr" style="width:40px" id="nbr" readonly value="<?php echo $rowcount;?>"/> 
	
    </section>
<form name="frm" action="addToCart.php" method="post">	
   
   <div class="container">
        <!-- Medical Equipment -->

        <div class="product">
            <div class="product-details">
                <img src="accuray-QTP8UKW_PgI-unsplash.jpg" alt="X-Ray Machine Image" width="300">
                <h2>X-Ray Machine</h2>
                <p>High-quality X-ray machine for accurate diagnostic imaging.</p>
                <div class="price">15000 OMR</div>
				<input type="number" name="qty" id="qty" value="1" class="qty"/>

            <div class="product-image">
                <input type="submit" class="button" value="Buy Now" name="add" />

            </div>
        </div>
    </div>

        <div class="product">
            <div class="product-details">
                <img src="blood.PNG" alt="Blood Analysis Machine Image" width="300">
                <h2>Blood Analysis Machine</h2>
                <p>Advanced blood analysis machine for comprehensive patient testing.</p>
                <div class="price">2500 OMR</div>
           <input type="number" name="qty1" id="qty1" value="1" class="qty"/>

            <div class="product-image">
                <input type="submit" class="button" value="Buy Now" name="add1" />

            </div>
        </div>
        </div>

       <!-- Robotic Devices -->

       <div class="product">
        <div class="product-details">
        <img src="Picture2.jpg" alt="Robotic Devices Image" width="300">
        <h2>Robotic Devices</h2>
        <p>State-of-the-art robotic devices to assist with surgical procedures.</p>
        <div class="price">300000 OMR</div>
       <input type="number" name="qty2" id="qty2" value="1" class="qty"/>

            <div class="product-image">
                <input type="submit" class="button" value="Buy Now" name="add2" />

            </div>
    </div>
</div>

<div class="product">
    <div class="product-details">
    <img src="Picture1.jpg" alt="Wheelchair" width="300">
    <h2>Wheel Chair</h2>
    <p>A wheelchair is a mobility device with wheels, used by people who have difficulty walking due to illness, injury, or disability. It provides support and mobility for individuals who are unable to walk independently. </p>
    <div class="price">30 OMR</div>
   <input type="number" name="qty3" id="qty3" value="1" class="qty"/>

            <div class="product-image">
                <input type="submit" class="button" value="Buy Now" name="add3" />

            </div>
</div>
</div>



<div class="product">
    <div class="product-details">
    <img src="Picture3.jpg" alt="SIUI Apogee 3800 Omni Ultrasound System" width="300">
    <h2>SIUI Apogee 3800 Omni Ultrasound System</h2>
    <p>The SIUI Apogee 3800 Omni ultrasound system is a cutting-edge medical imaging device designed for high-quality diagnostic imaging in various medical applications. </p>
    <div class="price">25000 OMR</div>
    <input type="number" name="qty4" id="qty" value="1" class="qty"/>

            <div class="product-image">
                <input type="submit" class="button" value="Buy Now" name="add4" />

            </div>
</div>
</div>

<div class="product">
    <div class="product-details">
    <img src="Picture4.jpg" alt="Pressure Device" width="300">
    <h2>Pressure Device</h2>
    <p>Pressure devices come in different types, including mechanical, electronic, and digital, each with its own set of features and capabilities.. </p>
    <div class="price">100 OMR</div>
    <input type="number" name="qty5" id="qty5" value="1" class="qty"/>

            <div class="product-image">
                <input type="submit" class="button" value="Buy Now" name="add5" />

            </div>
</div>
</div>
        </div>
    


</form>
	
	<footer>
        <p>&copy; 2024 MEDCO CARE. All rights reserved.</p>
    </footer>
</body>
</html>