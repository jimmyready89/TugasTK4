<?php
try {
    $PembelianPDO->delete($_POST["DelateIdPembelian"]);
    ?>
        <p class="text-success">
            Sukses Hapus Pembelian
        </p>
    <?php
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Hapus Pembelian
        </p>
    <?php
}
?>