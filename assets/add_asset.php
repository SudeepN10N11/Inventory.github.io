<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Asset</title>
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
                    <a class="nav-link" href="../assets/list_assets.php">List Assets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../assets/add_asset.php">Add Asset</a>
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
    <div class="container w-50">
        <h1 class="mt-5">Add Asset</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" class="form-control" required>
                    <option value="Vehicles">Vehicles</option>
                    <option value="Machinery">Machinery</option>
                    <option value="Agriculturalural Implements">Agriculturalural Implements</option>
                    <option value="Earthmover">Earthmover</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control" required>
                    <option value="Car">Car</option>
                    <option value="Truck">Truck</option>
                    <option value="Tractor">Tractor</option>
                    <option value="Cranes">Cranes</option>
                    <option value="JCB">JCB</option>
                </select>
            </div>
            <div class="form-group">
                <label for="make">Make</label>
                <select name="make" class="form-control" required>
                    <option value="Maruti">Maruti</option>
                    <option value="Honda">Honda</option>
                    <option value="Ford">Ford</option>
                    <option value="Mahindra">Mahindra</option>
                </select>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <select name="model" class="form-control" required>
                    <option value="Swift">Swift</option>
                    <option value="Dezire">Dezire</option>
                    <option value="Icon">Icon</option>
                    <option value="Thar">Thar</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fuel_type">Fuel Type</label>
                <select name="fuel_type" class="form-control" required>
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Electric</option>
                </select>
            </div>
            <div class="form-group">
                <label for="engine_number">Engine Number</label>
                <input type="text" name="engine_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="chassis_number">Chassis Number</label>
                <input type="text" name="chassis_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" name="color" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rto_registration_number">RTO Registration Number</label>
                <input type="text" name="rto_registration_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="wheel_count">Wheel Count</label>
                <input type="number" name="wheel_count" class="form-control" required>
            </div>
            <label for="owner_id">Select Owner</label>
            <select name="owner_id" class="form-control" required>
                <?php
                include('../db.php');

                $sql = "SELECT * FROM owner";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["owner_id"] . "'>" . $row["name"] . "</option>";
                    }
                }

                $conn->close();
                ?>
            </select>
            <button type="submit" name="submit" class="btn btn-success">Add Asset</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            include('../db.php');

            $category = $_POST['category'];
            $type = $_POST['type'];
            $make = $_POST['make'];
            $model = $_POST['model'];
            $fuel_type = $_POST['fuel_type'];
            $engine_number = $_POST['engine_number'];
            $chassis_number = $_POST['chassis_number'];
            $color = $_POST['color'];
            $capacity = $_POST['capacity'];
            $rto_registration_number = $_POST['rto_registration_number'];
            $wheel_count = $_POST['wheel_count'];
            $owner_id = $_POST['owner_id'];

            $sql = "INSERT INTO asset (category, type, make, model, fuel_type, engine_number, chassis_number, color, capacity, rto_registration_number, wheel_count, owner_id) 
                    VALUES ('$category', '$type', '$make', '$model', '$fuel_type', '$engine_number', '$chassis_number', '$color', $capacity, '$rto_registration_number', $wheel_count, $owner_id)";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New asset added successfully'),location.href='../index.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
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