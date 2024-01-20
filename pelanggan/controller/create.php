<?php
try {
    $PelangganPDO->setNamapelanggan($_POST["NamaPelanggan"]);
    $PelangganPDO->setAlamatpelanggan($_POST["Alamat"]);
    $PelangganPDO->setNoHppelanggan($_POST["NoHp"]);
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