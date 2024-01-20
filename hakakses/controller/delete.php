<?php
try {
    $HakAksesPDO->delete($_POST["DelateIdAkses"]);
    ?>
        <p class="text-success">
            Sukses Hapus Hak Akses
        </p>
    <?php
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Hapus Hak Akses
        </p>
    <?php
}
?>