<?php
// Only proceed if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = strip_tags(trim($_POST["Name"]));
    $email = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["Subject"]));
    $message = trim($_POST["Message"]);

    // Replace this email with your actual email address
    $to = "Jame.risacher@gmail.com";

    // Email subject & content
    $email_subject = "New contact from $name: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Thank you for contacting us. We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Not a POST request, echo an error message
    echo "Oops! Something went wrong and we couldn't send your message.";
}
?>
