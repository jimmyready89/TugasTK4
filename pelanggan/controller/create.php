<?php
try {
    $PelangganPDO->setNamaPelanggan($_POST["NamaPelanggan"]);
    $PelangganPDO->setAlamatPelanggan($_POST["Alamat"]);
    $PelangganPDO->setNoHpPelanggan($_POST["NoHp"]);
    $IdPelanggan = $PelangganPDO->create();
    header ("location:./index.php?id={$IdPelanggan}");
    die();
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Tambah Pelanggan
        </p>
    <?php
}
?>