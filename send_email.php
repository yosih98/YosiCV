<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // تنقية والتحقق من صحة البيانات المدخلة
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "yosih1998@gmail.com"; // استبدل هذا البريد الإلكتروني بالبريد الذي تريد استقبال الرسائل عليه
        $subject = "New Message from Website Contact Form";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request.";
}
?>
