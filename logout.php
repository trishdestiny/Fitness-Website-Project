<?php
session_start();
session_unset();
session_destroy();

// Redirect to homepage after logout
header("Location: index.html");
exit();
?>
