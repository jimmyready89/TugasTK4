<?php
if (isset($_POST["update"])) {
    try {
        $PelangganPDO->setIdPelanggan($_POST["IdPelanggan"]);
        $PelangganPDO->setNoHpPelanggan($_POST["NoHp"]);
        $PelangganPDO->setAlamatPelanggan($_POST["Alamat"]);
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