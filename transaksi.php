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
                <tr>
                    <td><b>ID</b></td>
                    <td>:</td>
                    <td><input type="text" name="kode"></td>
                </tr>
                <tr>
                    <td><b>No Faktur</b></td>
                    <td>:</td>
                    <td><input type="text" name="no_faktur"></td>
                </tr>
                <tr>
                    <td><b>Nama Konsumen</b></td>
                    <td>:</td>
                    <td><input type="text" name="nama_konsumen"></td>
                </tr>
                <tr>
                    <td><b>Kode Barang</b></td>
                    <td>:</td>
                    <td><input type="text" name="kode_barang"></td>
                </tr>
                <tr>
                    <td><b>Satuan</b></td>
                    <td>:</td>
                    <td><input type="text" name="jumlah"></td>
                </tr>
                <tr>
                    <td><b>Harga Satuan</b></td>
                    <td>:</td>
                    <td><input type="text" name="harga_satuan"></td>
                </tr>
                <tr>
                    <td><b>Harga Total</b></td>
                    <td>:</td>
                    <td><input type="text" name="harga_total"></td>
                </tr>
            </table>
            </center>
            <br>
            <button type="submit" name="daftar">DAFTAR</button>
        </form>
        <h4>Copyright 2023 @SMK 9 SEMARANG</h4>

        <?php
        // Check If form submitted, insert form data into users table.
        include("koneksi.php");

        // cek apakah tombol daftar sudah diklik atau blum?
        if(isset($_POST['daftar'])){

            // ambil data dari formulir
            $id = $_POST['id'];
            $kode = $_POST['kode'];
            $no_faktur = $_POST['no_faktur'];
            $nama_konsumen = $_POST['nama_konsumen'];
            $kode_barang = $_POST['kode_barang'];
            $jumlah = $_POST['jumlah'];
            $harga_satuan = $_POST['harga_satuan'];
            $harga_total = $_POST['harga_total'];

            // buat query
            $sql = "INSERT INTO tb_penjualan (kode, no_faktur, nama_konsumen, kode_barang, jumlah, harga_satuan, harga_total) VALUE ('$kode', '$no_faktur', '$nama_konsumen', '$kode_barang', '$jumlah', '$harga_satuan', '$harga_total')";
            $query = mysqli_query($mysqli, $sql);

            // apakah query simpan berhasil?
            if($query){
                header('Location: lihat_transaksi.php?status=sukses');
            }else{
                header('Location: lihat_transaksi.php?status=gagal');
            }
        }
        ?>

    </body>
</html>