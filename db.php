<?php
$host = 'localhost';
$dbname = 'product_management';
$username = 'root';  // ใช้ชื่อผู้ใช้ฐานข้อมูล
$password = '';      // ใช้รหัสผ่านฐานข้อมูล

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
