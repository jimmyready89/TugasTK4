<?php
if (isset($_POST["update"])) {
    if ($_POST["update"] == "Change Passwod") {
        try {
            $PenggunaPDO->setIdPengguna($_POST["IdPengguna"]);
            $PenggunaPDO->setPassword($_POST["Password"]);
            $PenggunaPDO->updatePassword();
            ?>
                <p class="text-success">
                    Sukses Password Pengguna
                </p>
            <?php
        } catch (\Throwable $th) {
            ?>
                <p class="text-danger">
                    Gagal Password Pengguna
                </p>
            <?php
        }
    }else{
        try {
            $PenggunaPDO->setIdPengguna($_POST["IdPengguna"]);
            $PenggunaPDO->setNamaDepan($_POST["NamaDepan"]);
            $PenggunaPDO->setNamaBelakang($_POST["NamaBelakang"]);
            $PenggunaPDO->setNoHp($_POST["NoHp"]);
            $PenggunaPDO->setAlamat($_POST["Alamat"]);
            $PenggunaPDO->setIdAkses($_POST["IdHakAkses"]);
            $PenggunaPDO->update();
            ?>
                <p class="text-success">
                    Sukses Update Pengguna
                </p>
            <?php
        } catch (\Throwable $th) {
            ?>
                <p class="text-danger">
                    Gagal Update Pengguna
                </p>
            <?php
        }
    }
}
?>