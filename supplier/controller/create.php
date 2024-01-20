<?php
try {
    $SupplierPDO->setNamapelanggan($_POST["NamaSupplier"]);
    $SupplierPDO->setAlamatpelanggan($_POST["Alamat"]);
    $SupplierPDO->setNoHppelanggan($_POST["NoHp"]);
    $IdSupplier = $SupplierPDO->create();
    header ("location:./index.php?id={$IdSupplier}");
    die();
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Tambah Supplier
        </p>
    <?php
}
?>