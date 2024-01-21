<?php
    include "class/barang_pdo.php";
    $BarangPDO = new Barang($connectionPDO);
    $ListProfitSellPerItem = $BarangPDO->getListProfitSellPerItem();
?>
<br>
<div class="card">
    <div class="card-header">
        <h1>
            Laporan Keuntungan
        </h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2">
                        Nama Barang
                    </th>
                    <th colspan="2" class="text-center">
                        Pembelian
                    </th>
                    <th colspan="2" class="text-center">
                        Penjualan
                    </th>
                    <th rowspan="2" class="text-center">
                        Mergain (Gain / Lost)
                    </th>
                </tr>
                <tr>
                    <th style="text-align: right">
                        Jumlah
                    </th>
                    <th style="text-align: right">
                        Nominal
                    </th>
                    <th style="text-align: right">
                        Jumlah
                    </th>
                    <th style="text-align: right">
                        Nominal
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($ListProfitSellPerItem as $Item) {
                        ?>
                            <tr>
                                <td>
                                    <?= $Item["NamaBarang"] ?>
                                </td>
                                <td class="text-danger" style="text-align: right">
                                    <?= number_format($Item["ItemTerBeli"]) ?>
                                </td>
                                <td class="text-danger" style="text-align: right">
                                    <?= number_format($Item["TotalPembelian"]) ?>
                                </td>
                                <td class="text-success" style="text-align: right">
                                    <?= number_format($Item["ItemTerTerjual"]) ?>
                                </td>
                                <td class="text-success" style="text-align: right">
                                    <?= number_format($Item["TotalPenjualan"]) ?>
                                </td>
                                <?php
                                    if ($Item["ProfitOrLoss"] >= 0) {
                                        ?>
                                            <td class="text-success" style="text-align: right">
                                                <?= number_format($Item["ProfitOrLoss"]) ?>
                                            </td>
                                        <?php
                                    } else {
                                        ?>
                                            <td class="text-danger" style="text-align: right">
                                                <?= number_format($Item["ProfitOrLoss"]) ?>
                                            </td>
                                        <?php
                                    }
                                ?>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>