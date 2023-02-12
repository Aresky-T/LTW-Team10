<?php
const DB_DSN = 'mysql:host=localhost;dbname=watchshop;port=3306;charset=utf8';
// Username kết nối vào CSDL
const DB_USERNAME = 'root';
// Password kết nối vào CSDL
const DB_PASSWORD = 'root';

try {
    $connection = new PDO(DB_DSN,
        DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
echo "<h1>Kết nối CSDL thành công theo cơ chế PDO</h1>";

?>