<?php
include '../connection.php';

if (!isset($_POST['id_jurusan'])) {
    die('<h1>Salah input variabel</h1>');
}

$id_jurusan = mysqli_real_escape_string($_MYSQLI, $_POST['id_jurusan']);
$kode_jurusan = mysqli_real_escape_string($_MYSQLI, strtoupper($_POST['kode_jurusan']));
$nama_jurusan = mysqli_real_escape_string($_MYSQLI, $_POST['nama_jurusan']);

$query = mysqli_query($_MYSQLI, "UPDATE tbl_jurusan SET kode_jurusan='$kode_jurusan', nama_jurusan='$nama_jurusan' WHERE id_jurusan='$id_jurusan'");

if ($query) {
    echo '<script>alert("Data berhasil diubah.");document.location = "../jurusan.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
