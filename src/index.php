<?php
  if(isset($_COOKIE['user'])){
    if($_COOKIE['isChef'] == "true"){
        header('location: pages/admin.php');
        exit;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Page</title>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="assets/css/input.css">   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap">
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
      <a href="#" class="text-2xl font-bold text-red-500">Dine With Us</a>
      <div class="hidden md:flex space-x-6">
        <a href="#menu" class="hover:text-red-500">Menu</a>
        <a href="#about" class="hover:text-red-500">About Us</a>
        <a href="#contact" class="hover:text-red-500">Contact</a>
      </div>
      <?php
        if(!isset($_COOKIE["user"])){
          echo '
          <div class="hidden md:flex space-x-6">
            <a href="pages/login.php" class="hover:text-red-500">Login</a>
            <a href="pages/register.php" class="hover:text-red-500">Sign up</a>
          </div>';
        }else{
          echo '
          <div class="hidden md:flex space-x-6">
            <a href="pages/logout.php" class="hover:text-red-500">Logout</a>
          </div>';
        }
      ?>
      <button class="md:hidden text-red-500 focus:outline-none">☰</button>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative bg-cover bg-center h-screen" style="background-image: url('assets/images/hero_chef.jpg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto h-full flex flex-col justify-center items-center text-center relative z-10">
      <h1 class="text-5xl md:text-6xl text-white font-bold mb-6">Welcome to Dine With Us</h1>
      <p class="text-xl text-gray-200 mb-8">The best dining experience for food lovers.</p>
      <a href="#menu" class="bg-red-500 text-white px-6 py-3 rounded-full hover:bg-red-600 transition">Explore Menu</a>
    </div>
  </section>

  <!-- Menu Section -->
  <section id="menu" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-4xl text-center font-bold mb-12">Our chefs</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
          include "pages/dbcon.php";
          $sql = "SELECT * FROM menu LIMIT 3";
          $res = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
          foreach($res as $el){
            echo '<div class="bg-white p-6 shadow-md rounded-lg">
          <img src="'.$el["url_img"].'" alt="'.$el["name"].'" class="w-full h-48 object-cover mb-4 rounded">
          <h3 class="text-2xl font-semibold mb-2">'.$el["name"].'</h3>
          <p class="text-gray-600 mb-4">'.$el["description"].'.</p>
        </div>';
          }
        ?>
      </div>
      <div class="flex justify-center items-center mt-5 h-20">
        <a href="pages/menu.php" class="px-6 py-3 rounded-full bg-red-500 text-white hover:bg-red-600 transition">See All menus</a>
      </div>
    </div>
  </section>

  <!-- About Us Section -->
  <section id="about" class="py-16 bg-white">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
      <div class="w-full md:w-1/2 mb-8 md:mb-0">
        <img src="assets/images/hero_chef.jpg" alt="About Us" class="w-full rounded-lg shadow-md">
      </div>
      <div class="w-full md:w-1/2 md:pl-12">
        <h2 class="text-4xl font-bold mb-6">About Us</h2>
        <p class="text-gray-600 leading-relaxed mb-4">
          At Dine With Us, we are passionate about bringing you the best culinary experience. Our chefs use the freshest ingredients to prepare mouthwatering dishes for all food lovers.
        </p>
        <a href="#contact" class="text-red-500 font-bold hover:underline">Get in Touch →</a>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-4xl font-bold mb-6">Contact Us</h2>
      <p class="text-gray-600 mb-8">Have questions or want to make a reservation? Contact us!</p>
      <a href="mailto:contact@restaurant.com" class="text-lg bg-red-500 text-white px-6 py-3 rounded-full hover:bg-red-600 transition">Email Us</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-gray-300 py-6">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Dine With Us. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
