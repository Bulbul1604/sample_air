<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}

$page = "dashboard";

include '../src/config/app.php';
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
                            <h3>Badge</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <!--  -->
                </section>
            </div>
        </div>
    </div>

    <!-- Script -->
    <?php include '_script.php' ?>
</body>

</html>
