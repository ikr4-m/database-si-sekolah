<?php
include '../connection.php';

if (!isset($_POST['kode_jurusan'])) {
    die('<h1>Salah input variabel</h1>');
}

$kode_jurusan = mysqli_real_escape_string($_MYSQLI, strtoupper($_POST['kode_jurusan']));
$nama_jurusan = mysqli_real_escape_string($_MYSQLI, $_POST['nama_jurusan']);

$checkKembar = mysqli_query($_MYSQLI, "SELECT * FROM tbl_jurusan WHERE kode_jurusan='$kode_jurusan'");
if (mysqli_num_rows($checkKembar) > 0) {
    die('<script>alert("Kode kembar! Silahkan dicek kembali.");document.location = "../jurusan.php";</script>');
}

$query = mysqli_query($_MYSQLI, "INSERT INTO tbl_jurusan (kode_jurusan, nama_jurusan) VALUES ('$kode_jurusan','$nama_jurusan')");

if ($query) {
    echo '<script>alert("Data berhasil ditambahkan.");document.location = "../jurusan.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
