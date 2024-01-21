<?php
    if (isset($_POST["IdSupplier"])) {
        include "./controller/update.php";
    }

    $HakAksesList = $HakAksesPDO->getList();
    $Supplier = $SupplierPDO->findById($id);
?>
<div class="card">
    <div class="card-header">
        Form Edit Supplier
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <?php
                if($Supplier == null){
                }else{
                    ?>
                        <input type="hidden" name="IdSupplier" value="<?= $Supplier['IdSupplier'] ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NamaSupplier">Nama Supplier</label>
                                    <input required type="text" class="form-control" id="NamaSupplier" placeholder="Nama Supplier" value="<?= $Supplier['NamaSupplier']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NoHp">No Hp</label>
                                    <input required type="telp" class="form-control" id="NoHp" placeholder="No Hp" name="NoHp" value="<?= $Supplier['NoHpSupplier']; ?>" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Alamat">Alamat</label>
                                    <input required type="text" class="form-control" id="Alamat" placeholder="Alamat" name="Alamat" value="<?= $Supplier['AlamatSupplier']; ?>">
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