<?php
session_start();
include_once 'src/config/app.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="src/assets/img/Logo_sucofindo.png" type="image/x-icon">
    <title><?= $nameApp; ?></title>
    <!-- Fonts Google -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="src/assets/bootstrap/css/bootstrap.min.css" />
    <script src="src/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Modify CSS -->
    <style>
        * {
            font-family: 'Montserrat', sans-serif !important;
        }

        .main .main-title,
        .main .main-description,
        .main .main-button {
            opacity: 1;
            animation-name: opacity;
            animation-duration: 2s;
        }

        .main .main-img {
            width: 90%;
            animation-name: sizeWidth;
            animation-duration: 1s;
        }

        .main .main-img-element {
            top: 100px;
            left: 0;
            animation-name: opacity;
            animation-duration: 2s;
        }

        @keyframes opacity {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes sizeWidth {
            from {
                width: 0;
            }

            to {
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <div class="app">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg bg-transparant fixed-top">
            <div class="container px-5 py-3">
                <a class="d-flex align-items-end navbar-brand" href="#">
                    <img src="src/assets/img/Logo_sucofindo.png" alt="..." width="50" />
                    <small class="ms-2 text-info" style="font-family: 'Righteous', cursive !important;">Laboratorium</small>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <?php if (!isset($_SESSION['login'])) : ?>
                                <button type="button" class="nav-link fw-semibold text-info btn" data-bs-toggle="modal" data-bs-target="#modalSignIn">
                                    Sign In
                                </button>
                            <?php else : ?>
                                <a href="admin/index.php" class="nav-link fw-semibold text-info btn">
                                    <?= ucwords($_SESSION['username']) ?>
                                </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main -->
        <main class="main">
            <div class="container px-5">
                <div class="d-flex flex-md-row justify-content-center align-items-center" style="min-height: 100vh;">
                    <img src="src/assets/img/element.png" alt="..." width="50" class="main-img-element position-absolute">
                    <div class="col-12 col-md-7">
                        <div style="width: 90%;">
                            <h2 class="main-title lh-base fw-bold mb-3"><span class="fw-normal text-info" style="font-family: 'Righteous', cursive !important;">Laboratorium</span> SUCOFINDO</h2>
                            <p class="main-description text-secondary mb-5 lh-lg">
                                Aplikasi penyimpanan data uji air <span class="fw-normal text-info" style="font-family: 'Righteous', cursive !important;">Laboratorium</span> <strong>SUCOFINDO</strong> digunakan untuk menyimpan sample air untuk <span class="fw-normal text-info" style="font-family: 'Righteous', cursive !important;">Laboratorium</span> di <strong>SUCOFINDO</strong>.
                            </p>
                            <?php if (!isset($_SESSION['login'])) : ?>
                                <button type="button" class="main-button text-white bg-info" data-bs-toggle="modal" data-bs-target="#modalSignIn" style="text-decoration: none; padding: 12px 34px; border-radius: 55px; border: none;">
                                    Lebih detail
                                </button>
                            <?php else : ?>
                                <a href="admin/index.php" class="main-button text-white bg-info" style="text-decoration: none; padding: 12px 34px; border-radius: 55px; border: none;">
                                    Lebih detail
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="d-none d-md-block col-md-5 position-relative text-center">
                        <img src="src/assets/img/element.png" alt="..." width="60" class="position-absolute top-0" style="right: 50px;">
                        <img class="main-img" src="src/assets/img/Laboratory Analyst_Monochromatic.svg" alt="...">
                        <img src="src/assets/img/element.png" alt="..." width="40" class="position-absolute bottom-0 start-0">
                    </div>
                </div>
            </div>
        </main>

        <!-- ModalLogin -->
        <div class="modal fade" id="modalSignIn" tabindex="-1" aria-labelledby="modalSignInLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalSignInLabel">Modal Sign In</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center align-items-end mb-4">
                            <img src="src/assets/img/Logo_sucofindo.png" alt="" width="80">
                            <h2 class="ms-3 text-info" style="font-family: 'Righteous', cursive !important;">Laboratorium</h2>
                        </div>
                        <form class="px-3" method="POST" action="login_proses.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="">Pilih salah satu ...</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                            </div>
                            <button type="submit" name="signin" class="px-4 py-2 btn btn-info text-white" style="border-radius: 55px;">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
