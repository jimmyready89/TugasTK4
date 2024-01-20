<?php
    if (isset($_POST["NamaPengguna"])) {
        include "./controller/create.php";
    }

    include "../class/hakakses_pdo.php";
    $HakAksesPDO = new HakAkses($connectionPDO);

    $HakAksesList = $HakAksesPDO->getList();
?>
<div class="card">
    <div class="card-header">
        Form Tambah Pengguna
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="NamaPengguna">Nama Pengguna</label>
                        <input required type="text" class="form-control" id="NamaPengguna" name="NamaPengguna" placeholder="Nama Pengguna" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input required type="text" class="form-control" id="Password" placeholder="Password" name="Password" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="NamaDepan">Nama Depan</label>
                        <input required type="text" class="form-control" id="NamaDepan" placeholder="Nama Depan" name="NamaDepan" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="NamaBelakang">Nama Belakang</label>
                        <input required type="text" class="form-control" id="NamaBelakang" placeholder="Nama Belakang" name="NamaBelakang" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="NoHp">No Hp</label>
                        <input required type="telp" class="form-control" id="NoHp" placeholder="No Hp" name="NoHp" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input required type="text" class="form-control" id="Alamat" placeholder="Alamat" name="Alamat">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="IdHakAkses">Hak Akses</label>
                        <select name="IdHakAkses" id="IdHakAkses" class="form-select">
                            <?php
                                foreach ($HakAksesList as $HakAkses) {
                                    ?>
                                        <option value="<?= $HakAkses["IdAkses"] ?>" >
                                            <?= $HakAkses["NamaAkses"] ?>
                                        </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-7 col-md-offset-2">
                    <input type="submit" class="btn btn-md btn-primary" name="Tambah" value="Tambah" >
                    <a class="btn btn-danger" href="index.php" role="button">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>