<?php
  if(isset($_COOKIE['user'])){
    if($_COOKIE['isChef'] == "true"){
        header('location: admin.php');
        exit;
    }
  }
  include "dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Page</title>
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="../assets/css/input.css">   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
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
      <a href="../index.php" class="text-2xl font-bold text-red-500">Dine With Us</a>
      <?php
        if(!isset($_COOKIE["user"])){
          echo '
          <div class="hidden md:flex space-x-6">
            <a href="login.php" class="hover:text-red-500">Login</a>
            <a href="register.php" class="hover:text-red-500">Sign up</a>
          </div>';
        }else{
          echo '
          <div class="hidden md:flex space-x-6">
          <a href="clientReservations.php" class="hover:text-red-500">Reservations</a>
            <a href="logout.php" class="hover:text-red-500">Logout</a>
          </div>';
        }
      ?>
      <button class="md:hidden text-red-500 focus:outline-none">☰</button>

    </div>
  </nav>
  
  <div class="min-h-screen w-full py-10 px-10 flex flex-col items-center gap-10">
    
    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center w-max" type="button">Choose your chef<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden divide-y divide-gray-100 rounded-lg shadow w-44 bg-gray-700">
        <ul class="py-2 text-sm text-white" aria-labelledby="dropdownDefaultButton" id="chefSelect">
          <?php
            $sql = "SELECT us.username from users us,role rl where us.id_role=rl.id_role and rl.name = 'admin'";
            $res = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
            foreach($res as $el){
              echo '
                  <li>
                    <a class="block px-4 py-2 hover:bg-red-500">'.$el["username"].'</a>
                  </li>
              ';
            }
          
          ?>
        </ul>
    </div>

    <div id="cardContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
           $sql = "SELECT mn.name,mn.id_menu , mn.url_img , mn.description , us.username FROM menu mn, users us WHERE mn.id_user = us.id_user";
           $res = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
          foreach($res as $el){
            if ($el['url_img'] != 'assets/images/placeholder.jpg') {
              $imageBase64 = base64_encode($el['url_img']);
              $imageType = 'image/jpg';
              $imageDataUrl = "data:$imageType;base64,$imageBase64";
            }else {
              $imageDataUrl = '../'.$el['url_img'];
            }
            echo '<a id="'.$el["username"].'" class="bg-white p-6 shadow-md rounded-lg" href="reservation.php?id_menu='.$el['id_menu'].'">
                    <img src="'.$imageDataUrl.'" alt="'.$el["name"].'" class="w-full h-48 object-cover mb-4 rounded">
                    <h3 class="text-2xl font-semibold mb-2">'.$el["name"].'</h3>
                    <p class="text-gray-600 mb-4">'.$el["description"].'.</p>
                  </a>';
          }
        ?>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-gray-300 py-6">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Dine With Us. All rights reserved.</p>
    </div>
  </footer>
  <script src="../assets/js/menu.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
