<?php
    include "dbcon.php";
    include "redirect.php";
    redirect();
    if(isset($_GET["id_menu"])){
        $deleteMenuQuery = "DELETE FROM menu WHERE id_menu=?";
        $stmt = $mysqli->prepare($deleteMenuQuery);
        $stmt->bind_param("i",$_GET["id_menu"]);
        $stmt->execute();
        header("location: adminMenu.php");
        exit;
    }
?>