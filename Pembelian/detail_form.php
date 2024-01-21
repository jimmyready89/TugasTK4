<?php
    if (isset($_POST["IdPembelian"])) {
        include "./controller/update.php";
    }

    include "../class/barang_pdo.php";
    $BarangPDO = new Barang($connectionPDO);

    $BarangList = $BarangPDO->getList();

    
    include "../class/supplier_pdo.php";
    $SupplierPDO = new Supplier($connectionPDO);

    $SupplierList = $SupplierPDO->getList();

    $Pembelian = $PembelianPDO->findById($_GET["id"]);
?>
<div class="card">
    <div class="card-header">
        Form Edit Pembelian
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <?php
                if($Pembelian == null){
                }else{
                    ?>
                        <input type="hidden" name="IdPembelian" value="<?= $Pembelian['IdPembelian'] ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="IdBarang">Barang</label>
                                    <select name="IdBarang" id="IdBarang" class="form-select">
                                        <?php
                                            foreach ($BarangList as $Barang) {
                                                ?>
                                                    <option value="<?= $Barang['IdBarang'] ?>" <?= $Barang['IdBarang'] == $Pembelian['IdBarang'] ? "selected" : "" ?>><?= $Barang['NamaBarang'] ?></option>
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
                                                    <option value="<?= $Supplier['IdSupplier'] ?>" <?= $Supplier['IdSupplier'] == $Pembelian['IdSupplier'] ? "selected" : "" ?>><?= $Supplier['NamaSupplier'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="JumlahPembelian">Jumlah Pembelian</label>
                                    <input type="number" class="form-control" id="JumlahPembelian" placeholder="JumlahPembelian" name="JumlahPembelian" value="<?= $Pembelian['JumlahPembelian'] ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="HargaBeli">Harga Beli</label>
                                    <input type="number" class="form-control" id="HargaBeli" placeholder="No Hp" name="HargaBeli" value="<?= $Pembelian['HargaBeli'] ?>" required>
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