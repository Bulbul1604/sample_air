<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}


include '../src/config/app.php';

if (isset($_POST['simpan'])) {
    $data = [
        'username' => $_POST['username'],
        'password' => md5('petugas'),
        'role' => 'petugas',
    ];
    if (add($data, 'user') > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href='pengguna_index.php'
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href='pengguna_index.php'
        </script>";
    }
}

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
                            <h3>Data Pengguna</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <!--  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Data Pengguna</h4>
                                </div>

                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group mb-3">
                                            <label for="username" class="fw-bold mb-1">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="petugas" class="fw-bold mb-1">Role</label>
                                            <input type="text" class="mb-1 form-control" id="petugas" name="petugas" value="petugas" required readonly>
                                            <small class="fw-bold">* Password sesuai dengan role.</small>
                                        </div>
                                        <div>
                                            <button type="submit" name="simpan" class="btn btn-info">Simpan Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
