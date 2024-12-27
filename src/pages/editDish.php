<?php
    include "dbcon.php";
    include "redirect.php";
    redirect();
    
    if (isset($_GET['id_dish'])) {
        $dishId = $_GET['id_dish'];
        
        $dishQuery = "SELECT * FROM dish WHERE id_dish = ?";
        $stmt = $mysqli->prepare($dishQuery);
        $stmt->bind_param("i", $dishId);
        $stmt->execute();
        $dishResult = $stmt->get_result();
        $dishData = $dishResult->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="../assets/css/input.css">
    <title>Edit Dish</title>
</head>
<body class="bg-gray-400 font-sans min-h-screen w-screen flex items-center">
    <div class="max-w-xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Dish</h1>
        
        <form action="processEditDish.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_dish" value="<?php echo $dishData['id_dish']; ?>">
            <!-- Dish Name -->
            <div class="mb-4">
                <label for="dish_name" class="block text-lg font-medium text-gray-700">Name</label>
                <input type="text" id="dish_name" name="dish_name" value="<?php echo $dishData["name"]; ?>" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Name..." required>
            </div>

            <!-- Dish Description -->
            <div class="mb-4">
                <label for="dish_description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="dish_description" name="dish_description" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Description..." required><?php echo $dishData["description"]; ?></textarea>
            </div>
            <!-- Dish image -->
            <div class="mb-4">
                <label for="dish_img" class="block text-lg font-medium text-gray-700">Image</label>
                <input type="file" id="dish_img" name="dish_img" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" >
            </div>
            <div class="mb-8">
                <label for="dish_type" class="block text-lg font-medium text-gray-700 mb-4">Type</label>
                <div class="flex justify-between items-center text-blue-500">
                    <div class="flex gap-4 items-center">
                        <label >Starter</label>
                        <input type="radio" id="starter" value="starter" name="dish_type" class=" w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" <?php if($dishData["type"] == "starter") echo 'checked';?>>
                    </div>
                    <div class="flex gap-4 items-center">
                        <label >Main</label>
                        <input type="radio" id="main" value="main" name="dish_type" class=" w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" <?php if($dishData["type"] == "main") echo 'checked';?>>
                    </div>
                    <div class="flex gap-4 items-center">
                        <label >Dessert</label>
                        <input type="radio" id ="dessert" value="dessert" name="dish_type" class=" w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" <?php if($dishData["type"] == "dessert") echo 'checked';?>>
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-10">
                <a href="adminDish.php" class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Save Dish
                </button>
            </div>
        </form>
    </div>
</body>
</html>