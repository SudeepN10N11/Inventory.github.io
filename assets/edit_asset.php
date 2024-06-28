<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Asset</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Asset</h1>
        <?php
        include('../db.php');

        if (isset($_GET['id'])) {
            $asset_id = $_GET['id'];

            $sql = "SELECT * FROM asset WHERE asset_id = $asset_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "No record found";
                exit;
            }
        }

        if (isset($_POST['submit'])) {
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

            $sql = "UPDATE asset SET category='$category', type='$type', make='$make', model='$model', fuel_type='$fuel_type', engine_number='$engine_number', chassis_number='$chassis_number', color='$color', capacity=$capacity, rto_registration_number='$rto_registration_number', wheel_count=$wheel_count, owner_id=$owner_id WHERE asset_id=$asset_id";

            if ($conn->query($sql) === TRUE) {
                echo "Asset updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
        <form action="edit_asset.php?id=<?php echo $asset_id; ?>" method="POST">
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" class="form-control" required>
                    <option value="Vehicles" <?php if ($row['category'] == 'Vehicles') echo 'selected'; ?>>Vehicles</option>
                    <option value="Machinery" <?php if ($row['category'] == 'Machinery') echo 'selected'; ?>>Machinery</option>
                    <option value="Agriculturalural Implements" <?php if ($row['category'] == 'Agriculturalural Implements') echo 'selected'; ?>>Agriculturalural Implements</option>
                    <option value="Earthmover" <?php if ($row['category'] == 'Earthmover') echo 'selected'; ?>>Earthmover</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control" required>
                    <option value="Car" <?php if ($row['type'] == 'Car') echo 'selected'; ?>>Car</option>
                    <option value="Truck" <?php if ($row['type'] == 'Truck') echo 'selected'; ?>>Truck</option>
                    <option value="Tractor" <?php if ($row['type'] == 'Tractor') echo 'selected'; ?>>Tractor</option>
                    <option value="Cranes" <?php if ($row['type'] == 'Cranes') echo 'selected'; ?>>Cranes</option>
                    <option value="JCB" <?php if ($row['type'] == 'JCB') echo 'selected'; ?>>JCB</option>
                </select>
            </div>
            <div class="form-group">
                <label for="make">Make</label>
                <select name="make" class="form-control" required>
                    <option value="Maruti" <?php if ($row['make'] == 'Maruti') echo 'selected'; ?>>Maruti</option>
                    <option value="Honda" <?php if ($row['make'] == 'Honda') echo 'selected'; ?>>Honda</option>
                    <option value="Ford" <?php if ($row['make'] == 'Ford') echo 'selected'; ?>>Ford</option>
                    <option value="Mahindra" <?php if ($row['make'] == 'Mahindra') echo 'selected'; ?>>Mahindra</option>
                </select>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <select name="model" class="form-control" required>
                    <option value="Swift" <?php if ($row['model'] == 'Swift') echo 'selected'; ?>>Swift</option>
                    <option value="Dezire" <?php if ($row['model'] == 'Dezire') echo 'selected'; ?>>Dezire</option>
                    <option value="Icon" <?php if ($row['model'] == 'Icon') echo 'selected'; ?>>Icon</option>
                    <option value="Thar" <?php if ($row['model'] == 'Thar') echo 'selected'; ?>>Thar</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fuel_type">Fuel Type</label>
                <select name="fuel_type" class="form-control" required>
                    <option value="Petrol" <?php if ($row['fuel_type'] == 'Petrol') echo 'selected'; ?>>Petrol</option>
                    <option value="Diesel" <?php if ($row['fuel_type'] == 'Diesel') echo 'selected'; ?>>Diesel</option>
                    <option value="Electric" <?php if ($row['fuel_type'] == 'Electric') echo 'selected'; ?>>Electric</option>
                </select>
            </div>
            <div class="form-group">
                <label for="engine_number">Engine Number</label>
                <input type="text" name="engine_number" class="form-control" value="<?php echo $row['engine_number']; ?>" required>
            </div>
            <div class="form-group">
                <label for="chassis_number">Chassis Number</label>
                <input type="text" name="chassis_number" class="form-control" value="<?php echo $row['chassis_number']; ?>" required>
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" name="color" class="form-control" value="<?php echo $row['color']; ?>" required>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" class="form-control" value="<?php echo $row['capacity']; ?>" required>
            </div>
            <div class="form-group">
                <label for="rto_registration_number">RTO Registration Number</label>
                <input type="text" name="rto_registration_number" class="form-control" value="<?php echo $row['rto_registration_number']; ?>" required>
            </div>
            <div class="form-group">
                <label for="wheel_count">Wheel Count</label>
                <input type="number" name="wheel_count" class="form-control" value="<?php echo $row['wheel_count']; ?>" required>
            </div>
            <div class="form-group">
                <label for="owner_id">Owner ID</label>
                <input type="number" name="owner_id" class="form-control" value="<?php echo $row['owner_id']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Update Asset</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>
