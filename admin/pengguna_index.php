<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}


include '../src/config/app.php';

$queryAir = mysqli_query($connection, "SELECT * FROM user WHERE role='petugas'");
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
                            <h3>Data Petugas</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <!--  -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Data Petugas Laboratorium</h4>
                            <a href="pengguna_add.php" class="btn btn-sm btn-info px-3">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; ?>
                                    <?php while ($data = mysqli_fetch_assoc($queryAir)) : ?>
                                        <tr>
                                            <th><?= $number ?></th>
                                            <td><?= ucwords($data['username']) ?></td>
                                            <td><?= ucwords($data['role']) ?></td>
                                            <td>
                                                <a href="pengguna_edit.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-primary">Ubah</a>
                                                <a href="pengguna_delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Hapus Data ?');" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $number++; ?>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Script -->
    <?php include '_script.php' ?>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</body>

</html>
