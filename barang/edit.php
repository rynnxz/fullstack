<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];

    $sql = "UPDATE barang SET namaBarang='$nama', jumlahBarang='$jumlah', hargaBarang='$harga', satuanBarang='$satuan' WHERE kodeBarang='$kode'";
    if ($con->query($sql) === TRUE) {
        header("location:index.php");
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
?>