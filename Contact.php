<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Email configuration (optional)
    $to = "your_email@example.com"; // Enter your email address here
    $subject = "New message from Medco Care Contact Form";
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Send email (optional)
    // You can uncomment this section to enable email sending
    /*
    if (mail($to, $subject, $body)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again later.";
    }
    */

    // You can also store the form data in a database or perform any other action here

    // Redirect back to the contact page
    header("Location: contact.php");
    exit;
} else {
    // If the request method is not POST, redirect back to the contact page
    header("Location: contact.php");
    exit;
}
?>