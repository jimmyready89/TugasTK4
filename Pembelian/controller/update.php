<?php
if (isset($_POST["update"])) {
    try {
        $PembelianPDO->setIdPembelian($_POST["IdPembelian"]);
        $PembelianPDO->setIdBarang($_POST["IdBarang"]);
        $PembelianPDO->setIdSupplier($_POST["IdSupplier"]);
        $PembelianPDO->setJumlahPembelian($_POST["JumlahPembelian"]);
        $PembelianPDO->setHargaBeli($_POST["HargaBeli"]);
        $PembelianPDO->update();
        ?>
            <p class="text-success">
                Sukses update Pembelian
            </p>
        <?php
    } catch (\Throwable $th) {
        ?>
            <p class="text-danger">
                Gagal update Pembelian
            </p>
        <?php
    }
}
?>