<?php
try {
    $PenjualanPDO->setIdBarang($_POST["IdBarang"]);
    $PenjualanPDO->setIdPelanggan($_POST["IdPelanggan"]);
    $PenjualanPDO->setJumlahPenjualan($_POST["JumlahPenjualan"]);
    $PenjualanPDO->setHargaJual($_POST["HargaJual"]);
    $PenjualanPDO->setIdPengguna(1);
    $IdPenjualan = $PenjualanPDO->create();
    header ("location:./index.php?id={$IdPenjualan}");
    die();
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Tambah Penjualan
        </p>
    <?php
}
?>