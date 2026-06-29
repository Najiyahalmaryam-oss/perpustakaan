<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistem Perpustakaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white d-flex justify-content-between">

<h3>Sistem Perpustakaan</h3>

<a href="logout.php" class="btn btn-danger">
    Logout
</a>

</div>

<div class="card-body">

<h4>Selamat Datang</h4>

<p>Anda berhasil login dan melewati verifikasi 2 langkah.</p>

<hr>

<a href="transaksi_peminjaman.php" class="btn btn-success">
    Transaksi Peminjaman
</a>

</div>

</div>

</div>

</body>
</html>