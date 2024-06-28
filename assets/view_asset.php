<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Asset</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">View Asset</h1>
        <?php
        include('../db.php');

        if (isset($_GET['id'])) {
            $asset_id = $_GET['id'];

            $sql = "SELECT * FROM asset WHERE asset_id = $asset_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<table class='table table-bordered'>
                        <tr><th>ID</th><td>" . $row["asset_id"] . "</td></tr>
                        <tr><th>Category</th><td>" . $row["category"] . "</td></tr>
                        <tr><th>Type</th><td>" . $row["type"] . "</td></tr>
                        <tr><th>Make</th><td>" . $row["make"] . "</td></tr>
                        <tr><th>Model</th><td>" . $row["model"] . "</td></tr>
                        <tr><th>Fuel Type</th><td>" . $row["fuel_type"] . "</td></tr>
                        <tr><th>Engine Number</th><td>" . $row["engine_number"] . "</td></tr>
                        <tr><th>Chassis Number</th><td>" . $row["chassis_number"] . "</td></tr>
                        <tr><th>Color</th><td>" . $row["color"] . "</td></tr>
                        <tr><th>Capacity</th><td>" . $row["capacity"] . "</td></tr>
                        <tr><th>RTO Registration Number</th><td>" . $row["rto_registration_number"] . "</td></tr>
                        <tr><th>Wheel Count</th><td>" . $row["wheel_count"] . "</td></tr>
                        <tr><th>Owner ID</th><td>" . $row["owner_id"] . "</td></tr>
                    </table>";
            } else {
                echo "No record found";
            }

            $conn->close();
        }
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>
