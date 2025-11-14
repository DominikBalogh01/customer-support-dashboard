<?php
require 'config.php';
if ($_GET['id'] && $_GET['status']) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    $conn->query("UPDATE tickets SET status='$status' WHERE id=$id");
    header("Location: index.php");
}
?>