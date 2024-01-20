<?php
if (isset($_POST["update"])) {
    try {
        $SupplierPDO->setIdSupplier($_POST["IdSupplier"]);
        $SupplierPDO->setNoHpSupplier($_POST["NoHp"]);
        $SupplierPDO->setAlamatSupplier($_POST["Alamat"]);
        $SupplierPDO->update();
        ?>
            <p class="text-success">
                Sukses update Supplier
            </p>
        <?php
    } catch (\Throwable $th) {
        ?>
            <p class="text-danger">
                Gagal update Supplier
            </p>
        <?php
    }
}
?>