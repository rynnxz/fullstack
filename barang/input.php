<?php
    include 'koneksi.php';

    $kodeBarang = $_POST['kode'];
    $namaBarang = $_POST['nama'];
    $jumlahBarang = $_POST['jumlah'];
    $satuanBarang = $_POST['satuan'];
    $hargaBarang = $_POST['harga'];

    $sql = "INSERT INTO barang VALUES ('$kodeBarang', '$namaBarang', '$jumlahBarang', '$satuanBarang', '$hargaBarang')";
    
    if ($con->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
?>