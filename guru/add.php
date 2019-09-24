<?php
include '../connection.php';

if (!isset($_POST['nip'])) {
    die('<h1>Salah input variabel</h1>');
}

$nip = mysqli_real_escape_string($_MYSQLI, strtoupper($_POST['nip']));
$nama = mysqli_real_escape_string($_MYSQLI, $_POST['nama']);
$id_mapel = mysqli_real_escape_string($_MYSQLI, $_POST['id_mapel']);
$alamat = mysqli_real_escape_string($_MYSQLI, $_POST['alamat']);

$checkKembar = mysqli_query($_MYSQLI, "SELECT * FROM tbl_guru WHERE nip='$nip'");
if (mysqli_num_rows($checkKembar) > 0) {
    die('<script>alert("Kode kembar! Silahkan dicek kembali.");document.location = "../guru.php";</script>');
}

$query = mysqli_query($_MYSQLI, "INSERT INTO tbl_guru (nip, nama, id_mapel, alamat) VALUES ('$nip','$nama', '$id_mapel', '$alamat')");

if ($query) {
    echo '<script>alert("Data berhasil ditambahkan.");document.location = "../guru.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
