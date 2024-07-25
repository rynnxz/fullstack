<?php
include("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
    $kodeBarang = $_POST['kodeBarang'];

    $sql = "SELECT * FROM barang WHERE kodeBarang ='$kodeBarang'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $namaBarang = $row['namaBarang'];
        $jumlahBarang = $row['jumlahBarang'];
        $hargaBarang = $row['hargaBarang'];
        $satuanBarang = $row['satuanBarang'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section name="input" id="input" class="inputs">
        <form action="edit.php" method="POST" class="input-form">
            <h2>Edit Data</h2>
            <div class="input-box">
                <input type="text" name="kode" placeholder="Kode Barang" autocomplete="off" value="<?php echo $kodeBarang; ?>" readonly>
                <input type="text" name="nama" placeholder="Nama Barang" autocomplete="off" value="<?php echo $namaBarang; ?>">
            </div>
            
            <div class="input-box">
                <input type="text" name="jumlah" placeholder="Jumlah Barang" autocomplete="off" value="<?php echo $jumlahBarang; ?>">
                <input type="text" name="harga" placeholder="Harga Barang" autocomplete="off" value="<?php echo $hargaBarang; ?>">
            </div>
            
            <div class="input-box">
                <select name="satuan" id="satuan">
                    <option value="Kg" <?php if ($satuanBarang == 'Kg') echo 'selected'; ?>>Kg</option>
                    <option value="Liter" <?php if ($satuanBarang == 'Liter') echo 'selected'; ?>>Liter</option>
                    <option value="Pcs" <?php if ($satuanBarang == 'Pcs') echo 'selected'; ?>>Pcs</option>
                </select>
            </div>
            
            <button type="submit" class="button">Submit</button>
            <button type="reset" class="button">Reset</button>
            <button class="button"><a href="index.php">Back</a></button>
        </form>
    </section>
</body>
</html>