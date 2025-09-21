<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASSWORD'];
$port = $_ENV['DB_PORT'];
$db = $_ENV['DB'];

try {
    $dsn = "$db:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $pass);
    // $pdo = new PDO('pgsql:host=$host;port=5432;dbname=perkuliahan;user=tester;password=secret');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}


// echo "Connected successfully";