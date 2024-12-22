<?php
    include "dbcon.php";
    include "redirect.php";
    redirect();
    if(isset($_GET["id_dish"])){
        $deleteDishQuery = "DELETE FROM dish WHERE id_dish=?";
        $stmt = $mysqli->prepare($deleteDishQuery);
        $stmt->bind_param("i",$_GET["id_dish"]);
        $stmt->execute();
        header("location: adminDish.php");
        exit;
    }
?>