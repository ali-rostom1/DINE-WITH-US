<?php
    include "dbcon.php";
    include "redirect.php";
    redirect();
    if(isset($_GET["action"]) && isset($_GET["id_res"])){
        $id_res = (int)$_GET["id_res"];
        switch($_GET["action"]){
            case "accept" :
                $acceptResQuery = "UPDATE reservations SET status=? WHERE id_reservation=?";
                $stmt= $mysqli->prepare($acceptResQuery);
                $status = "Accepted";
                break;
            case "decline":
                $declineResQuery = "UPDATE reservations SET status=? WHERE id_reservation=?";
                $stmt = $mysqli->prepare($declineResQuery);
                $status = "Declined";
                break;
            default:
                break;
        }
        $stmt->bind_param('si',$status,$id_res);
        $stmt->execute();
        header("location: adminReservation.php");
        exit;
    }
?>