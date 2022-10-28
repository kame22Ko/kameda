<?php
// データベースに接続
function connectDB() {
    $param = 'mysql:dbname=kasedasaba;host=localhost';
    try {
        $pdo = new PDO($param, 'kame', 'kame');
        return $pdo;

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
?>