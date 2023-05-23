<?php
require_once("db.php");

if (isset($_POST["category"]) && $_POST["category"]!="" && isset($_POST["parent_id"])) {
    try {
        //code...

        $prepare = $db->prepare("insert into categories(category,parent_id) values(:cat,:pid)");
        $insert = $prepare->execute([
            "cat" => $_POST["category"],
            "pid" => $_POST["parent_id"]
        ]);
        if($insert){
            header("Location:../index.php");
        }
    } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
    }
}
else{
     die("Aradığınız sayfa bulunamadı");
}