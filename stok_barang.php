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
                <tr>
                    <td><b>Kode Barang</b></td>
                    <td>:</td>
                    <td><input type="text" name="kode_barang"></td>
                </tr>
                <tr>
                    <td><b>Nama Barang</b></td>
                    <td>:</td>
                    <td><input type="text" name="nama_barang"></td>
                </tr>
                <tr>
                    <td><b>Harga Jual</b></td>
                    <td>:</td>
                    <td><input type="text" name="harga_jual"></td>
                </tr>
                <tr>
                    <td><b>Harga Beli</b></td>
                    <td>:</td>
                    <td><input type="text" name="harga_beli"></td>
                </tr>
                <tr>
                    <td><b>Satuan</b></td>
                    <td>:</td>
                    <td><input type="text" name="satuan"></td>
                </tr>
                <tr>
                    <td><b>Kategori</b></td>
                    <td>:</td>
                    <td><input type="text" name="kategori"></td>
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
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $harga_jual = $_POST['harga_jual'];
            $harga_beli = $_POST['harga_beli'];
            $satuan = $_POST['satuan'];
            $kategori = $_POST['kategori'];

            // buat query
            $sql = "INSERT INTO tb_master (kode_barang, nama_barang, harga_jual, harga_beli, satuan, kategori) VALUE ('$kode_barang', '$nama_barang', '$harga_jual', '$harga_beli', '$satuan', '$kategori')";
            $query = mysqli_query($mysqli, $sql);

            // apakah query simpan berhasil?
            if($query){
                header('Location: lihat_barang.php?status=sukses');
            }else{
                header('Location: lihat_barang.php?status=gagal');
            }
        }
        ?>

    </body>
</html>