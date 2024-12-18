<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="../assets/css/input.css">   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap">
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
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <a href="../" class="text-2xl font-bold text-blue-500">Dine With Us</a>
      <div class="hidden md:flex space-x-6">
        <a href="pages/login.php" class="hover:text-blue-500">Login</a>
        <a href="pages/register.php" class="hover:text-blue-500">Sign up</a>
      </div>
      <button class="md:hidden text-blue-500 focus:outline-none">☰</button>
    </div>
  </nav>
  <main class="flex h-screen w-full bg-gray-300 justify-center items-center gap-10 bg-cover bg-center relative" style="background-image: url('../assets/images/admin_background.jpg');">
        <div class="absolute inset-0 opacity-50 bg-black"></div>
        <a href="adminMenu.php" class="lg:w-1/6 w-1/3 h-48 bg-blue-500 rounded-md z-10 hover:scale-110 transition duration-300">
            <div class="h-full flex flex-col justify-center items-center gap-4">
                <i class="fa-solid fa-utensils text-5xl text-white"></i>
                <span class="text-white font-bold text-3xl">Menus</span>
            </div>
        </a>
        <a href="adminDish.php" class="lg:w-1/6 w-1/3 h-48 bg-blue-500 rounded-md z-10 hover:scale-110 transition duration-300">
            <div class="h-full flex flex-col justify-center items-center gap-4">
            <i class="fa-solid fa-bowl-food text-5xl text-white"></i>
                <span class="text-white font-bold text-3xl">dishes</span>
            </div>
        </a>
        <div class="lg:w-1/6 w-1/3 h-48 bg-blue-500 rounded-md z-10 hover:scale-110 transition duration-300">
            <div class="h-full flex flex-col justify-center items-center gap-4">
            <i class="fa-solid fa-clock-rotate-left text-5xl text-white"></i>
                <span class="text-white font-bold text-3xl">Reservations</span>
            </div>
        </div>
  </main>
    


  <footer class="bg-gray-800 text-gray-300 py-6">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Dine With Us. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>