<?php
include '../connection.php';

if (!isset($_POST['id_guru'])) {
    die('<h1>Salah input variabel</h1>');
}

$id_guru = mysqli_real_escape_string($_MYSQLI, $_POST['id_guru']);

$query = mysqli_query($_MYSQLI, "DELETE FROM tbl_guru WHERE id_guru='$id_guru'");

if ($query) {
    echo '<script>alert("Data berhasil dihapus.");document.location = "../guru.php";</script>';
} else {
    echo mysqli_error($_MYSQLI);
}
