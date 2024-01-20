<?php
try {
    $PenggunaPDO->delete($_POST["DelateIdPengguna"]);
    ?>
        <p class="text-success">
            Sukses Hapus Pengguna
        </p>
    <?php
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Hapus Pengguna
        </p>
    <?php
}
?>