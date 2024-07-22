<?php
error_reporting(0);
define('DB_NAME', 'qbeb');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', '192.168.1.100:3306');
 
// Create connection
$db     =   new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
