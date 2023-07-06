<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}

include '../src/config/app.php';

$id = $_GET['cari_air'];
$query = mysqli_query($connection, "SELECT *, data.id as did FROM `data` INNER JOIN user ON user.id = data.user_id WHERE data.id = '$id'");
$data = mysqli_fetch_assoc($query);


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
                            <h3>Data Air</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <!--  -->
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Detail Sample Air</h4>
                                <table class="table">
                                    <tr>
                                        <th>Petugas</th>
                                        <td>: <?= ucwords($data['username']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Penetapan</th>
                                        <td>: <?= ucwords($data['penetapan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Penyimpanan</th>
                                        <td>: <?= strtoupper($data['tmpt_penyimpanan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Contoh</th>
                                        <td>: <?= $data['jmlh_contoh'] ?> ml</td>
                                    </tr>
                                    <tr>
                                        <th>Pengawetan</th>
                                        <td>: <?= ucwords($data['pengawetan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pengawetan</th>
                                        <td>: <?= $data['bts_penyimpanan'] ?> <?= ucwords($data['satuan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Input</th>
                                        <td>: <?= date('d F Y', strtotime($data['tgl_input'])) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end gap-2">
                            <a href="air_index.php" class="btn btn-outline-dark btn-sm">Kembali</a>
                            <a href="air_print_cari.php?id=<?= $data['did'] ?>" class="btn btn-success btn-sm">Unduh Data</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Script -->
    <?php include '_script.php' ?>
</body>

</html>
