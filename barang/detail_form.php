<?php
    if (isset($_POST["IdBarang"])) {
        include "./controller/update.php";
    }
    $Barang = $BarangPDO->findById($id);
?>
<div class="card">
    <div class="card-header">
        Edit Barang
        <?php
            if($Barang != null){
                ?>
                    <span style="float:right">
                        Dibuat Oleh : <?= $Barang["NamaPengguna"] ?>
                    </span>
                <?php
            }
        ?>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <?php
                if($Barang == null){
                }else{
                    ?>
                        <legend>Form Edit Barang</legend>
                        <input type="hidden" name="IdBarang" value="<?= $Barang["IdBarang"] ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NamaBarang">Nama Barang</label>
                                    <input required type="text" class="form-control" id="NamaBarang" placeholder="Nama Barang" name="NamaBarang" value="<?= $Barang["NamaBarang"] ?>" require>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="Satuan">Satuan</label>
                                    <input required type="text" class="form-control" id="Satuan" placeholder="Satuan" name="Satuan" value="<?= $Barang["Satuan"] ?>" require>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="Keterangan">Keterangan</label>
                                    <input required type="text" class="form-control" id="Keterangan" placeholder="Keterangan" name="Keterangan" value="<?= $Barang["Keterangan"] ?>" require>
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