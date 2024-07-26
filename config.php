<?php
error_reporting(0);
define('DB_NAME', 'rent_management');
define('DB_USER', 'root');
define('DB_PASSWORD', 'masterkey');
define('DB_HOST', '127.0.0.1:3306');
 
// Create connection
$db     =   new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
