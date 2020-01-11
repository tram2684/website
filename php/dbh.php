<?php
$servername = "grandteaparty.xp3.biz";
$dbUsername = "root";
$dbPassword = "";
$dbName = "68435";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}