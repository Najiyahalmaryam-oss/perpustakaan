<?php
include "koneksi.php";

if(isset($_POST['simpan'])){

    $nama_anggota = $_POST['nama_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status_peminjaman = "Dipinjam";

    $sql = "INSERT INTO peminjaman
            (nama_anggota, id_buku, tanggal_pinjam, tanggal_kembali, status_peminjaman)
            VALUES
            ('$nama_anggota', '$id_buku', '$tanggal_pinjam', '$tanggal_kembali', '$status_peminjaman')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Data peminjaman berhasil disimpan');</script>";
    }else{
        echo "<script>alert('Gagal menyimpan data: ".mysqli_error($conn)."');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Transaksi Peminjaman Buku</title>

<style>

body{
    font-family: Arial, sans-serif;
    background:#f2f2f2;
    margin:0;
    padding:30px;
}

.container{
    max-width:1200px;
    margin:auto;
}

h1{
    margin-bottom:20px;
}

.form-container{
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    margin-bottom:30px;
}

input[type="text"],
select,
input[type="date"]{
    padding:12px;
    border:1px solid #ccc;
    border-radius:5px;
    min-width:220px;
}

.btn{
    background:blue;
    color:white;
    border:none;
    padding:12px 30px;
    border-radius:5px;
    cursor:pointer;
}

.btn:hover{
    background:#0000cc;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

table th{
    background:blue;
    color:white;
}

table th,
table td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

.judul{
    margin-top:30px;
    margin-bottom:15px;
}

</style>
</head>
<body>

<div class="container">

<h1>Transaksi Peminjaman Buku</h1>

<form method="POST" class="form-container">

    <input
        type="text"
        name="nama_anggota"
        placeholder="Masukkan Nama Anggota"
        required
    >

    <select name="id_buku" required>
        <option value="">Pilih Judul Buku</option>

        <?php
        $buku = mysqli_query($conn,"SELECT * FROM buku");

        while($b = mysqli_fetch_assoc($buku)){
        ?>
            <option value="<?= $b['id_buku']; ?>">
                <?= $b['judul_buku']; ?>
            </option>
        <?php } ?>
    </select>

    <input type="date" name="tanggal_pinjam" required>

    <input type="date" name="tanggal_kembali" required>

    <input type="submit" name="simpan" value="Simpan" class="btn">

</form>

<h2 class="judul">Data Peminjaman Buku</h2>

<table>

<tr>
    <th>No</th>
    <th>Nama Anggota</th>
    <th>Judul Buku</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
</tr>

<?php

$no = 1;

$query = mysqli_query($conn,"
SELECT p.*, b.judul_buku
FROM peminjaman p
LEFT JOIN buku b ON p.id_buku = b.id_buku
ORDER BY p.id_peminjaman DESC
");

while($row = mysqli_fetch_assoc($query)){
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama_anggota']; ?></td>
    <td><?= $row['judul_buku']; ?></td>
    <td><?= $row['tanggal_pinjam']; ?></td>
    <td><?= $row['tanggal_kembali']; ?></td>
    <td><?= $row['status_peminjaman']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>