<?php
include '../connection.php';

if (!isset($_POST['nis'])) {
    die('<h1>Salah input variabel</h1>');
}

$id_siswa = mysqli_real_escape_string($_MYSQLI, $_POST['id_siswa']);
$nis = mysqli_real_escape_string($_MYSQLI, $_POST['nis']);
$nama = mysqli_real_escape_string($_MYSQLI, $_POST['nama']);
$kelas = mysqli_real_escape_string($_MYSQLI, $_POST['kelas']);
$id_jurusan = mysqli_real_escape_string($_MYSQLI, $_POST['id_jurusan']);
$rombel = mysqli_real_escape_string($_MYSQLI, $_POST['rombel']);
$alamat = mysqli_real_escape_string($_MYSQLI, $_POST['alamat']);

$query = mysqli_query($_MYSQLI, "UPDATE tbl_siswa SET nama='$nama', kelas='$kelas', id_jurusan='$id_jurusan', rombel='$rombel', alamat='$alamat' WHERE id_siswa='$id_siswa'");

if ($query) {
    echo '<script>alert("Data berhasil diubah.");document.location = "../siswa.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
