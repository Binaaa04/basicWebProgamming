<?php
session_start();
include 'connection.php';
include 'csrf.php';

$id = stripslashes(strip_tags(htmlspecialchars($_POST['id'], ENT_QUOTES)));
$name = stripslashes(strip_tags(htmlspecialchars($_POST['name'], ENT_QUOTES)));
$gender = stripslashes(strip_tags(htmlspecialchars($_POST['gender'], ENT_QUOTES)));
$address = stripslashes(strip_tags(htmlspecialchars($_POST['address'], ENT_QUOTES)));
$phone = stripslashes(strip_tags(htmlspecialchars($_POST['phone'], ENT_QUOTES)));

if ($id == "") {
    // Insert operation
    $query = "INSERT INTO anggota (name, gender, address, phone) VALUES (?, ?, ?, ?)";
    $sql = $db1->prepare($query);
    $sql->bind_param("ssss", $name, $gender, $address, $phone);
    $sql->execute();
} else {
    // Update operation
    $query = "UPDATE anggota SET name=?, gender=?, address=?, phone=? WHERE id=?";
    $sql = $db1->prepare($query);
    $sql->bind_param("ssssi", $name, $gender, $address, $phone, $id);
    $sql->execute();
}

echo json_encode(['success' => 'Sukses']);

$db1->close();
?>
