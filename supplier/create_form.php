<?php
    if (isset($_POST["NamaSupplier"])) {
        include "./controller/create.php";
    }

    include "../class/hakakses_pdo.php";
    $HakAksesPDO = new HakAkses($connectionPDO);

    $HakAksesList = $HakAksesPDO->getList();
?>
<div class="card">
    <div class="card-header">
        Form Tambah Supplier
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="NamaSupplier">Nama Supplier</label>
                        <input required type="text" class="form-control" id="NamaSupplier" name="NamaSupplier" placeholder="Nama Supplier" required>
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