<?php
class Barang {
    private $IdBarang;
    private $NamaBarang;
    private $Keterangan;
    private $Satuan;
    private $IdPengguna;
    
    private $conn;

    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function setIdBarang($IdBarang) {
        $this->IdBarang = $IdBarang;
    }

    function setNamaBarang($NamaBarang) {
        $this->NamaBarang = $NamaBarang;
    }

    function setKeterangan($Keterangan) {
        $this->Keterangan = $Keterangan;
    }

    function setSatuan($Satuan) {
        $this->Satuan = $Satuan;
    }

    function setIdPengguna($IdPengguna) {
        $this->IdPengguna = $IdPengguna;
    }

    function getIdBarang($IdBarang) {
        return $this->IdBarang;
    }

    function getNamaBarang($NamaBarang) {
        return $this->NamaBarang;
    }

    function getKeterangan($Keterangan) {
        return $this->Keterangan;
    }

    function getSatuan($Satuan) {
        return $this->Satuan;
    }

    function getIdPengguna($IdPengguna) {
        return $this->IdPengguna;
    }

    function create() {
        try {
            $query = "
                INSERT INTO Barang(
                    NamaBarang,
                    Keterangan,
                    Satuan,
                    IdPengguna
                )
                VALUES (
                    ? ,
                    ? ,
                    ? ,
                    ?
                )";

            $prepareDB = $this->conn->prepare($query);

            $sqlAddBarang = $prepareDB->execute([
                $this->NamaBarang,
                $this->Keterangan,
                $this->Satuan,
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
                IdBarang,
                NamaBarang,
                Satuan
            FROM
                Barang
            ORDER
                BY NamaBarang ASC
        ";

        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $getList = $prepareDB->fetchAll();

        return $getList;
    }

    function getListCanBeSell() {
        $query = "
            SELECT
                Barang.IdBarang,
                Barang.NamaBarang,
                SUM(pembelian.JumlahPembelian - ifnull(penjualan.JumlahPenjualan, 0)) as 'SisaStok'
            FROM
                Barang
                LEFT JOIN pembelian ON 
                    Barang.IdBarang = Pembelian.IdBarang
                LEFT JOIN penjualan ON 
                    Barang.IdBarang = Penjualan.IdBarang
            GROUP BY Barang.IdBarang, Barang.NamaBarang
            HAVING SisaStok > 0
            ORDER BY NamaBarang ASC;
        ";

        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $getList = $prepareDB->fetchAll();

        return $getList;
    }

    function getCombinationItem() {
        $Combination = [];

        $query = "
            SELECT
                Barang.IdBarang,
                Barang.NamaBarang,
                SUM(
                    pembelian.JumlahPembelian - IFNULL(penjualan.JumlahPenjualan, 0)
                ) AS 'SisaStok',
                Pembelian2.HargaBeli as 'HargaJual'
            FROM Barang
            LEFT JOIN pembelian ON 
                Barang.IdBarang = Pembelian.IdBarang
            LEFT JOIN penjualan ON 
                Barang.IdBarang = Penjualan.IdBarang
            LEFT JOIN(
                SELECT IdBarang,
                    MAX(Pembelian.IdPembelian) AS 'IdPembelian'
                FROM
                    Pembelian
                GROUP BY
                    Pembelian.IdBarang
            ) AS PembelianTerakhir
                ON 
                    Barang.IdBarang = PembelianTerakhir.IdBarang
            LEFT JOIN Pembelian Pembelian2
                ON
                    Pembelian2.IdPembelian = PembelianTerakhir.IdPembelian
            GROUP BY Barang.IdBarang, Barang.NamaBarang
            HAVING SisaStok > 50
            ORDER BY SisaStok DESC
            LIMIT 6;
        ";

        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $getList = $prepareDB->fetchAll();

        $TotalItem = count($getList);
        $TotalCombination  = $TotalItem - ($TotalItem % 2);

        for ($IndexItem = 0; $IndexItem < $TotalCombination ; $IndexItem += 2) { 
            $Item1 = $getList[$IndexItem];
            $Item2 = $getList[$IndexItem + 1];

            $UniqKey = hash("sha1", json_encode($Item1) . json_encode($Item2));

            $Combination[$UniqKey] = [
                $Item1,
                $Item2
            ];
        }

        return $Combination;
    }

    function getListProfitSellPerItem() {
        $query = "
            SELECT
                Barang.IdBarang,
                Barang.NamaBarang,
                SUM(pembelian.JumlahPembelian) as 'ItemTerBeli',
                SUM(pembelian.JumlahPembelian * pembelian.HargaBeli) as 'TotalPembelian',
                SUM(ifnull(penjualan.JumlahPenjualan, 0)) as 'ItemTerTerjual',
                SUM(ifnull(penjualan.JumlahPenjualan, 0) * ifnull(penjualan.HargaJual, 0)) as 'TotalPenjualan',
                SUM(ifnull(penjualan.JumlahPenjualan, 0) * ifnull(penjualan.HargaJual, 0) - pembelian.JumlahPembelian * pembelian.HargaBeli) as 'ProfitOrLoss'
            FROM
                Barang
                LEFT JOIN pembelian ON 
                    Barang.IdBarang = Pembelian.IdBarang
                LEFT JOIN penjualan ON 
                    Barang.IdBarang = Penjualan.IdBarang
            GROUP BY Barang.IdBarang, Barang.NamaBarang
            ORDER BY NamaBarang ASC;
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
                    IdBarang,
                    NamaBarang,
                    Keterangan,
                    Satuan,
                    Pengguna.NamaPengguna
                FROM
                    Barang
                    left join Pengguna
                        on Barang.IdPengguna = Pengguna.IdPengguna
                WHERE 
                    IdBarang = ?
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
                UPDATE Barang SET
                    NamaBarang = ?,
                    Keterangan = ?,
                    Satuan = ?
                WHERE 
                    IdBarang = ?
            ";

            $prepareDB = $this->conn->prepare($query);

            $BarangUpdate = $prepareDB->execute([
                $this->NamaBarang,
                $this->Keterangan,
                $this->Satuan,
                $this->IdBarang
            ]);

            return $BarangUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function delete($id) {
        try {
            $query = "DELETE FROM Barang WHERE IdBarang = ?";

            $prepareDB = $this->conn->prepare($query);

            $BarangDelete = $prepareDB->execute([$id]);

            return $BarangDelete;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>
