<?php
  include "dbcon.php";
  include "redirect.php";
  redirect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage Reservations</title>
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
        <a href="adminDish.php" class="hover:text-blue-500">Dishes</a>
        <a href="#" class="text-blue-500">Reservations</a>
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
            <span class="mt-10 font-bold text-4xl text-blue-500 z-10">Reservations</span>
            <?php
              $currentChef = $_COOKIE["user"];
              $sql = "Select count(*) from reservations,menu where id_user=?";
              $stmt = $mysqli->prepare($sql);
              $stmt->bind_param("i",$currentChef);
              $stmt->execute();
              $res =$stmt->get_result();
              $res = $res->fetch_assoc();
              echo '<p>number of total reservations: '.$res["count(*)"].'</p>';

            ?>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Reservation ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Menu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $currentChef = $_COOKIE["user"];
                            $sql = "SELECT r.id_reservation,r.status,r.reservation_date,r.id_user,m.name FROM reservations r,menu m WHERE r.id_menu=m.id_menu and m.id_user=$currentChef";
                            $res = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
                            foreach($res as $el){
                                $statusColor = $el['status']=="Accepted" ? "text-green-500" : ($el['status']=="Declined" ? "text-red-500" : "");
                                echo '
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        '.$el['id_reservation'].'
                                    </th>
                                    <td class="px-6 py-4">
                                       '.$el['id_user'].' 
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$el['name'].'
                                    </td>
                                    <td class="px-6 py-4 '.$statusColor.'">
                                        '.$el['status'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$el['reservation_date'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-between">';
                                          if($el['status'] == "Accepted"){
                                            echo '<a href="processReservationAction.php?id_res='.$el["id_reservation"].'&action=decline" class="font-medium text-xl text-red-600  hover:underline hover:scale-150 transition duration-300"><i class="fa-solid fa-xmark"></i></a>
                                            <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>';
                                          }else if($el['status'] == "Declined"){
                                            echo '<a href="processReservationAction.php?id_res='.$el["id_reservation"].'&action=accept" class="font-medium text-xl text-green-600 hover:underline hover:scale-150 transition duration-300"><i class="fa-solid fa-check"></i></a>
                                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>';
                                          }else{
                                            echo '  <a href="processReservationAction.php?id_res='.$el["id_reservation"].'&action=accept" class="font-medium text-xl text-green-600 hover:underline hover:scale-150 transition duration-300"><i class="fa-solid fa-check"></i></a>
                                                    <a href="processReservationAction.php?id_res='.$el["id_reservation"].'&action=decline" class="font-medium text-xl text-red-600  hover:underline hover:scale-150 transition duration-300"><i class="fa-solid fa-xmark"></i></a>
                                                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>';
                                          }
                                        echo '</div>
                                    </td>
                                </tr>
                                ';
                            }

                        ?>
                    </tbody>
                </table>
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