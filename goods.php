<?php
session_start();
if (!isset($_SESSION['username']))
{
    header('Location: login.php');
}

require 'helpers/connect.php';
$query = "SELECT * FROM goods";
$result = mysqli_query($connection, $query);
// echo "<pre>";
// var_dump($tableData = mysqli_fetch_all($result));
// echo "</pre>";

$tableData = mysqli_fetch_all($result);


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
    <div class="gap"></div>
    <div class="main">
        <div class="container" style="position: relative; overflow: visible;">
            <div class="search-edit">
                <input id="search-text" class="form-control search-goods" type="text" placeholder="Пошук товару..." onkeyup="tableSearch()">
                <button class="auth-button edit-button" type="submit" onclick="show('add-good','block')" >Добавити товар</button>
            </div>
            <table id="table-id" class="table" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Назва товару</th>
                    <th>Виробник</th>
                    <th>Артикл</th>
                    <th>Вага(кг)</th>
                    <th>Кількість</th>
                </tr>
            </thead>
            <tbody>
                <?php  for($i = 0; $i < count($tableData); $i++):?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><a href="" onclick="false" title="Для редагування зробіть подвійний клік" data-id="<?=$tableData[$i][0]?>" style="color:black;"><?= $tableData[$i][2]?></a></td>
                        <td><?= $tableData[$i][4]?></td>
                        <td><?= $tableData[$i][1]?></td>
                        <td><?= $tableData[$i][3]?></td>
                        <td><?= $tableData[$i][5]?> шт</td>
                    </tr>
                <?endfor;?>
            </tbody>
            </table>

        </div>
    </div>
    <?php
        include('./tpl/footer.php');
    ?>

<div id="shadow"></div>
<div id="add-good" class="popup">
    <!-- Close Button -->
    <img class="close" src="imgs/close.png" alt="Закрити" onclick="show('add-good','none')">
    <div class="form">
        <h2 class="add-good-text">Добавити товар</h2>
        <form action="/helpers/add-good.php" name="f1" method="POST">
            <input type="text" placeholder="Назва товару" name="name" class="input form-control">
            <input type="text" placeholder="Виробник" name="manufacturer" class="input form-control">
            <input type="text" placeholder="Артикл" name="article" class="input form-control">
            <input type="text" placeholder="Вага(кг)" name="weight" class="input form-control">
            <input type="text" placeholder="Кількість" name="amount" class="input form-control">

            <button type="submit" class="auth-button add-button">Добавити</button>
        </form>
    </div>
</div>

<div id="edit-good" class="popup" >
    <!-- Close Button -->
    <img class="close ed-close" src="imgs/close.png" alt="Закрити" onclick="show('edit-good', 'none')">
    <div class="form" >
        <h2 class="add-good-text">Редагувати товар</h2>
        <form action="/helpers/edit-good.php" method="POST">
            <input name="id" type="hidden">
            <div class="form-group-edit">
                <input type="text" name="name" class="input form-control">
                <label class="tag edit-tag">Товар</label>
            </div>
            <div class="form-group-edit">
                <input type="text" name="manufacturer" class="input form-control">
                <label class="tag edit-tag">Виробник</label>
            <div class="form-group-edit">
                <input type="text" name="article" class="input form-control">
                <label class="tag edit-tag">Артикл</label>
            </div>
            <div class="form-group-edit">
                <input type="text" name="weight" class="input form-control">
                <label class="tag edit-tag">Вага(кг)</label>
            </div>
            <div class="form-group-edit">
                <input type="text" name="amount" class="input form-control">
                <label class="tag edit-tag">Кількість</label>
            </div>
            <button type="submit" class="auth-button add-button del-btn">Видалити</button>
            <button type="submit" class="auth-button add-button ed-btn">Зберегти</button>
        </form>
    </div>
</div>

<script>
    const table = document.getElementById('table-id');
    table.addEventListener('click', function() {
        event.preventDefault();
    })

    document.querySelector('#edit-good button.del-btn').addEventListener('click',()=>{
        document.querySelector('#edit-good form').setAttribute('action','/helpers/delete-good.php')
    })

    table.addEventListener('dblclick', function() {
        if (event.target.tagName === "A") {
            let id = event.target.getAttribute("data-id")
            let entry = event.target.parentElement.parentElement.innerText.split('\t').slice(1)
            console.log(JSON.stringify(entry))

            const inputs = [...document.querySelectorAll('#edit-good form input')]
            console.log(inputs);
            inputs.forEach((e, i) => {
                if(i === 0){
                   e.value = id
                }
                else{
                    e.value = i === 5 ? parseInt(entry[i-1]) : entry[i-1]
                }

            })

            show('edit-good', 'block');
        }
    })

    // Show function
    function show(popup, state) {
        document.getElementById(popup).style.display = state;
        document.getElementById('shadow').style.display = state;
    }
</script>

</body>

<script src='js/script.js'></script>
<script src='js/tablesort.js'></script>
<script>
    new Tablesort(document.getElementById('table-id'));
</script>

</html>