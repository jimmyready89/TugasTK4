<?php
class Penjualan {
    private $IdPenjualan;
    private $JumlahPenjualan;
    private $HargaJual;
    private $IdBarang;
    private $IdPelanggan;
    private $IdPengguna;
    
    private $conn;

    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function setIdPenjualan($IdPenjualan) {
        $this->IdPenjualan = $IdPenjualan;
    }

    function setJumlahPenjualan($JumlahPenjualan){
        $this->JumlahPenjualan = $JumlahPenjualan;
    }

    function setHargaJual($HargaJual){
        $this->HargaJual = $HargaJual;
    }

    function setIdBarang($IdBarang){
        $this->IdBarang = $IdBarang;
    }

    function setIdPelanggan($IdPelanggan){
        $this->IdPelanggan = $IdPelanggan;
    }

    function setIdPengguna($IdPengguna){
        $this->IdPengguna = $IdPengguna;
    }

    function getIdPenjualan($IdPenjualan) {
        return $this->IdPenjualan;
    }

    function getJumlahPenjualan(){
        return $this->JumlahPenjualan;
    }

    function getHargaJual(){
        return $this->HargaJual;
    }

    function getIdBarang(){
        return $this->IdBarang;
    }

    function getIdPelanggan(){
        return $this->IdPelanggan;
    }

    function getIdPengguna(){
        return $this->IdPengguna;
    }

    function create() {
        try {
            $query = "
                INSERT INTO Penjualan(
                    JumlahPenjualan,
                    HargaJual,
                    IdBarang,
                    IdPelanggan,
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

            $sqlAddPenjualan = $prepareDB->execute([
                $this->JumlahPenjualan,
                $this->HargaJual,
                $this->IdBarang,
                $this->IdPelanggan,
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
                Penjualan.IdPenjualan,
                Penjualan.JumlahPenjualan,
                Penjualan.HargaJual,
                Barang.NamaBarang
            FROM
                Penjualan
                Left Join Barang on
                    Barang.IdBarang = Penjualan.IdBarang
            ORDER
                BY Penjualan.IdPenjualan ASC
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
                    IdPenjualan,
                    JumlahPenjualan,
                    HargaJual,
                    IdBarang,
                    IdPelanggan
                FROM
                    Penjualan
                WHERE 
                    IdPenjualan = ?
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
                UPDATE Penjualan SET
                    JumlahPenjualan = ?,
                    HargaJual = ?,
                    IdBarang = ?,
                    IdPelanggan = ?
                WHERE 
                    IdPenjualan = ?
            ";

            $prepareDB = $this->conn->prepare($query);

            $PenjualanUpdate = $prepareDB->execute([
                $this->JumlahPenjualan,
                $this->HargaJual,
                $this->IdBarang,
                $this->IdPelanggan,
                $this->IdPenjualan
            ]);

            return $PenjualanUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function delete($id) {
        try {
            $query = "DELETE FROM Penjualan WHERE IdPenjualan = ?";

            $prepareDB = $this->conn->prepare($query);

            $PenjualanDelete = $prepareDB->execute([$id]);

            return $PenjualanDelete;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>
