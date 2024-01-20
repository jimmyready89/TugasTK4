<?php
    if (isset($_POST["IdPengguna"])) {
        include "./crud/update.php";
    }

    include "../hakakses/hakakses_pdo.php";
    $HakAksesPDO = new HakAkses($connectionPDO);

    $HakAksesList = $HakAksesPDO->getList();
    $Pengguna = $PenggunaPDO->findById($id);
?>
<div class="card">
    <div class="card-header">
        Form Edit Pengguna
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <?php
                if($Pengguna == null){
                }else{
                    ?>
                        <input type="hidden" name="IdPengguna" value="<?= $Pengguna['IdPengguna'] ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NamaPengguna">Nama Pengguna</label>
                                    <input required type="text" class="form-control" id="NamaPengguna" placeholder="Nama Pengguna" value="<?= $Pengguna['NamaPengguna']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NamaDepan">Nama Depan</label>
                                    <input required type="text" class="form-control" id="NamaDepan" placeholder="Nama Depan" name="NamaDepan" value="<?= $Pengguna['NamaDepan']; ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NamaBelakang">Nama Belakang</label>
                                    <input required type="text" class="form-control" id="NamaBelakang" placeholder="Nama Belakang" name="NamaBelakang" value="<?= $Pengguna['NamaBelakang']; ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NoHp">No Hp</label>
                                    <input required type="telp" class="form-control" id="NoHp" placeholder="No Hp" name="NoHp" value="<?= $Pengguna['NoHp']; ?>" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Alamat">Alamat</label>
                                    <input required type="text" class="form-control" id="Alamat" placeholder="Alamat" name="Alamat" value="<?= $Pengguna['Alamat']; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="IdHakAkses">Hak Akses</label>
                                    <select name="IdHakAkses" id="IdHakAkses" class="form-select">
                                        <?php
                                            foreach ($HakAksesList as $HakAkses) {
                                                ?>
                                                    <option value="<?= $HakAkses["IdAkses"] ?>" <?= $HakAkses["IdAkses"] == $Pengguna["IdAkses"] ? "selected" : "" ?>>
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
                                <input type="submit" class="btn btn-md btn-primary" name="update" value="Update" >
                                <a class="btn btn-danger" href="index.php" role="button">Batal</a>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </form>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        Form Ganti Password
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <?php
                if($Pengguna == null){
                }else{
                    ?>
                        <input type="hidden" name="IdPengguna" value="<?= $Pengguna['IdPengguna'] ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="Password">Password Baru</label>
                                    <input required type="text" class="form-control" id="Password" name="Password" placeholder="Password" value="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-2">
                                <input type="submit" class="btn btn-md btn-primary" name="update" value="Change Passwod" >
                            </div>
                        </div>
                    <?php
                }
            ?>
        </form>
    </div>
</div>