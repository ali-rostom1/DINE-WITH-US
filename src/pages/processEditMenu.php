<?php
    include "dbcon.php";


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $menuId = $_POST['id_menu'];
        $menuName = $_POST['menu_name'];
        $menuDescription = $_POST['menu_description'];
        $dishes = isset($_POST['dishes']) ? $_POST['dishes'] : [];
        $newDishes = isset($_POST['new_dishes']) ? $_POST['new_dishes'] : [];
        $menuImageContent = isset($_FILES['menu_img']) && $_FILES['menu_img']['error'] == 0 ? file_get_contents($_FILES['menu_img']['tmp_name']) : 'assets/images/placeholder.jpg';
        if(isset($_FILES['menu_img']) && $_FILES['menu_img']['error'] == 0 ){
            $menuImageContent=file_get_contents($_FILES['menu_img']['tmp_name']);
            $updateMenuQuery = "UPDATE menu SET name = ?,description = ?,url_img = ? WHERE id_menu = ?";
            $stmt = $mysqli->prepare($updateMenuQuery);
            $stmt->bind_param("sssi", $menuName, $menuDescription,$menuImageContent,$menuId);
        }else{
            $updateMenuQuery = "UPDATE menu SET name = ?,description = ? WHERE id_menu = ?";
            $stmt = $mysqli->prepare($updateMenuQuery);
            $stmt->bind_param("ssi", $menuName, $menuDescription,$menuId);
        }
        if($stmt->execute()){
            $selectedDishes = $_POST['dishes'];

            $deleteRelationsQuery = "DELETE FROM menu_dish_relation WHERE menu_id = ?";
            $stmt = $mysqli->prepare($deleteRelationsQuery);
            $stmt->bind_param("i", $menuId);
            $stmt->execute();

            foreach ($selectedDishes as $dishId) {
                $insertRelationQuery = "INSERT INTO menu_dish_relation (menu_id, dish_id) VALUES (?, ?)";
                $stmt = $mysqli->prepare($insertRelationQuery);
                $stmt->bind_param("ii", $menuId, $dishId);
                $stmt->execute();
            }


            $newDishNames = isset($_POST['new_dish_names']) ? $_POST['new_dish_names'] : [];
            $newDishDescriptions = isset($_POST['new_dish_descriptions']) ? $_POST['new_dish_descriptions'] : [];
            $newDishTypes = isset($_POST['new_dish_types']) ? $_POST['new_dish_types'] : [];
            $newDishImages = $_FILES['new_dish_images'];
            foreach ($newDishNames as $index => $dishName) {
                if (!empty($dishName)) {
                    $dishDescription = $newDishDescriptions[$index];
                    $dishType = $newDishTypes[$index];
                    $dishImageData = null;
                    if (isset($newDishImages['name'][$index]) && $newDishImages['error'][$index] == 0) {
                        $dishImageData = file_get_contents($newDishImages['tmp_name'][$index]);
                    } else {
                        $dishImageData = 'assets/images/placeholder.jpg';
                    }
                    $insertDishQuery = "INSERT INTO dish (name, description, type, img_URL) VALUES (?, ?, ?, ?)";
                    $stmt = $mysqli->prepare($insertDishQuery);
                    $stmt->bind_param("ssss", $dishName, $dishDescription, $dishType, $dishImageData);
                    $stmt->execute();
    
                    $dishId = $stmt->insert_id;

                    $insertRelationQuery = "INSERT INTO menu_dish_relation (menu_id, dish_id) VALUES (?, ?)";
                    $stmt = $mysqli->prepare($insertRelationQuery);
                    $stmt->bind_param("ii", $menuId, $dishId);
                    $stmt->execute();
                }
            }

        }
        header('location: adminMenu.php');
        exit;

    }


?>