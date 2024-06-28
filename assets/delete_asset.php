<?php
include('../db.php');

if (isset($_GET['id'])) {
    $asset_id = $_GET['id'];

    $sql = "DELETE FROM asset WHERE asset_id = $asset_id";

    if ($conn->query($sql) === TRUE) {
        echo "Asset deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

header("Location: list_assets.php");
?>
