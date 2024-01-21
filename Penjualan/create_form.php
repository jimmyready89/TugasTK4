<?php
    if (isset($_POST["IdBarang"])) {
        include "./controller/create.php";
    }

    include "../class/barang_pdo.php";
    $BarangPDO = new Barang($connectionPDO);

    $BarangList = $BarangPDO->getListCanBeSell();

    
    include "../class/pelanggan_pdo.php";
    $PelangganPDO = new Pelanggan($connectionPDO);

    $PelangganList = $PelangganPDO->getList();
?>
<div class="card">
    <div class="card-header">
        Form Tambah Penjualan
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="IdBarang">Barang</label>
                        <select name="IdBarang" id="IdBarang" class="form-select">
                            <?php
                                foreach ($BarangList as $Barang) {
                                    ?>
                                        <option value="<?= $Barang['IdBarang'] ?>"><?= $Barang['NamaBarang'] ?> (<?= $Barang['SisaStok'] ?>)</option>
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
                                        <option value="<?= $Pelanggan['IdPelanggan'] ?>"><?= $Pelanggan['NamaPelanggan'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="JumlahPenjualan">Jumlah Penjualan</label>
                        <input type="number" class="form-control" id="JumlahPenjualan" placeholder="Jumlah Penjualan" name="JumlahPenjualan" value="" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="HargaJual">Harga Jual</label>
                        <input type="number" class="form-control" id="HargaJual" placeholder="Harga Jual" name="HargaJual" value="" required>
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