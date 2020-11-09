<?session_start();?>
<?php
if (!isset($_SESSION['username']))
{
    header('Location: login.php');
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
    <?php
        include('./tpl/header.php');
    ?>
    <div class="main">
        <div class="container" style="position: relative; overflow: visible;">
            <center><div class="main-img">
                <img src="./imgs/storage.png" alt="">
            </div></center>
        </div>
    </div>
    <?php
        include('./tpl/footer.php');
    ?>

</body>
</html>