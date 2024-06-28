<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Assets</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Asset Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="../assets/list_assets.php">List Assets</a>
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
                    <a class="nav-link" href="../reports/owner_report.php">Owner Report</a>
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
        <h1 class="mt-5">Assets List</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
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
                        <th>Owner ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../db.php');

                    $sql = "SELECT * FROM asset";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["asset_id"] . "</td>
                                    <td>" . $row["category"] . "</td>
                                    <td>" . $row["type"] . "</td>
                                    <td>" . $row["make"] . "</td>
                                    <td>" . $row["model"] . "</td>
                                    <td>" . $row["fuel_type"] . "</td>
                                    <td>" . $row["engine_number"] . "</td>
                                    <td>" . $row["chassis_number"] . "</td>
                                    <td>" . $row["color"] . "</td>
                                    <td>" . $row["capacity"] . "</td>
                                    <td>" . $row["rto_registration_number"] . "</td>
                                    <td>" . $row["wheel_count"] . "</td>
                                    <td>" . $row["owner_id"] . "</td>
                                    <td>
                                        <a href='edit_asset.php?id=" . $row["asset_id"] . "' class='btn btn-primary btn-sm'>Edit</a>
                                        <a href='delete_asset.php?id=" . $row["asset_id"] . "' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='14' class='text-center'>No records found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>