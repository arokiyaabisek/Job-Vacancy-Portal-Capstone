<?php
// XAMPP default MySQL: host localhost, user root, no password.
// Change these only if you set a different MySQL username/password.
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "job_portal";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
