<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jurusan</title>
    <?php
    require './constant.php';
    require './connection.php';
    ?>
</head>

<body>
    <?php require './jurusan/modal.php' ?>
    <div class="container">
        <br><br>
        <h1 class="w-100 text-center">
            Input Data Jurusan
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
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($_MYSQLI, 'SELECT * FROM tbl_jurusan');
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?= $data['kode_jurusan'] ?></td>
                            <td><?= $data['nama_jurusan'] ?></td>
                            <td>
                                <button class="btn btn-primary mr-1" data-toggle="modal" data-target="#modal-edit-<?= $data['id_jurusan'] ?>">Ubah</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-<?= $data['id_jurusan'] ?>">Hapus</button>
                            </td>
                            <?php require_modal($data, MODAL_DELETE, 'delete') ?>
                            <?php require_modal($data, MODAL_EDIT, 'edit') ?>
                        </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>