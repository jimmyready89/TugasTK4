<?php
try {
    $PenggunaPDO->setNamaPengguna($_POST["NamaPengguna"]);
    $PenggunaPDO->setPassword($_POST["Password"]);
    $PenggunaPDO->setNamaDepan($_POST["NamaDepan"]);
    $PenggunaPDO->setNamaBelakang($_POST["NamaBelakang"]);
    $PenggunaPDO->setNoHp($_POST["NoHp"]);
    $PenggunaPDO->setAlamat($_POST["Alamat"]);
    $PenggunaPDO->setIdAkses($_POST["IdHakAkses"]);
    $IdPengguna = $PenggunaPDO->create();
    header ("location:./index.php?id={$IdPengguna}");
    die();
} catch (\Throwable $th) {
    ?>
        <p class="text-danger">
            Gagal Tambah Pengguna
        </p>
    <?php
}
?>