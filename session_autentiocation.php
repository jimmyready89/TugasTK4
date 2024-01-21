<?php
    if (!isset($_SESSION['nama'])) {
        header ("location:logout.php");
        die();
    }
?>