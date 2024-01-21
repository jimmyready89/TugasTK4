<?php
try {
    $PembelianPDO->setIdBarang($_POST["IdBarang"]);
    $PembelianPDO->setIdSupplier($_POST["IdSupplier"]);
    $PembelianPDO->setJumlahPembelian($_POST["JumlahPembelian"]);
    $PembelianPDO->setHargaBeli($_POST["HargaBeli"]);
    $PembelianPDO->setIdPengguna($_SESSION['id']);
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