<?php 
// Start the session
session_start();

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

echo 'Session data cleared and session destroyed!';
?>