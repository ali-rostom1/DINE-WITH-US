<?php
include "dbcon.php";

// Fetch menu details using the id from the query string
if (isset($_GET['id_menu'])) {
    $menuId = $_GET['id_menu'];
    
    // Fetch the menu details (name, description, etc.)
    $menuQuery = "SELECT * FROM menu WHERE id_menu = ?";
    $stmt = $mysqli->prepare($menuQuery);
    $stmt->bind_param("i", $menuId);
    $stmt->execute();
    $menuResult = $stmt->get_result();
    $menuData = $menuResult->fetch_assoc();
    
    // Fetch available dishes
    $dishesQuery = "SELECT * FROM dish"; // Assuming dishes table holds all available dishes
    $dishesResult = $mysqli->query($dishesQuery);
    $dishes = $dishesResult->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="../assets/css/input.css">
    <title>Edit Menu</title>
</head>
<body class="bg-gray-400 font-sans">
    <div class="max-w-xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Menu</h1>
        
        <form action="processEdit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_menu" value="<?php echo $menuData['id_menu']; ?>">

            <!-- Menu Name -->
            <div class="mb-4">
                <label for="menu_name" class="block text-lg font-medium text-gray-700">Name</label>
                <input type="text" id="menu_name" name="menu_name" value="<?php echo $menuData['name']; ?>" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

            <!-- Menu Description -->
            <div class="mb-4">
                <label for="menu_description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="menu_description" name="menu_description" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required><?php echo $menuData['description']; ?></textarea>
            </div>
            <!-- Menu image -->
            <div class="mb-4">
                <label for="menu_img" class="block text-lg font-medium text-gray-700">Image</label>
                <input type="file" id="menu_img" name="menu_img" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" >
            </div>

            <!-- Dishes Section -->
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Available Dishes</h3>
            <div id="dishes-container" class="space-y-3 mb-4">
                <?php
                $currentDishesQuery = "SELECT d.id_dish,d.name,d.type FROM menu m,dish d,menu_dish_relation r WHERE m.id_menu = r.menu_id and d.id_dish = r.dish_id and m.id_menu = ?";
                $stmt = $mysqli->prepare($currentDishesQuery);
                $stmt->bind_param("i", $menuId);
                $stmt->execute();
                $currentDishesResult = $stmt->get_result();
                echo '<div class="flex items-center space-x-2 overflow-x-scroll">';
                while ($currentDish = $currentDishesResult->fetch_assoc()) {
                    echo    '<input type="checkbox" name="dishes[]" value="'.$currentDish['id_dish'].'" checked class="form-checkbox h-5 w-5 text-blue-500">
                            <label for="dish-'.$currentDish['id_dish'].'" class="text-lg text-gray-700">'.$currentDish['name'].'</label>';
                }
                $otherDishesQuery = "SELECT d.id_dish, d.name, d.type FROM dish d LEFT JOIN menu_dish_relation r ON d.id_dish = r.dish_id AND r.menu_id = ? WHERE r.dish_id IS NULL";
                $stmt = $mysqli->prepare($otherDishesQuery);
                $stmt->bind_param("i", $menuId);
                $stmt->execute();
                $otherDishesResult = $stmt->get_result();
                while ($otherDish = $otherDishesResult->fetch_assoc()) {
                    echo    '<input type="checkbox" name="dishes[]" value="'.$otherDish['id_dish'].'" class="form-checkbox h-5 w-5 text-blue-500">
                            <label for="dish-'.$otherDish['id_dish'].'" class="text-lg text-gray-700">'.$otherDish['name'].'</label>';
                }
                echo '</div>';
                ?>
            </div>

            <!-- Add New Dishes Section -->
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Add New Dishes (Optional)</h3>
            <div id="new-dishes" class="space-y-3 mb-4">
                <!-- New dishes will appear here dynamically -->
            </div>
            
            <button type="button" id="add-dish-btn" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                Add New Dish
            </button>

            <!-- Save Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Save Menu
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-dish-btn').addEventListener('click', function() {
            var newDishContainer = document.createElement('div');
            newDishContainer.classList.add('space-y-3', 'mb-4'); // Vertical space between inputs

            // Create dish name input
            var newDishNameInput = document.createElement('div');
            newDishNameInput.classList.add('flex', 'flex-col');
            newDishNameInput.innerHTML = `
                <label for="dish_name" class="text-lg text-gray-700">Dish Name</label>
                <input type="text" name="new_dish_names[]" placeholder="Enter dish name" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            `;
            newDishContainer.appendChild(newDishNameInput);

            // Create dish description input
            var newDishDescInput = document.createElement('div');
            newDishDescInput.classList.add('flex', 'flex-col');
            newDishDescInput.innerHTML = `
                <label for="dish_description" class="text-lg text-gray-700">Dish Description</label>
                <textarea name="new_dish_descriptions[]" placeholder="Enter dish description" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required></textarea>
            `;
            newDishContainer.appendChild(newDishDescInput);
            
            // Create dish type (radio buttons: Starter, Main, Dessert)
            var newDishTypeInput = document.createElement('div');
            newDishTypeInput.classList.add('flex', 'flex-col');
            newDishTypeInput.innerHTML = `
                <label for="dish_type" class="text-lg text-gray-700">Dish Type</label>
                <div class="flex space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="new_dish_types[]" value="starter" class="form-radio h-5 w-5 text-blue-500">
                        <span class="ml-2">Starter</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="new_dish_types[]" value="main" class="form-radio h-5 w-5 text-blue-500">
                        <span class="ml-2">Main</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="new_dish_types[]" value="dessert" class="form-radio h-5 w-5 text-blue-500">
                        <span class="ml-2">Dessert</span>
                    </label>
                </div>
            `;
            newDishContainer.appendChild(newDishTypeInput);

            // Create image input for the dish
            var newDishImgInput = document.createElement('div');
            newDishImgInput.classList.add('flex', 'flex-col');
            newDishImgInput.innerHTML = `
                <label for="dish_image" class="text-lg text-gray-700">Dish Image</label>
                <input type="file" name="new_dish_images[]" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" accept="image/*">
            `;
            newDishContainer.appendChild(newDishImgInput);

            // Append the new dish container to the new-dishes section
            document.getElementById('new-dishes').appendChild(newDishContainer);
        });
    </script>
</body>
</html>