<?php
try {
    $SupplierPDO->delete($_POST["DelateIdSupplier"]);
    ?>
        <p class="text-success">
            Sukses Hapus Supplier
        </p>
    <?php
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Hapus Supplier
        </p>
    <?php
}
?>