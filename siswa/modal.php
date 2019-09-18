<?php
define('MODAL_ADD', 1);
define('MODAL_EDIT', 2);
define('MODAL_DELETE', 3);

function require_modal($data, $pilihan, $method)
{ ?>
    <?php
        $id = 'modal';
        require './connection.php';
        if ($pilihan === MODAL_ADD) $id = $id . '-add';
        if ($pilihan === MODAL_EDIT) $id = $id . '-edit';
        if ($pilihan === MODAL_DELETE) $id = $id . '-delete';
        if ($pilihan !== MODAL_ADD) {
            $id = $id . '-' . $data['id_siswa'];
        }
        ?>
    <div class="modal fade" id="<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $id ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="siswa/<?= $method ?>.php" method="post">

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
                                <label for="nis">NIS Siswa</label>
                                <input type="text" name="nis" id="nis" placeholder="xxx-xxx" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" name="nama" id="nama" placeholder="Contoh: Budi Waseso" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <div class="container-fluid form-group" style="padding-left:0px;padding-right:0px;">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="text" name="kelas" id="kelas" placeholder="Tingkatan" class="form-control text-center">
                                        </div>
                                        <div class="col-lg-6">
                                            <select name="id_jurusan" id="id_jurusan" class="form-control">
                                                <option value="NULL">Pilih Jurusan</option>
                                                <?php
                                                        $query = mysqli_query($_MYSQLI, 'SELECT * FROM tbl_jurusan');
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($d = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?= $d['id_jurusan'] ?>"><?= $d['kode_jurusan'] ?></option>
                                                <?php }
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" name="rombel" id="rombel" placeholder="Rombel" class="form-control text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Siswa</label>
                                <input type="text" name="alamat" id="alamat" placeholder="Contoh: Jl. Jalangkote" class="form-control">
                            </div>
                        <?php } ?>

                        <?php if ($pilihan === MODAL_EDIT) { ?>
                            <input type="text" name="id_siswa" id="id_siswa" value="<?= $data['id_siswa'] ?>" hidden>
                            <div class="form-group">
                                <label for="nis">NIS Siswa</label>
                                <input type="text" name="nis" id="nis" value="<?= $data['nis'] ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <div class="container-fluid form-group" style="padding-left:0px;padding-right:0px;">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="text" name="kelas" id="kelas" value="<?= $data['kelas'] ?>" class="form-control text-center">
                                        </div>
                                        <div class="col-lg-6">
                                            <select name="id_jurusan" id="id_jurusan" class="form-control">
                                                <option value="<?= $data['id_jurusan'] ?>"><?= $data['kode_jurusan'] ?></option>
                                                <?php
                                                        $query = mysqli_query($_MYSQLI, 'SELECT * FROM tbl_jurusan');
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($d = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?= $d['id_jurusan'] ?>"><?= $d['kode_jurusan'] ?></option>
                                                <?php }
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" name="rombel" id="rombel" value="<?= $data['rombel'] ?>" class="form-control text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Siswa</label>
                                <input type="text" name="alamat" id="alamat" value="<?= $data['alamat'] ?>" class="form-control">
                            </div>
                        <?php } ?>

                        <?php if ($pilihan === MODAL_DELETE) { ?>
                            <input type="text" name="id_siswa" id="id_siswa" value="<?= $data['id_siswa'] ?>" hidden>
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