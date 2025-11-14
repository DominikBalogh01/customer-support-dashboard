<?php
require 'config.php';
if ($_POST) {
    $customer = $_POST['customer'];
    $issue = $_POST['issue'];
    $conn->query("INSERT INTO tickets (customer, issue) VALUES ('$customer', '$issue')");
    header("Location: index.php");
}
?>