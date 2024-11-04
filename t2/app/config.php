<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function generateCsrfToken() {
    if (empty($_SESSION['global_token'])) {
        $_SESSION['global_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['global_token'];
}

function validateCsrfToken($token) {
    return isset($_SESSION['global_token']) && hash_equals($_SESSION['global_token'], $token);
}
?>
