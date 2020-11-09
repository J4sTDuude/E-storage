<?php
session_start();

if ($_SESSION['username']) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-storage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./imgs/ico.png" />
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <img src="./imgs/logo.png" alt="" width="171" height="35">
            </div>

        </div>
    </div>

    <div class="clear"></div>

    <div class="gap"> </div>

    <div class="main">
        <div class="container" style="position: relative; overflow: visible;">
            <div class="row">
                <div class="col">
                    <form action="./helpers/sign-in.php" class="form-horizontal" method="POST">
                        <div class="subTitle">
                            <h4>Авторизація</h4>
                            <div class="subTitleDot"></div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="tag">User ID</label>
                            <div class="auth-field">
                                <input type="text" name="username" class="form-control" placeholder="User ID" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="tag">Password</label>
                            <div class="auth-field">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="button-field">
                                <button class="auth-button" type="submit">Авторизуватися</button>
                            </div>
                        </div>

                        <?php
                            if ($_SESSION['message']) {
                                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                            }

                            unset($_SESSION['message']);
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="clear"></div>

<?php
    include('./tpl/footer.php');
?>


</body>

</html>