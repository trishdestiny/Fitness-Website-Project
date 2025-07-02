<?php
session_start();

$admin_username = "admin";
$admin_password = "password123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login | Nialina Fitness</title>
  <link rel="stylesheet" href="NialinaStyle.css" />
  <style>
    :root {
      --dark-green: #556B2F;
      --pastel-green: #A8D8B9;
      --bg-soft-white: #FAF0E6;
    }

    body {
      margin: 0;
      font-family: 'Quicksand', sans-serif;
      background: url('Image/fitness11.jpeg') no-repeat center center fixed;

      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    /* Overlay */
    body::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(0, 0, 0, 0.45); /* dark overlay */
      z-index: 0;
    }

    .login-box {
      position: relative;
      z-index: 1;
      background-color: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 20px;
      max-width: 420px;
      width: 100%;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
      backdrop-filter: blur(3px);
    }

    .login-box h2 {
      color: var(--dark-green);
      margin-bottom: 30px;
    }

    .form-group {
      text-align: left;
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 6px;
      color: var(--dark-green);
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 1em;
    }

    input:focus {
      border-color: var(--pastel-green);
      outline: none;
    }

    .button {
      width: 100%;
      padding: 12px;
      background-color: var(--dark-green);
      color: #fff;
      border: none;
      border-radius: 10px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
    }

    .button:hover {
      background-color: var(--pastel-green);
      color: var(--dark-green);
      transform: scale(1.02);
    }

    .form-link {
      margin-top: 20px;
    }

    .form-link a {
      color: var(--dark-green);
      text-decoration: none;
      font-weight: bold;
    }

    .form-link a:hover {
      color: var(--pastel-green);
    }

    .error-message {
      color: red;
      font-weight: 600;
      margin-bottom: 20px;
    }

    @media (max-width: 500px) {
      .login-box {
        padding: 30px 20px;
        margin: 0 15px;
      }
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Admin Login</h2>

    <?php if (!empty($error)) : ?>
      <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>

      <button type="submit" class="button">Login</button>

      <div class="form-link">
        <a href="index.html">← Back to Home</a>
      </div>
    </form>
  </div>
</body>
</html>
