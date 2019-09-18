<?php
$_MYSQLI = mysqli_connect(
    'localhost',
    'root',
    'root',
    'si-sekolah'
);
if (!$_MYSQLI) {
    die(mysqli_connect_error());
}
