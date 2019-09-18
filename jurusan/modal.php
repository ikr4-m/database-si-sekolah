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
            $id = $id . '-' . $data['id_jurusan'];
        }
        ?>
    <div class="modal fade" id="<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $id ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="jurusan/<?= $method ?>.php" method="post">

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
                            <div class="container-fluid form-group" style="padding-left:0px;padding-right:0px;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="nama_jurusan">Nama Jurusan</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" name="kode_jurusan" id="kode_jurusan" placeholder="Kode" class="form-control">
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" name="nama_jurusan" id="nama_jurusan" placeholder="Nama Jurusan" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($pilihan === MODAL_EDIT) { ?>
                            <div class="container-fluid form-group" style="padding-left:0px;padding-right:0px;">
                                <input type="text" name="id_jurusan" id="id_jurusan" value="<?= $data['id_jurusan'] ?>" hidden>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="nama_jurusan">Nama Jurusan</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" name="kode_jurusan" id="kode_jurusan" placeholder="Kode" value="<?= $data['kode_jurusan'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" name="nama_jurusan" id="nama_jurusan" placeholder="Nama Jurusan" value="<?= $data['nama_jurusan'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($pilihan === MODAL_DELETE) { ?>
                            <input type="text" name="id_jurusan" id="id_jurusan" value="<?= $data['id_jurusan'] ?>" hidden>
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