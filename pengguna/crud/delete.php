<?php
try {
    $PenggunaPDO->delete($_POST["DelateIdPengguna"]);
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