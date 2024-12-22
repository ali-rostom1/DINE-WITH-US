<?php
    include "dbcon.php";
    include "redirect.php";
    redirect();
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $dishId= $_POST["id_dish"];
        $dishName = $_POST["dish_name"];
        $dishDescription = $_POST["dish_description"];
        $dishType = $_POST["dish_type"];



        if(isset($_FILES['dish_img']) && $_FILES['dish_img']['error'] == 0){
            $dishImageContent = file_get_contents($_FILES['dish_img']['tmp_name']);
            $dishEditQuery = 'UPDATE dish SET name=? ,description=?,type=?,img_URL=? WHERE id_dish=?';
            $stmt = $mysqli->prepare($dishEditQuery);
            $stmt->bind_param("ssssi",$dishName,$dishDescription,$dishType,$dishImageContent,$dishId);
            $stmt->execute();
        }else{
            $dishEditQuery = 'UPDATE dish SET name=? ,description=?,type=?WHERE id_dish=?';
            $stmt = $mysqli->prepare($dishEditQuery);
            $stmt->bind_param("sssi",$dishName,$dishDescription,$dishType,$_GET["id_dish"]);
            $stmt->execute();
        }
        header("location: admindish.php");
        exit;
        
    }
?>