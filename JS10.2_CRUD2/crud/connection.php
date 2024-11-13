<?php

$connection = mysqli_connect("localhost", "admin", "admin", "prakwebdb");

if (mysqli_connect_errno()) {
    die(" Database connection failed! " . mysqli_connect_error());
}
?>
