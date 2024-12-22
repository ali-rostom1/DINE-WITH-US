<?php
include "dbcon.php";

include "redirect.php";
redirect();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $menuName = $_POST['menu_name'];
    $menuDescription = $_POST['menu_description'];
    
    
    $selectedDishes = isset($_POST['dishes']) ? $_POST['dishes'] : [];
    $newDishNames = isset($_POST['new_dish_names']) ? $_POST['new_dish_names'] : [];
    $newDishDescriptions = isset($_POST['new_dish_descriptions']) ? $_POST['new_dish_descriptions'] : [];
    $newDishTypes = isset($_POST['new_dish_types']) ? $_POST['new_dish_types'] : [];
    $newDishImages = isset($_FILES['new_dish_images']) ? $_FILES['new_dish_images'] : [];

    
    $menuImageContent = isset($_FILES['menu_img']) && $_FILES['menu_img']['error'] == 0 
        ? file_get_contents($_FILES['menu_img']['tmp_name']) 
        : 'assets/images/placeholder.jpg'; 

    
    $updateMenuQuery = "INSERT INTO menu (name, description, url_img, id_user) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($updateMenuQuery);
    $stmt->bind_param("sssi", $menuName, $menuDescription, $menuImageContent, $_COOKIE['user']);

    if ($stmt->execute()) {
        
        $menuId = $stmt->insert_id;

        
        foreach ($selectedDishes as $dishId) {
            
            $checkDishQuery = "SELECT id_dish FROM dish WHERE id_dish = ?";
            $checkStmt = $mysqli->prepare($checkDishQuery);
            $checkStmt->bind_param("i", $dishId);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult->num_rows > 0) {
                $insertRelationQuery = "INSERT INTO menu_dish_relation (menu_id, dish_id) VALUES (?, ?)";
                $stmt = $mysqli->prepare($insertRelationQuery);
                $stmt->bind_param("ii", $menuId, $dishId);
                $stmt->execute();
            } else {
                echo "Error: The specified dish ID ($dishId) does not exist.";
            }
        }

        // Handle new dishes
        foreach ($newDishNames as $index => $dishName) {
            if (!empty($dishName)) {
                $dishDescription = $newDishDescriptions[$index];
                $dishType = $newDishTypes[$index];

                // Handle new dish image upload
                $dishImageData = 'assets/images/placeholder.jpg'; // Default image
                if (isset($newDishImages['name'][$index]) && $newDishImages['error'][$index] == 0) {
                    $dishImageData = file_get_contents($newDishImages['tmp_name'][$index]);
                }

                // Insert the new dish into the dish table
                $insertDishQuery = "INSERT INTO dish (name, description, type, img_URL) VALUES (?, ?, ?, ?)";
                $stmt = $mysqli->prepare($insertDishQuery);
                $stmt->bind_param("ssss", $dishName, $dishDescription, $dishType, $dishImageData);
                
                if ($stmt->execute()) {
                    // Get the ID of the newly created dish
                    $dishId = $stmt->insert_id;

                    // Insert the new dish into the menu_dish_relation table
                    $insertRelationQuery = "INSERT INTO menu_dish_relation (menu_id, dish_id) VALUES (?, ?)";
                    $stmt = $mysqli->prepare($insertRelationQuery);
                    $stmt->bind_param("ii", $menuId, $dishId);
                    $stmt->execute();
                } else {
                    echo "Error inserting new dish: " . $stmt->error;
                }
            }
        }

        echo "Menu and dishes added successfully!";
    } else {
        echo "Error adding menu: " . $stmt->error; // Error handling for menu insertion
    }
} else {
    echo "Invalid request.";
}
?> 