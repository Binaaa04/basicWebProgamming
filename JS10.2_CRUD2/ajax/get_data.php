<?php
session_start();
include 'connection.php';
include 'csrf.php';

$id = $_POST['id'];
$query = "SELECT * FROM anggota WHERE id=? ORDER BY id DESC";
$sql = $db1->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$res1 = $sql->get_result();

$h = array();
while ($row = $res1->fetch_assoc()) {
    $h['id'] = $row["id"];
    $h['name'] = $row["name"];
    $h['gender'] = $row["gender"];
    $h['address'] = $row["address"];
    $h['phone'] = $row["phone"];
}

echo json_encode($h);

$db1->close();
?>
