<?php
session_start();

include_once 'src/config/app.php';

if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $queryCheckUsername = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND role = '$role'");

    if ($queryCheckUsername->num_rows > 0) {
        $resutlQueryCheckUsername = mysqli_fetch_assoc($queryCheckUsername);
        $_SESSION['id'] = $resutlQueryCheckUsername['id'];
        $_SESSION['username'] = $resutlQueryCheckUsername['username'];
        $_SESSION['role'] = $resutlQueryCheckUsername['role'];
        $_SESSION['login'] = true;
        header('Location: admin/index.php');
    } else {
        echo '<script>
        alert("Username, password, atau role salah!")
        window.history.back()
        </script>';
    }
}
