<?php
  include "redirect.php";
  redirect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage menus</title>
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="../assets/css/input.css">   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
        font-family: 'Poppins', sans-serif;
        }
        h1, h2, h3 {
        font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center max-w-5xl">
      <a href="admin.php" class="text-2xl font-bold text-blue-500">Dine With Us</a>
      <div class="hidden md:flex space-x-6">
        <a href="#" class="text-blue-500">Menus</a>
        <a href="adminDish.php" class="hover:text-blue-500">Dishes</a>
        <a href="adminReservation.php" class="hover:text-blue-500">Reservations</a>
      </div>
      <div class="hidden md:flex space-x-6">
        <a href="logout.php" class="hover:text-blue-500">Logout</a>
      </div>
      <button class="md:hidden text-blue-500 focus:outline-none">☰</button>
    </div>
  </nav>

    <main class="min-h-screen w-full relative" style="background-image: url('../assets/images/admin_menu_background.jpg');">
        <div class="max-w-5xl h-full mx-auto px-4 py-4 flex flex-col items-center gap-10">
            <div class="absolute inset-0 bg-opacity-30 bg-black"></div>
            <div class="flex justify-between w-[90%] mx-auto items-center mt-10 z-10">
                <span class=" font-bold text-4xl text-blue-500 z-10">Menus</span>
                <button id="addMenu" class="px-5 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 ">
                    Add Menu
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 z-10">
                <?php
                    include "dbcon.php";
                    $user_id = $_COOKIE['user'];
                    $sql = "SELECT * FROM menu where id_user = $user_id";
                    $res = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
                    foreach($res as $el){
                        if ($el['url_img'] != 'assets/images/placeholder.jpg') {
                            $imageBase64 = base64_encode($el['url_img']);
                            $imageType = 'image/png';
                            $imageDataUrl = "data:$imageType;base64,$imageBase64";
                        }else {
                            $imageDataUrl = '../'.$el['url_img'];
                        }
                        echo '<div data-modal-target="choice-modal" data-modal-toggle="choice-modal" id="'.$el["id_menu"].'" class="menuCard bg-white p-6 shadow-md rounded-lg hover:scale-110 transition duration-300 cursor-pointer menu-card">
                                <img src="'.$imageDataUrl.'" alt="'.$el["name"].'" class="w-full h-48 object-cover mb-4 rounded">
                                <h3 class="text-2xl font-semibold mb-2">'.$el["name"].'</h3>
                                <p class="text-gray-600 mb-4">'.$el["description"].'.</p>
                            </div>';
                    }
                ?>
            </div>
    </main>

    <!-- choice modal -->
    <div id="choice-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-gray-900 rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white">
                        Edit or Remove
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="choice-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-400 ">
                        Do you want to edit or remove this menu?
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <a href="#" id="edit" data-modal-hide="choice-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                    <a href="#" id="del" data-modal-hide="choice-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-whitefocus:outline-none bg-red-500 rounded-lg hover:bg-red-600 hover:text-black focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700  dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Remove</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-gray-800 text-gray-300 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Dine With Us. All rights reserved.</p>
        </div>
    </footer>
    <script src="../assets/js/adminMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>