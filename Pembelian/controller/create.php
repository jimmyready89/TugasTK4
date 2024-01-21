<?php
try {
    $PembelianPDO->setIdBarang($_POST["IdBarang"]);
    $PembelianPDO->setIdSupplier($_POST["IdSupplier"]);
    $PembelianPDO->setJumlahPembelian($_POST["JumlahPembelian"]);
    $PembelianPDO->setHargaBeli($_POST["HargaBeli"]);
    $PembelianPDO->setIdPengguna(1);
    $IdPembelian = $PembelianPDO->create();
    header ("location:./index.php?id={$IdPembelian}");
    die();
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Tambah Pembelian
        </p>
    <?php
}
?>