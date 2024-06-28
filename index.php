<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Inventory Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: url('images/img.png') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="index.php">Asset Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="assets/list_assets.php">List Assets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assets/add_asset.php">Add Asset</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports/asset_type_report.php">Asset Type Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports/category_report.php">Category Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports/financer_report.php">Financer Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports/owner_report.php">Owner Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports/agent_report.php">Agent Report</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="">
        <h1 class="mt-0 text-center text-light">Asset Inventory Management</h1>
        <div class="mt-3 text-center">
            <!-- Main page content goes here -->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
