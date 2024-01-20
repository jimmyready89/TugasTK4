<?php
class pelanggan {
    private $Idpelanggan;
    private $Namapelanggan;
    private $Alamatpelanggan;
    private $NoHppelanggan;
    
    private $conn;

    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function setIdpelanggan($Idpelanggan) {
        $this->Idpelanggan = $Idpelanggan;
    }

    function setNamapelanggan($Namapelanggan) {
        $this->Namapelanggan = $Namapelanggan;
    }

    function setAlamatpelanggan($Alamatpelanggan) {
        $this->Alamatpelanggan = $Alamatpelanggan;
    }

    function setNoHppelanggan($NoHppelanggan) {
        $this->NoHppelanggan = $NoHppelanggan;
    }

    function getIdpelanggan($Idpelanggan) {
        return $this->Idpelanggan;
    }

    function getNamapelanggan($Namapelanggan) {
        return $this->Namapelanggan;
    }

    function getAlamatpelanggan($Alamatpelanggan) {
        return $this->Alamatpelanggan;
    }

    function getNoHppelanggan($NoHppelanggan) {
        return $this->NoHppelanggan;
    }

    function create() {
        try {
            $query = "
                INSERT INTO pelanggan(
                    Namapelanggan,
                    Alamatpelanggan,
                    NoHppelanggan
                )
                VALUES (
                    ? ,
                    ? ,
                    ?
                )";

            $prepareDB = $this->conn->prepare($query);

            $sqlAddpelanggan = $prepareDB->execute([
                $this->Namapelanggan,
                $this->Alamatpelanggan,
                $this->NoHppelanggan
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            throw $e;
        }
    }

    function getList() {
        $query = "
            SELECT
                Idpelanggan,
                Namapelanggan,
                Alamatpelanggan,
                NoHppelanggan
            FROM
                pelanggan
            ORDER
                BY Namapelanggan ASC
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
                    Idpelanggan,
                    Namapelanggan,
                    Alamatpelanggan,
                    NoHppelanggan
                FROM
                    pelanggan
                WHERE 
                    Idpelanggan = ?
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
                UPDATE pelanggan SET
                    Alamatpelanggan = ?,
                    NoHppelanggan = ?
                WHERE 
                    Idpelanggan = ?
            ";

            $prepareDB = $this->conn->prepare($query);

            $pelangganUpdate = $prepareDB->execute([
                $this->Alamatpelanggan,
                $this->NoHppelanggan,
                $this->Idpelanggan
            ]);

            return $pelangganUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function delete($id) {
        try {
            $query = "DELETE FROM pelanggan WHERE Idpelanggan = ?";

            $prepareDB = $this->conn->prepare($query);

            $pelangganDelete = $prepareDB->execute([$id]);

            return $pelangganDelete;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>
