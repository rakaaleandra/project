<?php

// $params = [
//     'host'     => 'some-postgres',   // alamat server database
//     'port'     => 5432,          // port PostgreSQL default
//     'database' => 'L0123146_RakaAleandra_DB',        // nama database
//     'user'     => 'tester',      // username PostgreSQL
//     'password' => 'secret'   // password PostgreSQL
// ];
$host = 'localhost';
$dbname = 'perkuliahan';
$username = 'root';
$password = '';


try {
    // $dbInfo = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
    //     $params['host'],
    //     $params['port'],
    //     $params['database'],
    //     $params['user'],
    //     $params['password']
    // );

    // $pdo = new \PDO($dbInfo);
    // $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo "Connected successfully";
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
// echo "Connected successfully";

