<?php
    include "dbcon.php";
    include "redirect.php";
    redirect();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $dishName = $_POST["dish_name"];
        $dishDescription = $_POST["dish_description"];
        $dishImageContent = isset($_FILES['dish_img']) && $_FILES['dish_img']['error'] == 0 
        ? file_get_contents($_FILES['dish_img']['tmp_name']) 
        : 'assets/images/placeholder.jpg';
        $dishType = $_POST["dish_type"];
        $dishAddQuery = "INSERT INTO dish(name,description,type,img_URL) VALUES(?,?,?,?)";
        $stmt = $mysqli->prepare($dishAddQuery);
        $stmt->bind_param("ssss",$dishName,$dishDescription,$dishType,$dishImageContent);
        $stmt->execute();
        header('location: adminDish.php');
    }
?>