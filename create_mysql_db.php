<?php
// Скрипт для создания MySQL базы данных
$servername = "127.0.0.1";
$username = "root";
$password = "";

try {
    // Создаем подключение к MySQL
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Создаем базу данных
    $sql = "CREATE DATABASE IF NOT EXISTS anime_site CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    $conn->exec($sql);
    echo "База данных 'anime_site' успешно создана или уже существует\n";

    // Подключаемся к созданной базе данных
    $conn = new PDO("mysql:host=$servername;dbname=anime_site", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Подключение к базе данных установлено\n";

} catch(PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>
