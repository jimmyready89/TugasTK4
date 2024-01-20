<?php
try {
    $PelangganPDO->delete($_POST["DelateIdPelanggan"]);
    ?>
        <p class="text-success">
            Sukses Hapus Pelanggan
        </p>
    <?php
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Hapus Pelanggan
        </p>
    <?php
}
?>