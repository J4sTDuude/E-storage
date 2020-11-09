<?php
    session_start();
    if (!isset($_SESSION['username']))
    {
        header('Location: ../login.php');
    }

    require_once 'connect.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $manufacturer = $_POST['manufacturer'];
    $article = $_POST['article'];
    $weight = $_POST['weight'];
    $amount = $_POST['amount'];

    $query = "UPDATE `goods` SET article='$article', name='$name', weight='$weight', manufacturer='$manufacturer', amount='$amount' WHERE id='$id'";
    mysqli_query($connection, $query);
    header('Location: ../goods.php');


?>