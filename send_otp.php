<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate OTP
    $otp = mt_rand(100000, 999999);

    // Get user's email from the registration form
    $to_email = $_POST['email'];

    // Your email subject
    $subject = 'OTP for Registration';

    // Your email message
    $message = 'Your OTP for registration is: ' . $otp;

    // Send email
    if (mail($to_email, $subject, $message)) {
        // Email sent successfully
        echo json_encode(array("success" => true, "otp" => $otp));
    } else {
        // Email sending failed
        echo json_encode(array("success" => false, "message" => "Failed to send OTP. Please try again later."));
    }
}
?>
