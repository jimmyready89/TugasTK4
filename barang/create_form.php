<?php
    if (isset($_POST["NamaBarang"])) {
        include "./controller/create.php";
    }
?>
<div class="card">
    <div class="card-header">
        Tambah Barang
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="">
                <legend> Form Input Barang</legend>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="NamaBarang">Nama Barang</label>
                            <input required type="text" class="form-control" id="NamaBarang" placeholder="Nama Barang" name="NamaBarang">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Satuan">Satuan</label>
                            <input required type="text" class="form-control" id="Satuan" placeholder="Satuan" name="Satuan">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Keterangan">Keterangan</label>
                            <input required type="text" class="form-control" id="Keterangan" placeholder="Keterangan" name="Keterangan">
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