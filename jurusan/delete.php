<?php
include '../connection.php';

if (!isset($_POST['id_jurusan'])) {
    die('<h1>Salah input variabel</h1>');
}

$id_jurusan = mysqli_real_escape_string($_MYSQLI, $_POST['id_jurusan']);

$query = mysqli_query($_MYSQLI, "DELETE FROM tbl_jurusan WHERE id_jurusan='$id_jurusan'");

if ($query) {
    echo '<script>alert("Data berhasil dihapus.");document.location = "../jurusan.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
