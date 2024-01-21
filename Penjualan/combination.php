<?php
include "../class/barang_pdo.php";

$BarangPDO = new Barang($connectionPDO);
$CombinationItem = $BarangPDO->getCombinationItem();

if (count($CombinationItem) > 0) {
    ?>
        <div class="card">
            <div class="card-body">
                Combination Sell
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                        $CombinationNo = 1;
                        foreach ($CombinationItem as $CombinationKey => $Combination) {
                            ?>
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Combination <?= $CombinationNo ?></h5>
                                            <h6 class="card-subtitle mb-2">
                                                <?= $Combination[0]["NamaBarang"] ?> + <?= $Combination[1]["NamaBarang"] ?>
                                            </h6>
                                            <p class="card-text">
                                                Harga : <?= number_format($Combination[0]["HargaJual"] + $Combination[1]["HargaJual"]) ?>
                                            </p>
                                            <a href="./combination_sell_form.php?id=<?= $CombinationKey ?>" class="btn btn-success" style="float: right;">Buy</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            $CombinationNo++;
                        }
                    ?>
                </div>
            </div>
        </div>
    <?php
}
    
