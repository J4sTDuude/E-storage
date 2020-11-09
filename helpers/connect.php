<?php
    $connection = mysqli_connect('localhost', 'root') or die(mysqli_error($connection));;
    $select_db = mysqli_select_db($connection, 'e-storage');
