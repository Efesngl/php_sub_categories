<?php
require_once("db.php");
if(isset($_GET["cat_id"])){
    try {
        //code...
        $query=$db->prepare("delete from categories where ID=:ID;delete from categories where parent_id=:ID");
        $insert=$query->execute([
            "ID"=>$_GET["cat_id"]
        ]);
        if($insert){
            header("Location:../index.php");
        }
    } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
    }
} else{
    die("aradığınız sayfa bulunamamıştır");
}