<?php
    if (isset($_POST["IdAkses"])) {
        include "./crud/update.php";
    }
    $HakAkses = $HakAksesPDO->findById($id);
?>
<div class="card">
    <div class="card-header">
        Edit Hak Akses
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="">
            <?php
                if($HakAkses == null){
                }else{
                    ?>
                        <legend>Form Edit Hak Akses</legend>
                        <input type="hidden" name="IdAkses" value="<?= $HakAkses['IdAkses'] ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="NamaAkses">Nama Hak Akses</label>
                                    <input required type="text" class="form-control" id="NamaAkses" placeholder="Nama Hak Akses" name="NamaAkses" value="<?= $HakAkses['NamaAkses']; ?>" required>
                                </div>
                                <div class="col-6">
                                    <label for="KeteranganAkses">Keterangan Hak Akses</label>
                                    <input required type="text" class="form-control" id="KeteranganAkses" placeholder="Keterangan Hak Akses" name="Keterangan" value="<?= $HakAkses['Keterangan']; ?>" required>
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