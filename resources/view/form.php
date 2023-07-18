<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form method="post" action="proses_peminjaman.php">
    <div class="container">
        <h2>Form Peminjaman Barang</h2>

        
            <label>Nama barang</label>
            <input type="text" name="nama_lengkap" required>

            <label>volume</label>
            <input type="text" name="nomor_identitas" required>

            <label>satuan</label>
            <input type="text" name="alamat" required></input>

            <label>keterangan</label>
            <textarea type="text" name="nomor_telepon" required></textarea>


            <input type="submit" name="submit" value="Ajukan Peminjaman">
        </form>
    </div>
</body>
</html>
