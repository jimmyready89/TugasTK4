<?php
    if (isset($_POST["IdBarang"])) {
        include "./controller/create.php";
    }

    include "../class/barang_pdo.php";
    $BarangPDO = new Barang($connectionPDO);
    $BarangList = $BarangPDO->getList();
    
    include "../class/supplier_pdo.php";
    $SupplierPDO = new Supplier($connectionPDO);

    $SupplierList = $SupplierPDO->getList();
?>
<div class="card">
    <div class="card-header">
        Form Tambah Pembelian
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
                                        <option value="<?= $Barang['IdBarang'] ?>"><?= $Barang['NamaBarang'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="IdSupplier">Supplier</label>
                        <select name="IdSupplier" id="IdSupplier" class="form-select">
                            <?php
                                foreach ($SupplierList as $Supplier) {
                                    ?>
                                        <option value="<?= $Supplier['IdSupplier'] ?>"><?= $Supplier['NamaSupplier'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="JumlahPembelian">Jumlah Pembelian</label>
                        <input type="number" class="form-control" id="JumlahPembelian" placeholder="Jumlah Pembelian" name="JumlahPembelian" value="" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="HargaBeli">Harga Beli</label>
                        <input type="number" class="form-control" id="HargaBeli" placeholder="Harga Beli" name="HargaBeli" value="" required>
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