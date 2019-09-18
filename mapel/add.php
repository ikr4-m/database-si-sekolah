<?php
include '../connection.php';

if (!isset($_POST['kode_mapel'])) {
    die('<h1>Salah input variabel</h1>');
}

$kode_mapel = mysqli_real_escape_string($_MYSQLI, strtoupper($_POST['kode_mapel']));
$nama_mapel = mysqli_real_escape_string($_MYSQLI, $_POST['nama_mapel']);

$checkKembar = mysqli_query($_MYSQLI, "SELECT * FROM tbl_mapel WHERE kode_mapel='$kode_mapel'");
if (mysqli_num_rows($checkKembar) > 0) {
    die('<script>alert("Kode kembar! Silahkan dicek kembali.");document.location = "../mapel.php";</script>');
}

$query = mysqli_query($_MYSQLI, "INSERT INTO tbl_mapel (kode_mapel, nama_mapel) VALUES ('$kode_mapel','$nama_mapel')");

if ($query) {
    echo '<script>alert("Data berhasil ditambahkan.");document.location = "../mapel.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
