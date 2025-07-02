<?php
session_start();

// Admin login check
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.html");
    exit();
}

$messages = [];
$messageFile = 'messages.txt';

if (file_exists($messageFile)) {
    $content = file_get_contents($messageFile);
    $messages = array_filter(array_map('trim', explode("===\n", $content)));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Messages | Nialina Fitness</title>
  <link rel="stylesheet" href="NialinaStyle.css" />
  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background-color: var(--bg-soft-white);
      margin: 0;
    }
    .container {
      max-width: 1100px;
      margin: auto;
      padding: 40px 20px;
    }
    h2 {
      color: var(--dark-green);
      margin-bottom: 25px;
    }
    .message-box {
      background-color: var(--bg-beige);
      border-left: 5px solid var(--pastel-green);
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px var(--shadow-color);
    }
    .message-box pre {
      white-space: pre-wrap;
      font-family: 'Lato', sans-serif;
      font-size: 0.95em;
      color: var(--text-color);
    }
    .back-button {
      display: inline-block;
      background: var(--pastel-green);
      color: var(--dark-green);
      padding: 10px 20px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s ease;
      margin-top: 30px;
    }
    .back-button:hover {
      background: var(--dark-green);
      color: white;
    }
    footer {
      margin-top: 60px;
      background-color: var(--dark-green);
      color: var(--bg-soft-white);
      text-align: center;
      padding: 20px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>📩 Recent Messages</h2>

    <?php if (!empty($messages)) : ?>
      <?php foreach (array_reverse($messages) as $msg): ?>
        <div class="message-box">
          <pre><?= htmlspecialchars($msg) ?></pre>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No messages found.</p>
    <?php endif; ?>

    <a href="admin_dashboard.php" class="back-button">← Back to Dashboard</a>
  </div>

  <footer>
    <p>&copy; 2025 Nialina Fitness | Admin Panel</p>
  </footer>
</body>
</html>
