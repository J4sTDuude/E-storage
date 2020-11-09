<?php
    session_start();
    if (!isset($_SESSION['username']))
    {
        header('Location: ../login.php');
    }

    require_once 'connect.php';

    $name = $_POST['name'];
    $manufacturer = $_POST['manufacturer'];
    $article = $_POST['article'];
    $weight = $_POST['weight'];
    $amount = $_POST['amount'];

    $query = "INSERT INTO `goods` (`id`, `article`, `name`, `weight`, `manufacturer`, `amount`) VALUES (NULL, '$article', '$name', '$weight', '$manufacturer', '$amount')";
    mysqli_query($connection, $query);
    header('Location: ../goods.php');


?>