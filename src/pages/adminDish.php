<?php
  include "redirect.php";
  redirect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage dishes</title>
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
<body class="bg-gray-100 text-gray-800 no-scrollbar">

  <!-- Navbar -->
  <nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center max-w-5xl">
      <a href="admin.php" class="text-2xl font-bold text-blue-500">Dine With Us</a>
      <div class="hidden md:flex space-x-6">
        <a href="adminMenu.php" class="hover:text-blue-500">Menus</a>
        <a href="#" class="text-blue-500">Dishes</a>
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
            <span class="mt-10 font-bold text-4xl text-blue-500 z-10">Dishes</span>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 z-10">
                <!-- Menu Item -->
                <div class="bg-white p-6 shadow-md rounded-lg hover:scale-110 transition duration-300">
                    <img src="../assets/images/placeholder.jpg" alt="Pizza" class="w-full h-48 object-cover mb-4 rounded">
                    <h3 class="text-2xl font-semibold mb-2">Classic Pizza</h3>
                    <p class="text-gray-600 mb-4">Topped with fresh tomatoes, mozzarella, and basil.</p>
                </div>
                <!-- Menu Item -->
                <div class="bg-white p-6 shadow-md rounded-lg hover:scale-110 transition duration-300">
                    <img src="../assets/images/placeholder.jpg" alt="Pizza" class="w-full h-48 object-cover mb-4 rounded">
                    <h3 class="text-2xl font-semibold mb-2">Classic Pizza</h3>
                    <p class="text-gray-600 mb-4">Topped with fresh tomatoes, mozzarella, and basil.</p>
                </div>
                <!-- Menu Item -->
                <div class="bg-white p-6 shadow-md rounded-lg hover:scale-110 transition duration-300">
                    <img src="../assets/images/placeholder.jpg" alt="Pizza" class="w-full h-48 object-cover mb-4 rounded">
                    <h3 class="text-2xl font-semibold mb-2">Classic Pizza</h3>
                    <p class="text-gray-600 mb-4">Topped with fresh tomatoes, mozzarella, and basil.</p>
                </div>
            </div>
    </main>
  <footer class="bg-gray-800 text-gray-300 py-6">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Dine With Us. All rights reserved.</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>