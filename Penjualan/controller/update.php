<?php
if (isset($_POST["update"])) {
    try {
        $PenjualanPDO->setIdPenjualan($_POST["IdPenjualan"]);
        $PenjualanPDO->setIdBarang($_POST["IdBarang"]);
        $PenjualanPDO->setIdSupplier($_POST["IdSupplier"]);
        $PenjualanPDO->setJumlahPenjualan($_POST["JumlahPenjualan"]);
        $PenjualanPDO->setHargaJual($_POST["HargaJual"]);
        $PenjualanPDO->update();
        ?>
            <p class="text-success">
                Sukses update Penjualan
            </p>
        <?php
    } catch (\Throwable $th) {
        ?>
            <p class="text-danger">
                Gagal update Penjualan
            </p>
        <?php
    }
}
?>