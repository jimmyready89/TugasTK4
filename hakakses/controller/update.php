<?php
try {
    $HakAksesPDO->setIdAkses($_POST["IdAkses"]);
    $HakAksesPDO->setNamaAkses($_POST["NamaAkses"]);
    $HakAksesPDO->setKeterangan($_POST["Keterangan"]);
    $HakAksesPDO->update();
    ?>
        <p class="text-success">
            Sukses Update Hak Akses
        </p>
    <?php
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Update Hak Akses
        </p>
    <?php
}
?>