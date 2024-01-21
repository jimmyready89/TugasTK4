<?php
class Pembelian {
    private $IdPembelian;
    private $JumlahPembelian;
    private $HargaBeli;
    private $IdBarang;
    private $IdSupplier;
    private $IdPengguna;
    
    private $conn;

    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function setIdPembelian($IdPembelian) {
        $this->IdPembelian = $IdPembelian;
    }

    function setJumlahPembelian($JumlahPembelian){
        $this->JumlahPembelian = $JumlahPembelian;
    }

    function setHargaBeli($HargaBeli){
        $this->HargaBeli = $HargaBeli;
    }

    function setIdBarang($IdBarang){
        $this->IdBarang = $IdBarang;
    }

    function setIdSupplier($IdSupplier){
        $this->IdSupplier = $IdSupplier;
    }

    function setIdPengguna($IdPengguna){
        $this->IdPengguna = $IdPengguna;
    }

    function getIdPembelian($IdPembelian) {
        return $this->IdPembelian;
    }

    function getJumlahPembelian(){
        return $this->JumlahPembelian;
    }

    function getHargaBeli(){
        return $this->HargaBeli;
    }

    function getIdBarang(){
        return $this->IdBarang;
    }

    function getIdSupplier(){
        return $this->IdSupplier;
    }

    function getIdPengguna(){
        return $this->IdSupplier;
    }

    function create() {
        try {
            $query = "
                INSERT INTO Pembelian(
                    JumlahPembelian,
                    HargaBeli,
                    IdBarang,
                    IdSupplier,
                    IdPengguna
                )
                VALUES (
                    ? ,
                    ? ,
                    ? ,
                    ? ,
                    ?
                )";

            $prepareDB = $this->conn->prepare($query);

            $sqlAddPembelian = $prepareDB->execute([
                $this->JumlahPembelian,
                $this->HargaBeli,
                $this->IdBarang,
                $this->IdSupplier,
                $this->IdPengguna
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            throw $e;
        }
    }

    function getList() {
        $query = "
            SELECT
                Pembelian.IdPembelian,
                Pembelian.JumlahPembelian,
                Pembelian.HargaBeli,
                Barang.NamaBarang
            FROM
                Pembelian
                Left Join Barang on
                    Barang.IdBarang = Pembelian.IdBarang
            ORDER
                BY Pembelian.IdPembelian ASC
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
                    IdPembelian,
                    JumlahPembelian,
                    HargaBeli,
                    IdBarang,
                    IdSupplier
                FROM
                    Pembelian
                WHERE 
                    IdPembelian = ?
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
                UPDATE Pembelian SET
                    JumlahPembelian = ?,
                    HargaBeli = ?,
                    IdBarang = ?,
                    IdSupplier = ?
                WHERE 
                    IdPembelian = ?
            ";

            $prepareDB = $this->conn->prepare($query);

            $PembelianUpdate = $prepareDB->execute([
                $this->JumlahPembelian,
                $this->HargaBeli,
                $this->IdBarang,
                $this->IdSupplier,
                $this->IdPembelian
            ]);

            return $PembelianUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function delete($id) {
        try {
            $query = "DELETE FROM Pembelian WHERE IdPembelian = ?";

            $prepareDB = $this->conn->prepare($query);

            $PembelianDelete = $prepareDB->execute([$id]);

            return $PembelianDelete;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>
