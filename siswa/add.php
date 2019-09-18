<?php
include '../connection.php';

if (!isset($_POST['nis'])) {
    die('<h1>Salah input variabel</h1>');
}

$nis = mysqli_real_escape_string($_MYSQLI, $_POST['nis']);
$nama = mysqli_real_escape_string($_MYSQLI, $_POST['nama']);
$kelas = mysqli_real_escape_string($_MYSQLI, $_POST['kelas']);
$id_jurusan = mysqli_real_escape_string($_MYSQLI, $_POST['id_jurusan']);
$rombel = mysqli_real_escape_string($_MYSQLI, $_POST['rombel']);
$alamat = mysqli_real_escape_string($_MYSQLI, $_POST['alamat']);

$checkKembar = mysqli_query($_MYSQLI, "SELECT * FROM tbl_siswa WHERE nis='$nis'");
if (mysqli_num_rows($checkKembar) > 0) {
    die('<script>alert("NIS Kembar! Silahkan dicek kembali.");document.location = "../siswa.php";</script>');
}

$query = mysqli_query($_MYSQLI, "INSERT INTO tbl_siswa (nis, nama, kelas, id_jurusan, rombel, alamat) VALUES ('$nis','$nama', '$kelas', '$id_jurusan', '$rombel', '$alamat')");

if ($query) {
    echo '<script>alert("Data berhasil ditambahkan.");document.location = "../siswa.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
