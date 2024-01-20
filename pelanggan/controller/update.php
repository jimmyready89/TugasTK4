<?php
if (isset($_POST["update"])) {
    try {
        $PelangganPDO->setNoHpPelanggan($_POST["NoHpPelanggan"]);
        $PelangganPDO->setAlamatPelanggan($_POST["AlamatPelanggan"]);
        $PelangganPDO->update();
        ?>
            <p class="text-success">
                Sukses update Pelanggan
            </p>
        <?php
    } catch (\Throwable $th) {
        ?>
            <p class="text-danger">
                Gagal update Pelanggan
            </p>
        <?php
    }
}
?>