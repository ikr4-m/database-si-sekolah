<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    <?php
    require './constant.php';
    require './connection.php';
    require './siswa/modal.php';
    ?>
</head>

<body>
    <div class="container">
        <br><br>
        <h1 class="w-100 text-center">
            Input Data Siswa
        </h1>
        <br><br>
        <a href="./">
            <button class="btn btn-secondary">Kembali ke menu utama</button>
        </a>
        <?php require_modal([], MODAL_ADD, 'add') ?>
        <button class="btn btn-secondary mb-2" style="float:right" data-toggle="modal" data-target="#modal-add">
            &plus; Tambah Data
        </button>
        <table class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
                <th>NIS Siswa</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($_MYSQLI, 'SELECT * FROM view_siswa');
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?= $data['nis'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['kelas'] . $data['kode_jurusan'] . $data['rombel'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td>
                                <button class="btn btn-primary mr-1" data-toggle="modal" data-target="#modal-edit-<?= $data['id_siswa'] ?>">Ubah</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-<?= $data['id_siswa'] ?>">Hapus</button>
                            </td>
                        </tr>
                        <?php require_modal($data, MODAL_EDIT, 'edit') ?>
                        <?php require_modal($data, MODAL_DELETE, 'delete') ?>
                <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>