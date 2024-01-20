<?php
class Supplier {
    private $IdSupplier;
    private $NamaSupplier;
    private $AlamatSupplier;
    private $NoHpSupplier;
    
    private $conn;

    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function setIdSupplier($IdSupplier) {
        $this->IdSupplier = $IdSupplier;
    }

    function setNamaSupplier($NamaSupplier) {
        $this->NamaSupplier = $NamaSupplier;
    }

    function setAlamatSupplier($AlamatSupplier) {
        $this->AlamatSupplier = $AlamatSupplier;
    }

    function setNoHpSupplier($NoHpSupplier) {
        $this->NoHpSupplier = $NoHpSupplier;
    }

    function getIdSupplier($IdSupplier) {
        return $this->IdSupplier;
    }

    function getNamaSupplier($NamaSupplier) {
        return $this->NamaSupplier;
    }

    function getAlamatSupplier($AlamatSupplier) {
        return $this->AlamatSupplier;
    }

    function getNoHpSupplier($NoHpSupplier) {
        return $this->NoHpSupplier;
    }

    function create() {
        try {
            $query = "
                INSERT INTO Supplier(
                    NamaSupplier,
                    AlamatSupplier,
                    NoHpSupplier
                )
                VALUES (
                    ? ,
                    ? ,
                    ?
                )";

            $prepareDB = $this->conn->prepare($query);

            $sqlAddSupplier = $prepareDB->execute([
                $this->NamaSupplier,
                $this->AlamatSupplier,
                $this->NoHpSupplier
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            throw $e;
        }
    }

    function getList() {
        $query = "
            SELECT
                IdSupplier,
                NamaSupplier,
                AlamatSupplier,
                NoHpSupplier
            FROM
                Supplier
            ORDER
                BY NamaSupplier ASC
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
                    IdSupplier,
                    NamaSupplier,
                    AlamatSupplier,
                    NoHpSupplier
                FROM
                    Supplier
                WHERE 
                    IdSupplier = ?
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
                UPDATE Supplier SET
                    AlamatSupplier = ?,
                    NoHpSupplier = ?
                WHERE 
                    IdSupplier = ?
            ";

            $prepareDB = $this->conn->prepare($query);

            $SupplierUpdate = $prepareDB->execute([
                $this->AlamatSupplier,
                $this->NoHpSupplier,
                $this->IdSupplier
            ]);

            return $SupplierUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function delete($id) {
        try {
            $query = "DELETE FROM Supplier WHERE IdSupplier = ?";

            $prepareDB = $this->conn->prepare($query);

            $SupplierDelete = $prepareDB->execute([$id]);

            return $SupplierDelete;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>
