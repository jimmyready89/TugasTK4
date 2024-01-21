<div class="card">
    <div class="card-header">
        Daftar Penjualan
        <a href="./index.php?id=0" class="btn btn-sm btn-primary" style="float:right">
            Tambah
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th></th>
                            <th>Nama Barang</th>
                            <th>Jumlah Penjualan</th>
                            <th>Harga Jual</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                            <?php
                                $DaftarPenjualan = $PenjualanPDO->getList();

                                foreach ($DaftarPenjualan as $key => $data) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $key + 1 ?>
                                            </td>
                                            <td>
                                                <?= $data["NamaBarang"] ?>
                                            </td>
                                            <td>
                                                <?= $data["JumlahPenjualan"] ?>
                                            </td>
                                            <td>
                                                <?= $data["HargaJual"] ?>
                                            </td>
                                            <td>
                                                <a href="./index.php?id=<?= $data["IdPenjualan"] ?>">
                                                    <button type="button" class="btn btn-primary">
                                                        <span class="glyphicon glyphicon-pencil">
                                                            Edit
                                                        </span>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="index.php" method="post">
                                                    <input type="hidden" name="DelateIdPenjualan" value="<?= $data["IdPenjualan"] ?>">
                                                    <button onclick="return confirm('Hapus data ini?')" type="submit" class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-trash">
                                                            Delete
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>