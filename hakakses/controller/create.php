<?php
try {
    $HakAksesPOD->setNamaAkses($_POST["NamaAkses"]);
    $HakAksesPOD->setKeterangan($_POST["Keterangan"]);
    $HakAksesId = $HakAksesPOD->create();
    header ("location:./index.php?id={$HakAksesId}");
    die();
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Tambah Hak Akses
        </p>
    <?php
}
?>