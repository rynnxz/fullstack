<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section name="tampil" id="tampil">

        <form method="GET" action="" class="search">
            <input class="search-bar" type="text" name="search" placeholder="Cari Barang" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button class="search-button" type="submit">Search</button>
        </form>
        
        <h2>Data Barang</h2>
        <?php
            include("koneksi.php");

            $per_page = 5;

            // hitung halaman saat ini
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }       
            $start = ($page - 1) * $per_page;

            // yang akan menghandle search
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $search_query = $search ? "WHERE namaBarang LIKE '%$search%'" : '';

            // query untuk LIMIT dan OFFSET
            $sql = "SELECT * FROM barang $search_query LIMIT $start, $per_page";
            $result = $con->query($sql);

            // periksa apakah query berhasil dijalankan
            if ($result === false) {
                // print pesan kesalahan query
                echo "Error: " . $sql . "<br>" . $con->error;
            } else {
            // periksa apakah ada data yang ditemukan
                if ($result->num_rows > 0) {
                    echo "<div class='table-bg'>";
                    echo "<table>";
                    echo "<tr><th>No.</th><th>Kode Barang</th><th>Nama Barang</th><th>Jumlah Barang</th><th>Satuan Barang</th><th class='hargaStyle'>Harga Barang</th><th>Edit</th><th>Delete</th></tr>";

                    // loop untuk menampilkan data
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row["kodeBarang"] . "</td>";
                        echo "<td>" . $row["namaBarang"] . "</td>";
                        echo "<td>" . $row["jumlahBarang"] . "</td>";
                        echo "<td>" . $row["satuanBarang"] . "</td>";
                        echo "<td class='hargaStyle'> Rp." . $row["hargaBarang"] . "</td>";
                        echo "<td>
                                <form action='editBarang.php' method='post'>
                                <input type='hidden' name='kodeBarang' value='" .$row["kodeBarang"] ."'>
                                <button type='submit' class='btn-action'>Edit</button>
                                </form>
                            </td>";
                        echo "<td>
                                <form action='delete.php' method='post'>
                                <input type='hidden' name='kodeBarang' value='" .$row["kodeBarang"] ."'>
                                <button type='submit' class='btn-action'>Delete</button>
                            </form>
                        </td>";
                        echo "</tr>";
                        $i++;
                    }

                    echo "</table>";
                    echo "</div>";

                    // hitung total jumlah baris data (tanpa LIMIT)
                    $sql_total = "SELECT COUNT(*) AS total FROM barang $search_query";
                    $result_total = $con->query($sql_total);

                    // periksa apakah query total berhasil dijalankan
                    if ($result_total === false) {
                        echo "Error: " . $sql_total . "<br>" . $con->error;
                    } else {
                        $row_total = $result_total->fetch_assoc();
                        $total_rows = $row_total['total'];

                        // hitung total halaman berdasarkan jumlah data
                        $total_pages = ceil($total_rows / $per_page);

                        // tampilkan navigasi jika lebih dari 1 halaman
                        if ($total_pages > 1) {
                            echo "<div class='pagination'>";
                            if ($page > 1) {
                                echo "<a href='?page=" . ($page - 1) . "&search=$search'>&laquo; Sebelumnya</a>";
                            }
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<a href='?page=$i&search=$search'>$i</a>";
                            }
                        if ($page < $total_pages) {
                                echo "<a href='?page=" . ($page + 1) . "&search=$search'>Berikutnya &raquo;</a>";
                            }
                        echo "</div>";
                        }
                    }
                } else {
                    echo "<div class='table-bg'>";
                    echo "<table>";
                    echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                    echo "</table>";
                    echo "</div>";
                }
            }

            $con->close();
            ?>
        
    </section>


    <section name="input" id="input" class="inputs">
        <form action="input.php" method="POST" class="input-form">
            <h2>Input Data</h2>
            <div class="input-box">
                <input type="text" name="kode" placeholder="Kode Barang" autocomplete="off">
                <input type="text" name="nama" placeholder="Nama Barang" autocomplete="off">
            </div>
            
            <div class="input-box">
                <input type="text" name="jumlah" placeholder="Jumlah Barang" autocomplete="off">
                <input type="text" name="harga" placeholder="Harga Barang" autocomplete="off">
            </div>
            
            <div class="input-box">
                <select name="satuan" id="satuan">
                    <option value="Kg">Kg</option>
                    <option value="Liter">Liter</option>
                    <option value="Pcs">Pcs</option>
                </select>
            </div>
            
            <button type="submit" class="button">Submit</button>
            <button type="reset" class="button">Reset</button>
        </form>
    </section>


</body>
</html>