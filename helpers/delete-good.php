<?php
    session_start();
    if (!isset($_SESSION['username']))
    {
        header('Location: ../login.php');
    }

    require_once 'connect.php';

    $id = $_POST['id'];

    $query = "DELETE FROM `goods` WHERE id='$id'";
    mysqli_query($connection, $query);
    header('Location: ../goods.php');


?>