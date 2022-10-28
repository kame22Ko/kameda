<?php
require_once 'k_functions.php';

$pdo = connectDB();

$sql = 'DELETE FROM images WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();

header('Location:picture.php');
exit();
?>