<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}


include '../src/config/app.php';

if (isset($_POST['simpan'])) {
    if (add($_POST, 'data') > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href='air_index.php'
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href='air_add.php'
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
                            <h3>Data Air</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <!--  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Data Sampel Air</h4>
                                </div>

                                <div class="card-body">
                                    <form action="" method="POST">
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="penetapan">Penetapan</label>
                                                    <input type="text" class="form-control" id="penetapan" name="penetapan" placeholder="Masukkan penetapan" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="tmpt_penyimpanan">Tempat Penyimpanan</label>
                                                    <input type="text" class="form-control" id="tmpt_penyimpanan" name="tmpt_penyimpanan" placeholder="Masukkan tempat penyimpanan" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="jmlh_contoh">Jumlah Contoh</label>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="jmlh_contoh" name="jmlh_contoh" placeholder="Masukkan Jumlah Contoh" required>
                                                        <span class="input-group-text" id="basic-addon2">(ml)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="pengawetan">Pengawetan</label>
                                                    <input type="text" class="form-control" id="pengawetan" name="pengawetan" placeholder="Masukkan Pengawetan" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="bts_penyimpanan">Batas Penyimpanan</label>
                                                    <input type="number" class="form-control" id="bts_penyimpanan" name="bts_penyimpanan" placeholder="Masukkan Batas Penyimpanan" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="bts_penyimpanan">Satuan</label>
                                                    <select name="satuan" id="satuan" class="form-select" required>
                                                        <option value="hari">Hari</option>
                                                        <option value="bulan">Bulan</option>
                                                        <option value="tahun">Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" name="simpan" class="btn btn-info">Simpan Data</button>
                                            </div>
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
