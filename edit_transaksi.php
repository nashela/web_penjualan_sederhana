<?php

include("koneksi.php");

if(!isset($_GET['id'])){
    header('Location: lihat_transaksi.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM tb_penjualan WHERE id=$id";
$query = mysqli_query($mysqli, $sql);
$transaksi = mysqli_fetch_array($query);

if(mysqli_num_rows($query) < 1){
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FORM TRANSAKSI</title>
        <style>
            body{
                background-image: url('lawang_sewu.png');
                background-size: cover;
            }
        </style>
    </head>
    <body align="center">
        <img src="logo_smkn9.png" width="150" height="150">
        <h3>FORM TRANSAKSI</h3>
        <form method="POST">
            <center>
            <table border="1">

            <input type="hidden" name="id" value="<?= $transaksi['id']?>"/>

                <tr>
                    <td><b>ID</b></td>
                    <td>:</td>
                    <td><input type="text" name="kode" value="<?= $transaksi['kode'] ?>"></td>
                </tr>
                <tr>
                    <td><b>No Faktur</b></td>
                    <td>:</td>
                    <td><input type="text" name="no_faktur" value="<?= $transaksi['no_faktur'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Nama Konsumen</b></td>
                    <td>:</td>
                    <td><input type="text" name="nama_konsumen" value="<?= $transaksi['nama_konsumen'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Kode Barang</b></td>
                    <td>:</td>
                    <td><input type="text" name="kode_barang" value="<?= $transaksi['kode_barang'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Satuan</b></td>
                    <td>:</td>
                    <td><input type="text" name="satuan" value="<?= $transaksi['jumlah'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Harga Satuan</b></td>
                    <td>:</td>
                    <td><input type="text" name="harga_satuan" value="<?= $transaksi['harga_satuan'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Harga_total</b></td>
                    <td>:</td>
                    <td><input type="text" name="harga_total" value="<?= $transaksi['harga_total'] ?>"></td>
                </tr>
            </table>
            </center>
            <br>
            <button type="submit" name="edit">Edit</button>

            <?php
            include("koneksi.php");

                if(isset($_POST['edit'])){

                    $id = $_POST['id'];
                    $kode = $_POST['kode'];
                    $no_faktur = $_POST['no_faktur'];
                    $nama_konsumen = $_POST['nama_konsumen'];
                    $kode_barang = $_POST['kode_barang'];
                    $jumlah = $_POST['jumlah'];
                    $harga_satuan = $_POST['harga_satuan'];
                    $harga_total = $_POST['harga_total'];

                    $sql = "UPDATE tb_penjualan SET kode='$kode', no_faktur='$no_faktur', nama_konsumen='$nama_konsumen', kode_barang='$kode_barang', jumlah='$jumlah', harga_satuan='$harga_satuan', harga_total='$harga_total' WHERE id=$id";
                    $query = mysqli_query($mysqli, $sql);

                    if($query){
                        header('Location: lihat_transaksi.php');
                    } else {
                        die("Gagal menyimpan perubahan...");
                    }
                }
            ?>

        </form>
        <h4>Copyright 2023 @SMK 9 SEMARANG</h4>
    </body>
</html>