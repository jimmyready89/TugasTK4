<?php
try {
    $PenjualanPDO->delete($_POST["DelateIdPenjualan"]);
    ?>
        <p class="text-success">
            Sukses Hapus Penjualan
        </p>
    <?php
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Hapus Penjualan
        </p>
    <?php
}
?>