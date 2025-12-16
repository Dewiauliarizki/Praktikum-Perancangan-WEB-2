<?php
$password_plain = 'adminku';
$password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);
echo $password_hashed;
?>