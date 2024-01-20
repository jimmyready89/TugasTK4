<?php
    // Melakukan settingan koneksi database

    // Driver database
    $driver = "mysql";
    // Host database
    $servername = "localhost";
    // Username database
    $username = "root";
    // Password database
    $password = "";
    // Nama Table
    $dbname = "Toko";

    $connectionPDO = new PDO("{$driver}:host={$servername};dbname={$dbname}", $username, $password);
?>