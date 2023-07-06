<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}

include '../src/config/app.php';

$queryAir = mysqli_query($connection, "SELECT * FROM `data`");
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
                        <div class="card-header d-flex justify-content-between">
                            <h4>Data Sample Air</h4>
                            <div class="d-flex gap-2">
                                <a href="air_add.php" class="btn btn-sm btn-info px-3">Tambah Data</a>
                                <a href="air_print.php" class="btn btn-sm btn-success px-3">Print Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4 mt-2">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4">
                                    <form action="air_cari.php" method="get">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg></span>
                                            <select name="cari_air" required id="cari_air" class="form-select">
                                                <option value="">Pilih salah satu ...</option>
                                                <?php
                                                $query = mysqli_query($connection, "SELECT * FROM `data`");
                                                while ($data = mysqli_fetch_assoc($query)) :
                                                ?>
                                                    <option value="<?= $data['id'] ?>"><?= ucwords($data['penetapan']) ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <button class="btn btn-sm btn-outline-info" type="submit" id="button-addon2">Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>Penetepan</th>
                                        <th>Tmpt. Penyimpanan</th>
                                        <th>Jmlh. Contoh MIN</th>
                                        <th>Pengawetan</th>
                                        <th>Batas Penyimpanan</th>
                                        <th>Tgl Kadaluarsa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = mysqli_fetch_assoc($queryAir)) : ?>
                                        <?php
                                        $tgl_input = date('Y-m-d', strtotime($data['tgl_input']));
                                        if ($data['satuan'] == 'hari') {
                                            $satuan = 'days';
                                        } elseif ($data['satuan'] == 'bulan') {
                                            $satuan = 'month';
                                        } elseif ($data['satuan'] == 'tahun') {
                                            $satuan = 'year';
                                        }
                                        $tgl_kada    = date('Y-m-d', strtotime('+' . (int)$data['bts_penyimpanan'] . ' ' . $satuan, strtotime($tgl_input)));
                                        $tgl_kada_format    = date('d F Y', strtotime('+' . (int)$data['bts_penyimpanan'] . ' ' . $satuan, strtotime($tgl_input)));
                                        $now = date('Y-m-d');
                                        $date1 = date_create($now);
                                        $date2 = date_create($tgl_kada);
                                        $diff = date_diff($date1, $date2);
                                        ?>
                                        <tr>
                                            <td><?= ucwords($data['penetapan']) ?></td>
                                            <td><?= ucwords($data['tmpt_penyimpanan']) ?></td>
                                            <td><?= ucwords($data['jmlh_contoh']) ?> ml</td>
                                            <td><?= ucwords($data['pengawetan']) ?></td>
                                            <?php if ($diff->format("%R%a") < 0) : ?>
                                                <td><?= $diff->format("%R%a"); ?> Hari | Kadaluarsa</td>
                                            <?php else : ?>
                                                <td><?= $diff->format("%R%a"); ?> Hari</td>
                                            <?php endif; ?>
                                            <td><?= $tgl_kada_format ?></td>
                                            <td>
                                                <a href="air_edit.php?id=<?= $data['id'] ?>" class="my-1 btn btn-sm btn-outline-primary">Ubah</a>
                                                <a href="air_delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Hapus Data ?');" class="my-1 btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
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
