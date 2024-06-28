<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Asset Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../assets/list_assets.php">List Assets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../assets/add_asset.php">Add Asset</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../reports/asset_type_report.php">Asset Type Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../reports/category_report.php">Category Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../reports/financer_report.php">Financer Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../reports/owner_report.php">Owner Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../reports/agent_report.php">Agent Report</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Back to Main Page</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-5">Owner Report</h1>
        <form action="owner_report.php" method="POST">
            <div class="form-group">
                <label for="owner_id">Select Owner</label>
                <select name="owner_id" class="form-control" required>
                    <?php
                    include('../db.php');

                    $sql = "SELECT * FROM owner";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["owner_id"]. "'>" . $row["name"]. "</option>";
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-secondary">Generate Report</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            include('../db.php');

            $owner_id = $_POST['owner_id'];

            $sql = "SELECT * FROM asset WHERE owner_id = $owner_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2 class='mt-4'>Report for Owner</h2>
                <div id='reportContent'>
                <div class='table-responsive'>
                <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Fuel Type</th>
                                <th>Engine Number</th>
                                <th>Chassis Number</th>
                                <th>Color</th>
                                <th>Capacity</th>
                                <th>RTO Registration Number</th>
                                <th>Wheel Count</th>
                            </tr>
                        </thead>
                        <tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["asset_id"]. "</td>
                            <td>" . $row["category"]. "</td>
                            <td>" . $row["type"]. "</td>
                            <td>" . $row["make"]. "</td>
                            <td>" . $row["model"]. "</td>
                            <td>" . $row["fuel_type"]. "</td>
                            <td>" . $row["engine_number"]. "</td>
                            <td>" . $row["chassis_number"]. "</td>
                            <td>" . $row["color"]. "</td>
                            <td>" . $row["capacity"]. "</td>
                            <td>" . $row["rto_registration_number"]. "</td>
                            <td>" . $row["wheel_count"]. "</td>
                        </tr>";
                }
                echo '</tbody></table></div></div>';
                echo '<button type="button" onclick="printReport()" class="btn btn-secondary mt-3">Print Report</button>';
            } else {
                echo "<p>No records found for selected Owner</p>";
                
            }

            $conn->close();
        }
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
    <script>
        function printReport() {
            var printContents = document.getElementById('reportContent').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>
