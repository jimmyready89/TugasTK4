<?php
try {
    $BarangPDO->setNamaBarang($_POST["NamaBarang"]);
    $BarangPDO->setKeterangan($_POST["Keterangan"]);
    $BarangPDO->setSatuan($_POST["Satuan"]);
    $BarangPDO->setIdPengguna($_SESSION['id']);
    $BarangId = $BarangPDO->create();
    header ("location:./index.php?id={$BarangId}");
    die();
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Tambah Barang
        </p>
    <?php
}
?>