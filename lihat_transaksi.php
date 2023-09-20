<!DOCTYPE html>
<html>
    <head>
        <title>FORM TRANSAKSI</title>
        <style>
            body{
                background-color: yellow;
            }
        </style>
    </head>
    <body align="center">
        <img src="logo_smkn9.png" width="150" height="150">
        <h3>APLIKASI PENJUALAN "NINE MART"</h3>
        <h3>TRANSAKSI BARANG</h3>
        <a href="transaksi.php">[+] Tambah Baru</a> | <a href="beranda.html">Home</a>
        <form>
            <br>
            <center>
            <table border="1">
                <tr>
                    <td><b>No.</b></td>
                    <td><b>ID</b></td>
                    <td><b>No Faktur</b></td>
                    <td><b>Nama Konsumen</b></td>
                    <td><b>Kode Barang</b></td>
                    <td><b>Satuan</b></td>
                    <td><b>Harga Satuan</b></td>
                    <td><b>Harga Total</b></td>
                    <td><b>Aksi</b></td>
                </tr>
            <?php
                include("koneksi.php");

                $sql = "SELECT * FROM tb_penjualan";
                $query = mysqli_query($mysqli, $sql);

                while($transaksi = mysqli_fetch_array($query)){
                    echo "<tr>";

                    echo "<td>".$transaksi['id']."</td>";
                    echo "<td>".$transaksi['kode']."</td>";
                    echo "<td>".$transaksi['no_faktur']."</td>";
                    echo "<td>".$transaksi['nama_konsumen']."</td>";
                    echo "<td>".$transaksi['kode_barang']."</td>";
                    echo "<td>".$transaksi['jumlah']."</td>";
                    echo "<td>".$transaksi['harga_satuan']."</td>";
                    echo "<td>".$transaksi['harga_total']."</td>";

                    echo "<td>";
                    echo "<a href='edit_transaksi.php?id=".$transaksi['id']."'>Edit</a> | ";
                    echo "<a href='hapus_transaksi.php?id=".$transaksi['id']."'>Hapus</a>";
                    echo "</td>";

                    echo "</tr>";
                }
            ?>
            </table>
            <p align="center">Total: <?php echo mysqli_num_rows($query)?></p>
            </center>
        </form>
        <h4>Copyright 2023 @SMK 9 SEMARANG</h4>
    </body>
</html>