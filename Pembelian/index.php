<?php
    include "../session_start.php";
    include "../session_autentiocation.php";
    include "../database_connection.php";
    include "../class/pembelian_pdo.php";

    $PembelianPDO = new Pembelian($connectionPDO);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas TK 4</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <div class="container">
        <?php
            $id = $_GET['id'] ?? "";
            if ($id == 0) {
                include "create_form.php";
            } elseif ($id > 0) {
                include "detail_form.php";
            }else{
                if (isset($_POST["DelateIdPembelian"])) {
                    include "./controller/delete.php";
                }

                include "tabel.php";
            }
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>