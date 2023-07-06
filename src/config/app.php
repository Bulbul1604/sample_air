<?php

// Application Name
$nameApp = "Aplikasi Penyimpanan Data Uji Air | Sucofindo";

// Connection Database
$connection = mysqli_connect('localhost', 'root', '', 'db_uji_air');

// Add
function add($data, $table)
{
    global $connection;
    if ($table == 'data') {
        $user_id = htmlspecialchars(trim($data['user_id']));
        $penetapan = htmlspecialchars(trim($data['penetapan']));
        $tmpt_penyimpanan = htmlspecialchars(trim($data['tmpt_penyimpanan']));
        $jmlh_contoh = htmlspecialchars(trim($data['jmlh_contoh']));
        $pengawetan = htmlspecialchars(trim($data['pengawetan']));
        $bts_penyimpanan = htmlspecialchars(trim($data['bts_penyimpanan']));
        $satuan = htmlspecialchars(trim($data['satuan']));
        $tgl_input = date('Y-m-d H:i:s');

        $query = "INSERT INTO $table
                VALUES ('', '$user_id', '$penetapan', '$tmpt_penyimpanan', '$jmlh_contoh', '$pengawetan', '$bts_penyimpanan', '$satuan', '$tgl_input')";
    }

    if ($table == 'user') {
        $username = htmlspecialchars(($data['username']));
        $password = $data['password'];
        $role = $data['role'];

        $query = "INSERT INTO $table
                VALUES ('', '$username', '$password', '$role')";
    }

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}
function edit($data, $table)
{
    global $connection;

    if ($table == 'data') {
        $id = htmlspecialchars(trim($data['id']));
        $user_id = htmlspecialchars(trim($data['user_id']));
        $penetapan = htmlspecialchars(trim($data['penetapan']));
        $tmpt_penyimpanan = htmlspecialchars(trim($data['tmpt_penyimpanan']));
        $jmlh_contoh = htmlspecialchars(trim($data['jmlh_contoh']));
        $pengawetan = htmlspecialchars(trim($data['pengawetan']));
        $bts_penyimpanan = htmlspecialchars(trim($data['bts_penyimpanan']));
        $satuan = htmlspecialchars(trim($data['satuan']));

        $query = "UPDATE $table SET `user_id`='$user_id',`penetapan`='$penetapan',`tmpt_penyimpanan`='$tmpt_penyimpanan',`jmlh_contoh`='$jmlh_contoh',`pengawetan`='$pengawetan',`bts_penyimpanan`='$bts_penyimpanan',`satuan`='$satuan' WHERE `id`='$id'";
    }

    if ($table == 'user') {
        $id = $data['id'];
        $username = htmlspecialchars(($data['username']));

        $query = "UPDATE $table SET `username`='$username' WHERE `id`='$id'";
    }

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}
function delete($data, $table)
{
    global $connection;
    $id = $data;
    $query = "DELETE FROM $table WHERE id = '$id'";

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}
