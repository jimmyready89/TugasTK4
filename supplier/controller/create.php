<?php
try {
    $SupplierPDO->setNamaSupplier($_POST["NamaSupplier"]);
    $SupplierPDO->setAlamatSupplier($_POST["Alamat"]);
    $SupplierPDO->setNoHpSupplier($_POST["NoHp"]);
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