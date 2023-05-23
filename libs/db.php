<?php
try {
    //code...
    $db=new PDO("mysql:host=localhost;dbname=subcats","root","");
} catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
}
