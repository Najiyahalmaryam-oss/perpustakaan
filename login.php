<?php
session_start();

require 'kirim_email.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === "admin" && $password === "12345") {

        $otp = rand(100000, 999999);

        $_SESSION['kode_verifikasi'] = $otp;

        $emailAdmin = "najiyahalmaryam@icloud.com";

        if (kirimOTP($emailAdmin, $otp)) {

            header("Location: verifikasi.php");
            exit();

        } else {

            $error = "Gagal mengirim kode verifikasi ke email admin.";
        }

    } else {

        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Perpustakaan</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
```

</head>

<body class="bg-light">

<div class="container">

```
<div class="row justify-content-center align-items-center vh-100">

    <div class="col-md-5">

        <div class="text-center mb-4">

            <i class="bi bi-book-half text-primary"
               style="font-size:80px;"></i>

            <h2 class="fw-bold mt-3">
                Admin Perpustakaan
            </h2>

            <p class="text-muted">
                Silakan login untuk mengakses sistem
            </p>

        </div>

        <div class="card shadow border-0">

            <div class="card-body p-4">

                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger">
                        <?= $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">
                            Username
                        </label>

                        <input type="text"
                               name="username"
                               class="form-control"
                               placeholder="Masukkan username"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Masukkan password"
                               required>
                    </div>

                    <button type="submit"
                            name="login"
                            class="btn btn-primary w-100">

                        <i class="bi bi-box-arrow-in-right"></i>
                        Login

                    </button>

                </form>

            </div>

        </div>

        <div class="text-center mt-3 text-muted">
            Sistem Informasi Perpustakaan
        </div>

    </div>

</div>
```

</div>

</body>
</html>
