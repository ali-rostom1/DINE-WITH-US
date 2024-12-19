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
        <a href="login.php" class="hover:text-blue-500">Logout</a>
      </div>
      <button class="md:hidden text-blue-500 focus:outline-none">☰</button>
    </div>
  </nav>

    <main class="min-h-screen w-full relative" style="background-image: url('../assets/images/admin_menu_background.jpg');">
        <div class="max-w-5xl h-full mx-auto px-4 py-4 flex flex-col items-center gap-10">
            <div class="absolute inset-0 bg-opacity-30 bg-black"></div>
            <div class="flex justify-between w-[90%] mx-auto items-center mt-10 z-10">
                <span class=" font-bold text-4xl text-blue-500 z-10">Menus</span>
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="px-5 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 ">
                    Add Menu
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 z-10">
                <!-- Menu Item -->
                <div data-modal-target="choice-modal" data-modal-toggle="choice-modal" class="bg-white p-6 shadow-md rounded-lg hover:scale-110 transition duration-300">
                    <img src="../assets/images/placeholder.jpg" alt="Pizza" class="w-full h-48 object-cover mb-4 rounded">
                    <h3 class="text-2xl font-semibold mb-2">Classic Pizza</h3>
                    <p class="text-gray-600 mb-4">Topped with fresh tomatoes, mozzarella, and basil.</p>
                </div>
                <!-- Menu Item -->
                <div data-modal-target="choice-modal" data-modal-toggle="choice-modal" class="bg-white p-6 shadow-md rounded-lg hover:scale-110 transition duration-300">
                    <img src="../assets/images/placeholder.jpg" alt="Pizza" class="w-full h-48 object-cover mb-4 rounded">
                    <h3 class="text-2xl font-semibold mb-2">Classic Pizza</h3>
                    <p class="text-gray-600 mb-4">Topped with fresh tomatoes, mozzarella, and basil.</p>
                </div>
                <!-- Menu Item -->
                <div data-modal-target="choice-modal" data-modal-toggle="choice-modal" class="bg-white p-6 shadow-md rounded-lg hover:scale-110 transition duration-300">
                    <img src="../assets/images/placeholder.jpg" alt="Pizza" class="w-full h-48 object-cover mb-4 rounded">
                    <h3 class="text-2xl font-semibold mb-2">Classic Pizza</h3>
                    <p class="text-gray-600 mb-4">Topped with fresh tomatoes, mozzarella, and basil.</p>
                </div>
            </div>
    </main>
    <!-- CRUD modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-gray-600 rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-white dark:text-white">
                        Modify Menu
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-white">Name</label>
                            <input type="text" name="name" id="nameInput" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Menu name" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-white">Product Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-white" for="file_input">Upload file</label>
                            <input class="block w-full text-sm rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" id="file_input" type="file">
                        </div>
                        <div class="col-span-2">
                            <label for="dishes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">dishes</label>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        
                                    </thead>
                                    <tbody>
                                        <tr class=" border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                                            <td class="p-4">
                                                <img src="../assets/images/placeholder.jpg" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                                            </td>
                                            <td class="px-4 py-4 font-semibold text-white">
                                                Apple Watch
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="#" class="font-medium text-red-500 hover:underline">Remove</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div data-modal-target="dish-modal" data-modal-toggle="dish-modal" data-modal-hide="crud-modal" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Add new dish
                        </div>
                        <button class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Confirm changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"  data-modal-hide="choice-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                    <button data-modal-hide="choice-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-whitefocus:outline-none bg-red-500 rounded-lg hover:bg-red-600 hover:text-black focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700  dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Remove</button>
                </div>
            </div>
        </div>
    </div>


    <!-- dish modal -->
    <div id="dish-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                    <h3 class="text-xl font-semibold text-white">
                        Choose your dishes
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-hide="dish-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="w-full text-sm font-medium rounded-lg bg-gray-700 text-white">
                        <div class="w-full flex flex-wrap gap-4">
                            <div class="flex items-center px-3 border rounded-lg">
                                <input id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600  rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                <label for="vue-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-300">qsijdiqsjdiqjsdis</label>
                            </div>
                            <div class="flex items-center px-3 border rounded-lg">
                                <input id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600  rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                <label for="react-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-300">react</label>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-600">
                    <button data-modal-hide="dish-modal" data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">done</button>
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