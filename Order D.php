
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];

    // Assuming you want to store the order details in a database, you can add the code here
    // For demonstration purposes, I'm just displaying the collected data

    echo "<h2>Order Confirmation</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Phone Number:</strong> $phone</p>";
    echo "<p><strong>Delivery Address:</strong> $address</p>";
    echo "<p><strong>Payment Method:</strong> $payment</p>";

    // You can then redirect the user to a confirmation page or display a thank you message

}
?>