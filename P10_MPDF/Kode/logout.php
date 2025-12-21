<?php
// logout.php
session_start();

// Hancurkan semua data sesi
$_SESSION = array();

// Jika ingin menghancurkan session cookie, hapus juga cookie sesi.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Akhiri sesi
session_destroy();

// Arahkan ke halaman login
header("Location: login.php");
exit();
?>