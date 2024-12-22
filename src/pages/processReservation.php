<?php
    include "dbcon.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id_menu = $_POST["id_menu"];
        $id_user = $_COOKIE["user"];
        $date = $_POST["date"];
        $sql = "INSERT INTO reservations(id_menu,id_user,reservation_date,status) VALUES (?,?,?,'Pending')";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iis",$id_menu,$id_user,$date);
        $stmt->execute();
        header("location: menu.php");
        exit;
    }
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET["delete"])){
            $sql= "DELETE FROM reservations WHERE id_reservation = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("i",$_GET["delete"]);
            $stmt->execute();
            header("location: clientReservations.php");
            exit;
        }
    }
?>