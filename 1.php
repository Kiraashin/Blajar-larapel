<?php
// variable ($)

$name = "Budi Sudarsono";
$umur = 20;
$phone = "089786756453"; 
$berat = 70.50;
$isActive = true;

// echo "Nama : " . $name . "<br>";
// echo "Umur : " . $umur . "<br>";

// constanta = nilainya tidak bisa diubah
// define, const
// selalu pakai dollar ($) untuk data

define("DB_HOST", "localhost");
define("DB_NAME", "db_pos");
const APP_DEBUG = true;

echo "Host Database : " . DB_HOST . "<br>";
echo "DB_NAME : " . DB_NAME . "<br>";
echo "Mode Production : " . APP_DEBUG . "<br>";

// "__": underscore 2 kali
// __DIR__ : 
echo "Folder file ini : " . __DIR__;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Nama Siswa</h1>
    <p>Nama : <?php echo $name ?></p>
    <p>Umur : <?php echo $umur ?></p>
    <p>Telepon : <?php echo $phone ?></p>
    <p>Berat Badan : <?php echo $berat ?></p>
</body>
</html>

