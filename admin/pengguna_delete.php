<?php

include '../src/config/app.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (delete($id, 'user') > 0) {
        echo "<script>
            alert('Data berhasil dihapus');
            document.location.href='pengguna_index.php'
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus');
             document.location.href='pengguna_index.php'
        </script>";
    }
}
