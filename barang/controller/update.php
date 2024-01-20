<?php
try {
    $BarangPDO->setIdBarang($_POST["IdBarang"]);
    $BarangPDO->setNamaBarang($_POST["NamaBarang"]);
    $BarangPDO->setKeterangan($_POST["Keterangan"]);
    $BarangPDO->setSatuan($_POST["Satuan"]);
    $BarangPDO->update();
    ?>
        <p class="text-success">
            Sukses Update Barang
        </p>
    <?php
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Update Barang
        </p>
    <?php
}
?>