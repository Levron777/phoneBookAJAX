<?php
    require_once "config/config.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="script/script.js"></script>
    <link rel="stylesheet" href="style.css">
    <title><?=$title?></title>
</head>
<body>

<?php
    require_once "controller.php";
?>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <td>Наименование</td>
            <td>Телефон</td>
            <td><button class="table__add-button button popup-add-open">Добавить</button></td>
        </tr>
        </thead>
        <tbody id="table-body">

        </tbody>
    </table>
</div>

<?php
    require_once "resources/modal.php";
?>

</body>
</html>