<?php
    session_start();

    require_once 'connect.php';

    if (isset($_POST['username']) and isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE  username = '$username' and password = '$password'";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

        if ($count == 1)
        {
            $_SESSION['username'] = $username;
            header('Location: ../index.php');
        }
        else
        {
            $_SESSION['message'] = 'Не вірний логін або пароль';
            header('Location: ../login.php');
        }
    }


?>

<?php

    // session_start();
    // require_once 'connect.php';

    // $login = $_POST['login'];
    // $password = $_POST['password'];

    // $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    // if (mysqli_num_rows($check_user) > 0) {

    //     $user = mysqli_fetch_assoc($check_user);

    //     $_SESSION['username'] = [
    //         "id" => $user['id'],
    //         "full_name" => $user['full_name'],
    //         "avatar" => $user['avatar'],
    //         "email" => $user['email']
    //     ];

    //     header('Location: ../profile.php');

    // } else {
    //     $_SESSION['message'] = 'Не верный логин или пароль';
    //     header('Location: ../index.php');
    // }
    ?>

<pre>
    <?php
    // print_r($check_user);
    // print_r($user);
    ?>
</pre>
