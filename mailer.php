<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize form inputs.
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : ''; // Capture email
    $messageContent = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (empty($name) || empty($email) || empty($messageContent)) {
        echo "Please provide your name, email, and message.";
        exit;
    }

    // Your email where messages will be sent.
    $to = "leechongweiinspire@gmail.com";  // ✅ Your actual email

    // Email subject.
    $subject = "New Message from $name";

    // Email headers.
    $headers = "From: $email\r\n";  
    $headers .= "Reply-To: $email\r\n";  
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Build the email body in HTML.
    $body = "<html><body>";
    $body .= "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
    $body .= "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>"; // Display sender's email
    $body .= "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($messageContent)) . "</p>";
    $body .= "</body></html>";

    // Send the email.
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Message could not be sent.";
    }
}
?>
