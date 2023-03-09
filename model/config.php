<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'tuareceita');

$conn = new mysqli(HOST, USER, PASS, BASE);
if ($conn->error) {
    die("Connection failed: " . $conn->error);
}
?>