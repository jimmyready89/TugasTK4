<?php
try {
    $BarangPDO->delete($_POST["DelateIdBarang"]);
    ?>
        <p class="text-success">
            Sukses Hapus Barang
        </p>
    <?php
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Hapus Barang
        </p>
    <?php
}
?>