<?php
class Pengguna {
    private $IdPengguna;
    private $NamaPengguna;
    private $Password;
    private $NamaDepan;
    private $NamaBelakang;
    private $NoHp;
    private $Alamat;
    private $IdAkses;

    private $conn;

    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function setIdPengguna($IdPengguna) {
        $this->IdPengguna = $IdPengguna;
    }

    function setNamaPengguna($NamaPengguna) {
        $this->NamaPengguna = $NamaPengguna;
    }

    function setPassword($Password) {
        $this->Password = hash("sha256", $Password);
    }
    
    function setNamaDepan($NamaDepan) {
        $this->NamaDepan = $NamaDepan;
    }

    function setNamaBelakang($NamaBelakang) {
        $this->NamaBelakang = $NamaBelakang;
    }

    function setNoHp($NoHp) {
        $this->NoHp = $NoHp;
    }

    function setAlamat($Alamat) {
        $this->Alamat = $Alamat;
    }

    function setIdAkses($IdAkses) {
        $this->IdAkses = $IdAkses;
    }

    function getIdPengguna() {
        return $this->IdPengguna;
    }

    function getNamaPengguna() {
        return $this->NamaPengguna;
    }

    function getPassword() {
        return $this->Password;
    }
    
    function getNamaDepan($NamaDepan) {
        return $this->NamaDepan;
    }

    function getNamaBelakang($NamaBelakang) {
        return $this->NamaBelakang;
    }

    function getNoHp($NoHp) {
        return $this->NoHp;
    }

    function getAlamat($Alamat) {
        return $this->Alamat;
    }

    function getIdAkses($IdAkses) {
        return $this->IdAkses;
    }

    function create() {
        try {
            $query = "
                INSERT INTO Pengguna(
                    NamaPengguna,
                    Password,
                    NamaDepan,
                    NamaBelakang,
                    NoHp,
                    Alamat,
                    IdAkses
                )
                VALUES (
                    ? ,
                    ? ,
                    ? ,
                    ? ,
                    ? ,
                    ? ,
                    ? 
                )";

            $prepareDB = $this->conn->prepare($query);

            $sqlAddPengguna = $prepareDB->execute([
                $this->NamaPengguna,
                $this->Password,
                $this->NamaDepan,
                $this->NamaBelakang,
                $this->NoHp,
                $this->Alamat,
                $this->IdAkses
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            throw $e;
        }
    }

    function getList() {
        $query = "
            SELECT
                Pengguna.IdPengguna,
                Pengguna.NamaPengguna,
                Pengguna.NamaDepan,
                Pengguna.NamaBelakang,
                Pengguna.NoHp,
                Pengguna.Alamat,
                HakAkses.NamaAkses
            FROM
                Pengguna
                left join HakAkses
                    on Pengguna.IdAkses = HakAkses.IdAkses
            ORDER
                BY NamaPengguna ASC
        ";

        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $getList = $prepareDB->fetchAll();

        return $getList;
    }

    function findById($id) {
        try { 
            $query = "
                SELECT
                    IdPengguna,
                    NamaPengguna,
                    NamaDepan,
                    NamaBelakang,
                    NoHp,
                    Alamat,
                    IdAkses
                FROM
                    Pengguna
                WHERE 
                    IdPengguna = ?
            ";

            $prepareDB = $this->conn->prepare($query);

            $prepareDB->execute([$id]);
            $findById = $prepareDB->fetchAll();

            return $findById[0] ?? null;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function update() {
        try {
            $query = "
                UPDATE Pengguna SET
                    NamaDepan = ?,
                    NamaBelakang = ?,
                    NoHp = ?,
                    Alamat = ?,
                    IdAkses = ?
                WHERE 
                    IdPengguna = ?
            ";

            $prepareDB = $this->conn->prepare($query);

            $PenggunaUpdate = $prepareDB->execute([
                $this->NamaDepan,
                $this->NamaBelakang,
                $this->NoHp,
                $this->Alamat,
                $this->IdAkses,
                $this->IdPengguna
            ]);

            return $PenggunaUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function updatePassword() {
        try {
            $query = "
                UPDATE Pengguna SET
                    Password = ?
                WHERE 
                    IdPengguna = ?";

            $prepareDB = $this->conn->prepare($query);

            $PenggunaUpdate = $prepareDB->execute([
                $this->Password,
                $this->IdPengguna
            ]);

            return $PenggunaUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function delete($id) {
        try {
            $query = "DELETE FROM Pengguna WHERE IdPengguna = ?";

            $prepareDB = $this->conn->prepare($query);

            $PenggunaDelete = $prepareDB->execute([$id]);

            return $PenggunaDelete;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function login() {
        try { 
            $query = "
                SELECT
                    IdPengguna,
                    NamaPengguna
                FROM
                    Pengguna
                WHERE 
                    NamaPengguna = ?
                    and Password = ?
            ";

            $prepareDB = $this->conn->prepare($query);

            $prepareDB->execute([
                $this->NamaPengguna,
                $this->Password
            ]);

            $findById = $prepareDB->fetchAll();

            return $findById[0] ?? null;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>
