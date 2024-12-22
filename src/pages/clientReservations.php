<?php
  if(isset($_COOKIE['user'])){
    if($_COOKIE['isChef'] == "true"){
        header('location: pages/admin.php');
        exit;
    }
  }else{
    header('location: ../');
    exit;
  }
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
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet"/>
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
      <a href="../" class="text-2xl font-bold text-red-500">Dine With Us</a>
      <div class="hidden md:flex space-x-6">
        <a href="menu.php" class="hover:text-red-500">Menu</a>
        <a href="../#about" class="hover:text-red-500">About Us</a>
        <a href="../#contact" class="hover:text-red-500">Contact</a>
      </div>
        <div class="hidden md:flex space-x-6">
          <a href="clientReservations.php" class="hover:text-red-500">Reservations</a>
            <a href="logout.php" class="hover:text-red-500">Logout</a>
          </div>
      <button class="md:hidden text-red-500 focus:outline-none">☰</button>

    </div>
  </nav>
  <section class="relative bg-cover bg-center h-screen" style="background-image: url('../assets/images/login_img.jpg');">
    <div class="max-w-5xl h-full mx-auto px-4 py-4 flex flex-col items-center gap-10 justify-center">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Reservation ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Menu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                persons
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
                            include "dbcon.php";
                            $sql = "SELECT r.id_reservation,m.name,r.persons,r.status,r.reservation_date FROM reservations r,menu m where r.id_user=? and r.id_menu=m.id_menu";
                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_param("i",$_COOKIE["user"]);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            $res = $res->fetch_all(MYSQLI_ASSOC);
                            foreach($res as $el){
                                echo '
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        '.$el['id_reservation'].'
                                    </th>
                                    <td class="px-6 py-4">
                                       '.$el['name'].' 
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$el['persons'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$el['status'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        '.$el['reservation_date'].'
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-between">
                                            <a href="processReservation.php?delete='.$el["id_reservation"].'" class="font-medium text-xl text-red-600  hover:underline hover:scale-150 transition duration-300"><i class="fa-solid fa-xmark"></i></a>
                                            <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                                ';
                            }
                        ?>
                    </tbody>
    </table>

    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>