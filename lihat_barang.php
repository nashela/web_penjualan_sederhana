<!DOCTYPE html>
<html>
    <head>
        <title>FORM STOK BARANG</title>
        <style>
            body{
                background-color: yellow;
            }
        </style>
    </head>
    <body align="center">
        <img src="logo_smkn9.png" width="150" height="150">
        <h3>APLIKASI PENJUALAN "NINE MART"</h3>
        <h3>DAFTAR BARANG DI GUDANG</h3>
        <a href="stok_barang.php">[+] Tambah Baru</a> | <a href="beranda.html">Home</a>
        <form>
            <br>
            <center>
            <table border="1">
                <tr>
                    <td><b>No.</b></td>
                    <td><b>Kode Barang</b></td>
                    <td><b>Nama Barang</b></td>
                    <td><b>Harga Jual</b></td>
                    <td><b>Harga Beli</b></td>
                    <td><b>Satuan</b></td>
                    <td><b>Kategori</b></td>
                    <td><b>Aksi</b></td>
                </tr>
            <?php
                include("koneksi.php");

                $sql = "SELECT * FROM tb_master";
                $query = mysqli_query($mysqli, $sql);

                while($barang = mysqli_fetch_array($query)){
                    echo "<tr>";

                    echo "<td>".$barang['id']."</td>";
                    echo "<td>".$barang['kode_barang']."</td>";
                    echo "<td>".$barang['nama_barang']."</td>";
                    echo "<td>".$barang['harga_jual']."</td>";
                    echo "<td>".$barang['harga_beli']."</td>";
                    echo "<td>".$barang['satuan']."</td>";
                    echo "<td>".$barang['kategori']."</td>";

                    echo "<td>";
                    echo "<a href='edit_barang.php?id=".$barang['id']."'>Edit</a> | ";
                    echo "<a href='hapus_barang.php?id=".$barang['id']."'>Hapus</a>";
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