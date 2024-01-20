<?php
    if (isset($_POST["IdPelanggan"])) {
        include "./controller/update.php";
    }

    include "../class/hakakses_pdo.php";
    $HakAksesPDO = new HakAkses($connectionPDO);

    $HakAksesList = $HakAksesPDO->getList();
    $Pelanggan = $PelangganPDO->findById($id);
?>
<div class="card">
    <div class="card-header">
        Form Edit Pelanggan
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <?php
                if($Pelanggan == null){
                }else{
                    ?>
                        <input type="hidden" name="IdPelanggan" value="<?= $Pelanggan['Idpelanggan'] ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NamaPelanggan">Nama Pelanggan</label>
                                    <input required type="text" class="form-control" id="NamaPelanggan" placeholder="Nama Pelanggan" value="<?= $Pelanggan['Namapelanggan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NoHp">No Hp</label>
                                    <input required type="telp" class="form-control" id="NoHp" placeholder="No Hp" name="NoHp" value="<?= $Pelanggan['NoHppelanggan']; ?>" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Alamat">Alamat</label>
                                    <input required type="text" class="form-control" id="Alamat" placeholder="Alamat" name="Alamat" value="<?= $Pelanggan['Alamatpelanggan']; ?>">
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