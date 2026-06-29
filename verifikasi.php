<?php
session_start();

if (!isset($_SESSION['kode_verifikasi'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['verifikasi'])) {

    $kode = trim($_POST['kode']);

    if ($kode == $_SESSION['kode_verifikasi']) {

        $_SESSION['login'] = true;

        unset($_SESSION['kode_verifikasi']);

        header("Location: index.php");
        exit();

    } else {

        $error = "Kode verifikasi salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi Admin Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="text-center mb-4">

                <i class="bi bi-person-workspace text-success"
                   style="font-size:80px;"></i>

                <h2 class="fw-bold mt-3">
                    Admin Perpustakaan
                </h2>

                <p class="text-muted">
                    Verifikasi Keamanan Akun Admin
                </p>

            </div>

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger">
                            <?= $error; ?>
                        </div>
                    <?php } ?>

                    <div class="alert alert-info">
                        <i class="bi bi-shield-lock-fill"></i>
                        Kode verifikasi telah dikirim ke akun admin perpustakaan.
                    </div>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Kode Verifikasi
                            </label>

                            <input type="text"
                                   name="kode"
                                   class="form-control"
                                   placeholder="Masukkan kode verifikasi"
                                   maxlength="6"
                                   required>

                        </div>

                        <button type="submit"
                                name="verifikasi"
                                class="btn btn-success w-100">

                            <i class="bi bi-lock-fill"></i>
                            Verifikasi

                        </button>

                    </form>

                </div>

            </div>

            <div class="text-center mt-3 text-muted">
                <i class="bi bi-lock"></i>
                Akses hanya untuk Admin Perpustakaan
            </div>

        </div>

    </div>

</div>

</body>
</html>