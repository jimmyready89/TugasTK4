<?php
class Pelanggan {
    private $IdPelanggan;
    private $NamaPelanggan;
    private $AlamatPelanggan;
    private $NoHpPelanggan;
    
    private $conn;

    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function setIdPelanggan($IdPelanggan) {
        $this->IdPelanggan = $IdPelanggan;
    }

    function setNamaPelanggan($NamaPelanggan) {
        $this->NamaPelanggan = $NamaPelanggan;
    }

    function setAlamatPelanggan($AlamatPelanggan) {
        $this->AlamatPelanggan = $AlamatPelanggan;
    }

    function setNoHpPelanggan($NoHpPelanggan) {
        $this->NoHpPelanggan = $NoHpPelanggan;
    }

    function getIdPelanggan($IdPelanggan) {
        return $this->IdPelanggan;
    }

    function getNamaPelanggan($NamaPelanggan) {
        return $this->NamaPelanggan;
    }

    function getAlamatPelanggan($AlamatPelanggan) {
        return $this->AlamatPelanggan;
    }

    function getNoHpPelanggan($NoHpPelanggan) {
        return $this->NoHpPelanggan;
    }

    function create() {
        try {
            $query = "
                INSERT INTO Pelanggan(
                    NamaPelanggan,
                    AlamatPelanggan,
                    NoHpPelanggan
                )
                VALUES (
                    ? ,
                    ? ,
                    ?
                )";

            $prepareDB = $this->conn->prepare($query);

            $sqlAddPelanggan = $prepareDB->execute([
                $this->NamaPelanggan,
                $this->AlamatPelanggan,
                $this->NoHpPelanggan
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            throw $e;
        }
    }

    function getList() {
        $query = "
            SELECT
                IdPelanggan,
                NamaPelanggan,
                AlamatPelanggan,
                NoHpPelanggan
            FROM
                Pelanggan
            ORDER
                BY NamaPelanggan ASC
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
                    IdPelanggan,
                    NamaPelanggan,
                    AlamatPelanggan,
                    NoHpPelanggan
                FROM
                    Pelanggan
                WHERE 
                    IdPelanggan = ?
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
                UPDATE Pelanggan SET
                    AlamatPelanggan = ?,
                    NoHpPelanggan = ?
                WHERE 
                    IdPelanggan = ?
            ";

            $prepareDB = $this->conn->prepare($query);

            $PelangganUpdate = $prepareDB->execute([
                $this->AlamatPelanggan,
                $this->NoHpPelanggan,
                $this->IdPelanggan
            ]);

            return $PelangganUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function delete($id) {
        try {
            $query = "DELETE FROM Pelanggan WHERE IdPelanggan = ?";

            $prepareDB = $this->conn->prepare($query);

            $PelangganDelete = $prepareDB->execute([$id]);

            return $PelangganDelete;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>
