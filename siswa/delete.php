<?php
include '../connection.php';

if (!isset($_POST['id_siswa'])) {
    die('<h1>Salah input variabel</h1>');
}

$id_siswa = mysqli_real_escape_string($_MYSQLI, $_POST['id_siswa']);

$query = mysqli_query($_MYSQLI, "DELETE FROM tbl_siswa WHERE id_siswa='$id_siswa'");

if ($query) {
    echo '<script>alert("Data berhasil dihapus.");document.location = "../siswa.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
