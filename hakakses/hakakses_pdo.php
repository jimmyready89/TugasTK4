<?php
class HakAkses {
    private $IdAkses;
    private $NamaAkses;
    private $Keterangan;

    private $conn;

    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function setIdAkses($IdAkses) {
        $this->IdAkses = $IdAkses;
    }

    function setNamaAkses($NamaAkses) {
        $this->NamaAkses = $NamaAkses;
    }

    function setKeterangan($Keterangan) {
        $this->Keterangan = $Keterangan;
    }

    function getIdAkses() {
        return $this->IdAkses;
    }

    function getNamaAkses() {
        return $this->NamaAkses;
    }

    function getKeterangan() {
        return $this->Keterangan;
    }

    function create() {
        try {
            $query = "INSERT INTO HakAkses(NamaAkses, Keterangan) VALUES (?, ?)";

            $prepareDB = $this->conn->prepare($query);

            $sqlAddHakAkses = $prepareDB->execute([
                $this->NamaAkses,
                $this->Keterangan,
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            throw $e;
        }
    }

    function getList() {
        $query = "SELECT * FROM HakAkses ORDER BY NamaAkses ASC";

        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $getList = $prepareDB->fetchAll();

        return $getList;
    }

    function findById($id) {
        try { 
            $query = "SELECT * FROM HakAkses WHERE IdAkses = ?";

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
            $query = "UPDATE HakAkses SET NamaAkses = ?, Keterangan  = ? WHERE IdAkses = ?";

            $prepareDB = $this->conn->prepare($query);

            $HakAksesUpdate = $prepareDB->execute([
                $this->NamaAkses,
                $this->Keterangan,
                $this->IdAkses
            ]);

            return $HakAksesUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function delete($id) {
        try {
            $query = "DELETE FROM HakAkses WHERE IdAkses = ?";

            $prepareDB = $this->conn->prepare($query);

            $HakAksesDelete = $prepareDB->execute([$id]);

            return $HakAksesDelete;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>
