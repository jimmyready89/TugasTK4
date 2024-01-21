<?php
    if (isset($_POST["IdPenjualan"])) {
        include "./controller/update.php";
    }

    include "../class/barang_pdo.php";
    $BarangPDO = new Barang($connectionPDO);
    $BarangList = $BarangPDO->getList();

    include "../class/pelanggan_pdo.php";
    $PelangganPDO = new Pelanggan($connectionPDO);
    $PelangganList = $PelangganPDO->getList();

    $Penjualan = $PenjualanPDO->findById($_GET["id"]);
?>
<div class="card">
    <div class="card-header">
        Form Edit Penjualan
        <?php
            if($Penjualan != null){
                ?>
                    <span style="float:right">
                        Dibuat Oleh : <?= $Penjualan["NamaPengguna"] ?>
                    </span>
                <?php
            }
        ?>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <?php
                if($Penjualan == null){
                }else{
                    ?>
                        <input type="hidden" name="IdPenjualan" value="<?= $Penjualan['IdPenjualan'] ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="IdBarang">Barang</label>
                                    <select name="IdBarang" id="IdBarang" class="form-select">
                                        <?php
                                            foreach ($BarangList as $Barang) {
                                                ?>
                                                    <option value="<?= $Barang['IdBarang'] ?>" <?= $Barang['IdBarang'] == $Penjualan['IdBarang'] ? "selected" : "" ?>><?= $Barang['NamaBarang'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="IdPelanggan">Pelanggan</label>
                                    <select name="IdPelanggan" id="IdPelanggan" class="form-select">
                                        <?php
                                            foreach ($PelangganList as $Pelanggan) {
                                                ?>
                                                    <option value="<?= $Pelanggan['IdPelanggan'] ?>" <?= $Pelanggan['IdPelanggan'] == $Penjualan['IdPelanggan'] ? "selected" : "" ?>><?= $Pelanggan['NamaPelanggan'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="JumlahPenjualan">Jumlah Penjualan</label>
                                    <input type="number" class="form-control" id="JumlahPenjualan" placeholder="JumlahPenjualan" name="JumlahPenjualan" value="<?= $Penjualan['JumlahPenjualan'] ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="HargaJual">Harga Jual</label>
                                    <input type="number" class="form-control" id="HargaJual" placeholder="No Hp" name="HargaJual" value="<?= $Penjualan['HargaJual'] ?>" required>
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