<?php
include('connection.php');

$action = $_GET['action'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = $_POST['phone'];

if ($action == 'adding') {
    $query = "INSERT INTO anggota (name, gender, address, phone) VALUES ('$name', '$gender', '$address', '$phone')";

    if (mysqli_query($connection, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to add data: " . mysqli_error($connection);
    }
} 
else if ($action == 'edit') {
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']); 
        $query = "UPDATE anggota SET 
                    name='$name', 
                    gender='$gender', 
                    address='$address', 
                    phone='$phone' 
                  WHERE id=$id";

        if (mysqli_query($connection, $query)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Failed to update data: " . mysqli_error($connection);
        }
    } else {
        echo "Invalid ID.";
    }
}elseif ($action == 'remove') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM anggota WHERE id = $id";

        if (mysqli_query($connection, $query)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Failed to delete data: " . mysqli_error($connection);
        }
    } else {
        echo "Invalid ID";
    }
}

mysqli_close($connection);
?>
