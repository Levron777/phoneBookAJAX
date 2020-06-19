<?php
require_once "./config/config.php";

try {
    $db = new PDO($dsn, USER, PASSWORD, $opt);

    //Read data from the DB

     if($_POST['page']) {
         $sql = $db->prepare("SELECT * FROM `phones`");
         $sql->execute();
         $dataFromDB = $sql->fetchAll();
         echo json_encode($dataFromDB);
     }
} catch (PDOException $e) {
    die($e->getMessage());
}

//add data in the DB

if (!$_POST['edit'] && isset($_POST['inputName']) && isset($_POST['inputPhone'])) {
    $sql = ("INSERT INTO `phones`(`name`, `phone`) VALUES(?,?)");
    $query = $db->prepare($sql);
    $query->execute([$_POST['inputName'], $_POST['inputPhone']]);
}

//delete data from the DB

if(!$_POST['edit'] && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = ("DELETE FROM `phones` WHERE `id` = :id");
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
}

//update the data in the DB

if ($_POST['edit']) {
    $sql = ("UPDATE `phones` SET `name` = :name, `phone` = :phone WHERE `id` = :id");
    $query = $db->prepare($sql);
    $query->execute([$_POST['inputName'], $_POST['inputPhone'], $_POST['id']]);
}
