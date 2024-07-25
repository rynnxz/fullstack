<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeBarang = $_POST['kodeBarang'];
    $sql = "DELETE FROM barang WHERE kodeBarang='$kodeBarang'";
    if ($con->query($sql) === TRUE) {
        header("location:index.php");
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
?>