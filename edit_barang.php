<?php

include("koneksi.php");

if(!isset($_GET['id'])){
    header('Location: lihat_barang.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM tb_master WHERE id=$id";
$query = mysqli_query($mysqli, $sql);
$barang = mysqli_fetch_array($query);

if(mysqli_num_rows($query) < 1){
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FORM STOK BARANG</title>
        <style>
            body{
                background-image: url('lawang_sewu.png');
                background-size: cover;
            }
        </style>
    </head>
    <body align="center">
        <img src="logo_smkn9.png" width="150" height="150">
        <h3>FORM STOK BARANG</h3>
        <form method="POST">
            <center>
            <table border="1">

            <input type="hidden" name="id" value="<?= $barang['id']?>"/>

                <tr>
                    <td><b>Kode Barang</b></td>
                    <td>:</td>
                    <td><input type="text" name="kode_barang" value="<?= $barang['kode_barang'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Nama Barang</b></td>
                    <td>:</td>
                    <td><input type="text" name="nama_barang" value="<?= $barang['nama_barang'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Harga Jual</b></td>
                    <td>:</td>
                    <td><input type="text" name="harga_jual" value="<?= $barang['harga_jual'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Harga Beli</b></td>
                    <td>:</td>
                    <td><input type="text" name="harga_beli" value="<?= $barang['harga_beli'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Satuan</b></td>
                    <td>:</td>
                    <td><input type="text" name="satuan" value="<?= $barang['satuan'] ?>"></td>
                </tr>
                <tr>
                    <td><b>Kategori</b></td>
                    <td>:</td>
                    <td><input type="text" name="kategori" value="<?= $barang['kategori'] ?>"></td>
                </tr>
            </table>
            </center>
            <br>
            <button type="submit" name="edit">Edit</button>

            <?php
            include("koneksi.php");

                if(isset($_POST['edit'])){

                    $id = $_POST['id'];
                    $kode_barang = $_POST['kode_barang'];
                    $nama_barang = $_POST['nama_barang'];
                    $harga_jual = $_POST['harga_jual'];
                    $harga_beli = $_POST['harga_beli'];
                    $satuan = $_POST['satuan'];
                    $kategori = $_POST['kategori'];

                    $sql = "UPDATE tb_master SET kode_barang='$kode_barang', nama_barang='$nama_barang', harga_jual='$harga_jual', harga_beli='$harga_beli', satuan='$satuan', kategori='$kategori' WHERE id=$id";
                    $query = mysqli_query($mysqli, $sql);

                    if($query){
                        header('Location: lihat_barang.php');
                    } else {
                        die("Gagal menyimpan perubahan...");
                    }
                }
            ?>

        </form>
        <h4>Copyright 2023 @SMK 9 SEMARANG</h4>
    </body>
</html>