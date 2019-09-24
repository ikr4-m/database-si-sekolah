<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Utama</title>
    <?php
    require './constant.php';
    session_start();
    if (empty($_SESSION['si-login'])) {
        header('Location: index.php');
    }
    ?>
</head>

<style>
    .main-menu {
        width: 500px;
        border-radius: 20px;
        box-shadow: 0px 0px 20px -5px black;
    }
</style>

<body style="background-color:grey">
    <div style="height:100vh" class="container-fluid d-flex">
        <div class="main-menu bg-light px-4 pb-4 pt-1 m-auto">
            <h3 class="text-dark w-100 text-center my-3">Selamat Datang</h3>
            <a href="jurusan.php">
                <button class="btn btn-secondary btn-block mb-2">Input Jurusan Siswa</button>
            </a>
            <a href="mapel.php">
                <button class="btn btn-secondary btn-block mb-2">Input Mata Pelajaran Guru</button>
            </a>
            <a href="siswa.php">
                <button class="btn btn-secondary btn-block mb-2">Input Siswa</button>
            </a>
            <a href="guru.php">
                <button class="btn btn-secondary btn-block mb-2">Input Guru</button>
            </a>
            <a href="logout.php">
                <button class="btn btn-secondary btn-block">Keluar</button>
            </a>
        </div>
    </div>
</body>

</html>