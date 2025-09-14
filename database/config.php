<?php

$params = [
    'host'     => '192.168.1.13',  // alamat server database
    'port'     => 5432,         // port PostgreSQL default
    'database' => 'perkuliahan',// nama database
    'user'     => 'tester',     // username PostgreSQL
    'password' => 'secret'      // password PostgreSQL
];

try {
    $dsn = sprintf("pgsql:host=%s;port=%d;dbname=%s",
        $params['host'],
        $params['port'],
        $params['database']
    );

    // $pdo = new PDO($dsn, $params['user'], $params['password']);
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=perkuliahan;user=tester;password=secret');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
// echo "Connected successfully";

