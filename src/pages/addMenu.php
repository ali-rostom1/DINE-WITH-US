
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
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">ADD Menu</h1>
        
        <form action="processAddMenu.php" method="POST" enctype="multipart/form-data">

            <!-- Menu Name -->
            <div class="mb-4">
                <label for="menu_name" class="block text-lg font-medium text-gray-700">Name</label>
                <input type="text" id="menu_name" name="menu_name" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Name..." required>
            </div>

            <!-- Menu Description -->
            <div class="mb-4">
                <label for="menu_description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="menu_description" name="menu_description" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Description..." required></textarea>
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
                include "dbcon.php";
                $allDishesQuery = "SELECT * FROM dish";
                $allDishes = $mysqli->query($allDishesQuery)->fetch_all(MYSQLI_ASSOC);
                echo '<div class="flex items-center gap-5 flex-wrap">';
                foreach($allDishes as $dish){
                    echo '
                        <div><input type="checkbox" name="dishes[]" value="'.$dish['id_dish'].'" class="form-checkbox h-5 w-5 text-blue-500">
                            <label for="dish-'.$dish['id_dish'].'" class="text-lg text-gray-700">'.$dish    ['name'].'</label></div>';
                }
                echo '</div>';
                ?>
            </div>

            <!-- Add New Dishes Section -->
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Add New Dishes (Optional)</h3>
            <div id="new-dishes" class="space-y-3 mb-4">
                
            </div>
            <div class="flex justify-start gap-10">
                <button type="button" id="add-dish-btn" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                    Add New Dish
                </button>
                <button type="button" id="remove-dish-btn" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                    Revert Dish
                </button>
            </div>
            <div class="flex justify-end gap-10">
                <button type="submit" class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Save Menu
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-dish-btn').addEventListener('click', function() {
            var newDishContainer = document.createElement('div');
            newDishContainer.classList.add('space-y-3', 'mb-4'); 

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
        document.getElementById('remove-dish-btn').addEventListener('click', function() {
            var newDishesContainer = document.getElementById('new-dishes');
            if(newDishesContainer.children.length>0){
                newDishesContainer.lastElementChild.remove();
            }
        });
    </script>
</body>
</html>