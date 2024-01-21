<?php
include "../session_start.php";
include "../session_autentiocation.php";
include "../database_connection.php";
include "../class/barang_pdo.php";
include "../class/pelanggan_pdo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas TK 4</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        include "navbar.php";
        $PelangganPDO = new Pelanggan($connectionPDO);
        $PelangganList = $PelangganPDO->getList();

        $BarangPDO = new Barang($connectionPDO);
        $CombinationItem = $BarangPDO->getCombinationItem();

        if (isset($_POST["Tambah"])) {
            include "./controller/create_combination.php";
        }

        $CombinationSelected = [];
        $Id = $_GET["id"];

        foreach ($CombinationItem as $CombinationKey => $Combination) {
            if ($Id == $CombinationKey) {
                $CombinationSelected = $Combination;
            }
        }

        if ($CombinationSelected == []) {
            ?>
                <p class="text-danger">
                    Combinasi tidak tersedia
                </p>
            <?php
            die();
        }
    ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Form Penjualan Combination
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="">
                    <input type="hidden" name="IdCombination" value="<?= $Id ?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="IdBarang">Barang</label>
                                <input type="text" class="form-control" value="<?= $CombinationSelected[0]["NamaBarang"] ?> + <?= $CombinationSelected[1]["NamaBarang"] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="HargaJual">Harga Jual</label>
                                <input type="text" class="form-control" value="<?= number_format($Combination[0]["HargaJual"] + $Combination[1]["HargaJual"]) ?>" readonly>
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
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>