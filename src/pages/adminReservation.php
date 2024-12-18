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
        <a href="login.php" class="hover:text-blue-500">Logout</a>
      </div>
      <button class="md:hidden text-blue-500 focus:outline-none">☰</button>
    </div>
  </nav>
  <main class="min-h-screen w-full relative" style="background-image: url('../assets/images/admin_menu_background.jpg');">
        <div class="max-w-5xl h-full mx-auto px-4 py-4 flex flex-col items-center gap-10">
            <div class="absolute inset-0 bg-opacity-30 bg-black"></div>
            <span class="mt-10 font-bold text-4xl text-blue-500 z-10">Reservations</span>
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
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                12371273614
                            </th>
                            <td class="px-6 py-4">
                                1236
                            </td>
                            <td class="px-6 py-4">
                                cheese Burger
                            </td>
                            <td class="px-6 py-4">
                                Pending
                            </td>
                            <td class="px-6 py-4">
                                22/11/2002
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-between">
                                    <a href="#" class="font-medium text-xl text-green-600 hover:underline hover:scale-150 transition duration-300"><i class="fa-solid fa-check"></i></a>
                                    <a href="#" class="font-medium text-xl text-red-600  hover:underline hover:scale-150 transition duration-300"><i class="fa-solid fa-xmark"></i></a>
                                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                12371273614
                            </th>
                            <td class="px-6 py-4">
                                1236
                            </td>
                            <td class="px-6 py-4">
                                cheese Burger
                            </td>
                            <td class="px-6 py-4">
                                Pending
                            </td>
                            <td class="px-6 py-4">
                                22/11/2002
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-between items-center">
                                    <a href="#" class="font-medium text-xl text-red-600  hover:underline hover:scale-150 transition duration-300"><i class="fa-solid fa-xmark"></i></a>
                                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                </div>
                            </td>
                        </tr>
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