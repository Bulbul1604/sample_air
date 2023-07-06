<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}


include '../src/config/app.php';
$queryAir = "SELECT COUNT(*) FROM data";
$resultAir = mysqli_query($connection, $queryAir);
$dataAir = mysqli_fetch_assoc($resultAir);

$queryPengguna = "SELECT COUNT(*) FROM user WHERE role='petugas'";
$resultPengguna = mysqli_query($connection, $queryPengguna);
$dataPengguna = mysqli_fetch_assoc($resultPengguna);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '_header.php' ?>
</head>

<body>
    <div id="app">
        <?php include '_sidebar.php'; ?>
        <div id="main">
            <?php include '_navbar.php'; ?>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <h3>Dashboard</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <!--  -->
                    <div class="row justify-content-center">
                        <?php if ($_SESSION['role'] == 'admin') :  ?>
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row no-gutters">
                                            <div class="card-body">
                                                <h5>Total Pengguna</h5>
                                                <p class="h1 mb-1 mt-3 text-primary fw-bold"><?= $dataPengguna['COUNT(*)'] ?></p>
                                                <span>Pengguna</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row no-gutters">
                                            <div class="card-body">
                                                <h5>Total Sampel Air</h5>
                                                <p class="h1 mb-1 mt-3 text-success fw-bold"><?= $dataAir['COUNT(*)'] ?></p>
                                                <span>Sampel Air</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php elseif ($_SESSION['role'] == 'petugas') :  ?>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row no-gutters">
                                            <div class="card-body">
                                                <h5>Total Sampel Air</h5>
                                                <p class="h1 mb-1 mt-3 text-success fw-bold"><?= $dataAir['COUNT(*)'] ?></p>
                                                <span>Sampel Air</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Script -->
    <?php include '_script.php' ?>
</body>

</html>
