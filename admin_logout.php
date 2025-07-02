<?php
session_start();

// Destroy session
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out | Nialina Fitness</title>
    <link rel="stylesheet" href="NialinaStyle.css">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f4f7f6;
            text-align: center;
            padding-top: 100px;
        }
        .logout-box {
            background-color: white;
            display: inline-block;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .logout-box h2 {
            color: #2d4d3a;
        }
        .logout-box a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: var(--dark-green);
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }
        .logout-box a:hover {
            background-color: var(--pastel-green);
            color: var(--dark-green);
        }
    </style>
</head>
<body>
    <div class="logout-box">
        <h2>You’ve been logged out.</h2>
        <a href="admin_login.php">Back to Admin Login</a>
        <a href="index.html"> Back to Home</a>

    </div>
</body>
</html>
