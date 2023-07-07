<?php
// session_start();

// Set the maximum idle time in seconds
$maxIdleTime = 900; // 15 minutes = 15 * 60 seconds

// Check if the session exists and has a last activity time
if (isset($_SESSION['last_activity'])) {
    // Calculate the time difference between now and the last activity time
    $idleTime = time() - $_SESSION['last_activity'];

    // Check if the idle time exceeds the maximum idle time
    if ($idleTime >= $maxIdleTime) {
        // Destroy the session
        session_unset();
        session_destroy();
        header("Location: http://localhost/eTransporte/app/front/paginas/logout.php");
        $_SESSION = array(); // Optional: Reset the session array
    }
}

// Update the last activity time for the session
$_SESSION['last_activity'] = time();
