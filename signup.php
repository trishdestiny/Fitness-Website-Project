<?php
$signupSuccess = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = htmlspecialchars(trim($_POST["fullname"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    if ($fullname && $email && $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $timestamp = date("Y-m-d H:i:s");
        $data = "Full Name: $fullname\nEmail: $email\nPassword: $passwordHash\nDate: $timestamp\n\n";

        $file = 'signups.txt';
        if (!file_exists($file)) {
            file_put_contents($file, ""); // create empty file
        }

        file_put_contents($file, $data, FILE_APPEND);
        $signupSuccess = true;
    } else {
        $error = "Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sign Up | Nialina Fitness</title>
  <link rel="stylesheet" href="NialinaStyle.css" />
</head>
<body>

  <section class="section">
    <div class="container">
      <h2>Create Your Account</h2>

      <?php if ($signupSuccess): ?>
        <p style="color: green; font-weight: bold;">✅ You're signed up successfully, <?= $fullname ?>! Welcome aboard! 💚</p>
        <a href="member_login.php" class="button">Proceed to Login</a>
        <a href="index.html" class="button">Proceed to Home</a>

      <?php else: ?>
        <?php if ($error): ?>
          <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>

        <form action="signup.php" method="POST">
          <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required />
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
          </div>

          <button type="submit" class="button">Sign Up</button>
        </form>
      <?php endif; ?>
    </div>
  </section>

</body>
</html>
