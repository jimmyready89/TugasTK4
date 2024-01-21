<?php
try {
    $PenjualanPDO = new Penjualan($connectionPDO);
    $BarangPDO = new Barang($connectionPDO);
    $CombinationItem = $BarangPDO->getCombinationItem();

    $CombinationSelected = [];
    $Id = $_POST["IdCombination"];

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

    foreach ($CombinationSelected as $Item) {
        $PenjualanPDO->setIdBarang($Item["IdBarang"]);
        $PenjualanPDO->setIdPelanggan($_POST["IdPelanggan"]);
        $PenjualanPDO->setJumlahPenjualan($_POST["JumlahPenjualan"]);
        $PenjualanPDO->setHargaJual($Item["HargaJual"]);
        $PenjualanPDO->setIdPengguna($_SESSION['id']);
        $IdPenjualan = $PenjualanPDO->create();
    }
    header ("location:./index.php");
    die();
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Tambah Penjualan
        </p>
    <?php
}
?>