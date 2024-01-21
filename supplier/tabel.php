<div class="card">
    <div class="card-header">
        Daftar Supplier
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
                            <th>Nama Supplier</th>
                            <th>No Hp</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                            <?php
                                $DaftarSupplier = $SupplierPDO->getList();

                                foreach ($DaftarSupplier as $key => $data) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $key + 1 ?>
                                            </td>
                                            <td>
                                                <?= $data["NamaSupplier"] ?>
                                            </td>
                                            <td>
                                                <?= $data["NoHpSupplier"] ?>
                                            </td>
                                            <td>
                                                <a href="./index.php?id=<?= $data["IdSupplier"] ?>">
                                                    <button type="button" class="btn btn-primary">
                                                        <span class="glyphicon glyphicon-pencil">
                                                            Edit
                                                        </span>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="index.php" method="post">
                                                    <input type="hidden" name="DelateIdSupplier" value="<?= $data["IdSupplier"] ?>">
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