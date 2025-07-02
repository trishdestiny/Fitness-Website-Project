<?php
// admin_dashboard.php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header('Location: admin_login.html');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard | Nialina Fitness</title>
  <link rel="stylesheet" href="NialinaStyle.css" />
  <style>
    .dashboard-header {
      background-color: var(--dark-green);
      color: var(--bg-soft-white);
      padding: 30px 0;
      text-align: center;
    }
    .dashboard-container {
      max-width: 1100px;
      margin: auto;
      padding: 40px 20px;
    }
    .dashboard-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
    }
    .dashboard-card {
      background: var(--white);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px var(--shadow-color);
      flex: 1 1 300px;
      max-width: 300px;
      text-align: center;
      transition: transform 0.3s ease;
    }
    .dashboard-card:hover {
      transform: translateY(-5px);
    }
    .dashboard-card h3 {
      color: var(--dark-green);
      margin-bottom: 15px;
    }
    .dashboard-card p {
      font-size: 0.95em;
    }
    .logout-btn {
      display: inline-block;
      margin-top: 20px;
      background: var(--pastel-green);
      color: var(--dark-green);
      padding: 10px 20px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
      border: none;
      transition: background 0.3s ease;
    }
    .logout-btn:hover {
      background: var(--dark-green);
      color: var(--white);
    }
  </style>
</head>
<body>
  <header class="dashboard-header">
    <h1>Welcome, Admin</h1>
    <p>Manage Nialina Fitness site content and submissions</p>
    <a href="admin_logout.php" class="logout-btn">Logout</a>
  </header>

  <div class="dashboard-container">
    <div class="dashboard-grid">
      <div class="dashboard-card">
        <h3>View Messages</h3>
        <p>See user enquiries and contact form submissions.</p>
        <a href="view_messages.php" class="button">View</a>

      </div>
      <div class="dashboard-card">
        <h3>Manage Signups</h3>
        <p>Review new member signups and contact info.</p>
        <a href="#" class="button">Manage</a>
      </div>
      <div class="dashboard-card">
        <h3>Program Feedback</h3>
        <p>Read and organize feedback from clients.</p>
        <a href="#" class="button">Review</a>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Nialina Fitness | Admin Panel</p>
  </footer>
</body>
</html>