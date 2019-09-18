<?php
include '../connection.php';

if (!isset($_POST['id_guru'])) {
    die('<h1>Salah input variabel</h1>');
}

$id_guru = mysqli_real_escape_string($_MYSQLI, $_POST['id_guru']);
$nip = mysqli_real_escape_string($_MYSQLI, $_POST['nip']);
$nama = mysqli_real_escape_string($_MYSQLI, $_POST['nama']);
$id_mapel = mysqli_real_escape_string($_MYSQLI, $_POST['id_mapel']);
$alamat = mysqli_real_escape_string($_MYSQLI, $_POST['alamat']);

$query = mysqli_query($_MYSQLI, "UPDATE tbl_guru SET nip='$nip', nama='$nama', id_mapel='$id_mapel', alamat='$alamat' WHERE id_guru='$id_guru'");

if ($query) {
    echo '<script>alert("Data berhasil diubah.");document.location = "../guru.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
