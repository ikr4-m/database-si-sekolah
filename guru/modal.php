<?php
define('MODAL_ADD', 1);
define('MODAL_EDIT', 2);
define('MODAL_DELETE', 3);

function require_modal($data, $pilihan, $method)
{ ?>
    <?php
        $id = 'modal';
        if ($pilihan === MODAL_ADD) $id = $id . '-add';
        if ($pilihan === MODAL_EDIT) $id = $id . '-edit';
        if ($pilihan === MODAL_DELETE) $id = $id . '-delete';
        if ($pilihan !== MODAL_ADD) {
            $id = $id . '-' . $data['id_guru'];
        }
        require './connection.php';
        ?>
    <div class="modal fade" id="<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $id ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="guru/<?= $method ?>.php" method="post">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-delete">
                            <?php
                                if ($pilihan === MODAL_ADD) echo 'Tambah ';
                                if ($pilihan === MODAL_EDIT) echo 'Ubah ';
                                if ($pilihan === MODAL_DELETE) echo 'Hapus ';
                                ?>
                            Data
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <?php if ($pilihan === MODAL_ADD) { ?>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" id="nip" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Guru</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="id_mapel">Mata Pelajaran</label>
                                <select name="id_mapel" id="id_mapel" class="form-control">
                                    <?php
                                            $query = mysqli_query($_MYSQLI, "SELECT * FROM tbl_mapel");
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($d = mysqli_fetch_assoc($query)) {
                                                    echo "<option value='$d[id_mapel]'>$d[kode_mapel] - $d[nama_mapel]</option>";
                                                }
                                            }
                                            ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Guru</label>
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                        <?php } ?>

                        <?php if ($pilihan === MODAL_EDIT) { ?>
                            <input type="text" name="id_guru" id="id_guru" value="<?= $data['id_guru'] ?>" hidden>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" id="nip" value="<?= $data['nip'] ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Guru</label>
                                <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="id_mapel">Mata Pelajaran</label>
                                <select name="id_mapel" id="id_mapel" class="form-control">
                                    <option value="<?= $data['id_mapel'] ?>"><?= $data['kode_mapel'] . ' - ' . $data['nama_mapel'] ?></option>
                                    <?php
                                            $query = mysqli_query($_MYSQLI, "SELECT * FROM tbl_mapel");
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($d = mysqli_fetch_assoc($query)) {
                                                    echo "<option value='$d[id_mapel]'>$d[kode_mapel] - $d[nama_mapel]</option>";
                                                }
                                            }
                                            ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Guru</label>
                                <input type="text" name="alamat" id="alamat" value="<?= $data['alamat'] ?>" class="form-control">
                            </div>
                        <?php } ?>

                        <?php if ($pilihan === MODAL_DELETE) { ?>
                            <input type="text" name="id_guru" id="id_guru" value="<?= $data['id_guru'] ?>" hidden>
                            <h5 class="text-center">Apakah anda ingin menghapus data ini?</h5>
                        <?php } ?>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <?php
                            $submit = '';
                            if ($pilihan === MODAL_ADD) $submit = 'Simpan';
                            if ($pilihan === MODAL_EDIT) $submit = 'Ubah';
                            if ($pilihan === MODAL_DELETE) $submit = 'Hapus';
                            ?>
                        <input type="submit" class="btn btn-danger" value="<?= $submit ?>">
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php } ?>