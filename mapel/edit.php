<?php
include '../connection.php';

if (!isset($_POST['id_mapel'])) {
    die('<h1>Salah input variabel</h1>');
}

$id_mapel = mysqli_real_escape_string($_MYSQLI, $_POST['id_mapel']);
$kode_mapel = mysqli_real_escape_string($_MYSQLI, strtoupper($_POST['kode_mapel']));
$nama_mapel = mysqli_real_escape_string($_MYSQLI, $_POST['nama_mapel']);

$query = mysqli_query($_MYSQLI, "UPDATE tbl_mapel SET kode_mapel='$kode_mapel', nama_mapel='$nama_mapel' WHERE id_mapel='$id_mapel'");

if ($query) {
    echo '<script>alert("Data berhasil diubah.");document.location = "../mapel.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
