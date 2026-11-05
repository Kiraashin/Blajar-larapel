<?php
$nama = "Reza Ibrahim";
$namaLengkap = "Budi Sudar Sono";
echo 'Nama anda adalah $nama';
echo '<br>';
echo "Nama anda adalah $nama";
echo '<br>';

// strlen()
echo "Panjang string: " . strlen($nama);
echo "<br>";
// substr
echo substr($nama, 0, 5);
echo "<br>";
echo str_replace($namaLengkap, "Sudar", "Duarr");
?>