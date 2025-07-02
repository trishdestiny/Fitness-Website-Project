<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Dummy login credentials (you can later replace this with database logic)
    if ($email === "user@nialina.com" && $password === "password123") {
        $_SESSION['member'] = "Nialina Member";
        header("Location: member_dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Nialina Fitness</title>
  <link rel="stylesheet" href="NialinaStyle.css">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background-color: #f4f7f6;
    }

    .container {
      max-width: 500px;
      margin: 3rem auto;
      background-color: #ffffff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #2d4d3a;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: #2d4d3a;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    .button {
      background-color: #2d4d3a;
      color: white;
      border: none;
      padding: 12px 20px;
      width: 100%;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      font-family: 'Lato', sans-serif;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 1rem;
    }

    .form-link {
      text-align: center;
      margin-top: 1rem;
    }

    .form-link a {
      color: #2d4d3a;
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Member Login</h2>

    <?php if (!empty($error)) : ?>
      <p class="error-message"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
      </div>

      <button type="submit" class="button">Login</button>

      <div class="form-link">
        <p>Don’t have an account? <a href="signup.php">Sign up here</a></p>
        <p> Want to Go Back Home? <a href="index.html"> Homepage</a></p>
      </div>
    </form>
  </div>

</body>
</html>
