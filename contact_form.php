<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Save to a file
    $data = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\nMessage: $message\n\n";
    file_put_contents("messages.txt", $data, FILE_APPEND);
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Message Received</title>
        <link rel="stylesheet" href="NialinaStyle.css">
        <style>
            .thank-you {
                text-align: center;
                margin-top: 100px;
                color: green;
                font-family: 'Quicksand', sans-serif;
            }
            .thank-you a {
                display: inline-block;
                margin-top: 20px;
                background: var(--dark-green);
                color: white;
                padding: 10px 20px;
                border-radius: 8px;
                text-decoration: none;
            }
            .thank-you a:hover {
                background: var(--pastel-green);
                color: var(--dark-green);
            }
        </style>
    </head>
    <body>
        <div class="thank-you">
            <h2>Thank you, <?= $name ?>! Your message has been received. 😊</h2>
            <a href="contact.html">Back to Contact Page</a>
        </div>
    </body>
    </html>

    <?php
} else {
    header("Location: contact.html");
    exit();
}
