<?php
    if (isset($_POST["NamaAkses"])) {
        include "./controller/create.php";
    }
?>
<div class="card">
    <div class="card-header">
        Tambah Hak Akses
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="">
                <legend> Form Input Hak Akses</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="NamaAkses">Nama Hak Akses</label>
                            <input required type="text" class="form-control" id="NamaAkses" placeholder="Nama Hak Akses" name="NamaAkses">
                        </div>
                        <div class="col-6">
                            <label for="KeteranganAkses">Keterangan Hak Akses</label>
                            <input required type="text" class="form-control" id="KeteranganAkses" placeholder="Keterangan Hak Akses" name="Keterangan">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" name="simpan" value="Tambah">
                        <a href="./index.php" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>