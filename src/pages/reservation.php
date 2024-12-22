<?php
  if(isset($_COOKIE['user'])){
    if($_COOKIE['isChef'] == "true"){
        header('location: admin.php');
        exit;
    }
  }else{
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="../assets/css/input.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>reservation</title>
</head>
<body class="h-screen w-full flex justify-center items-center bg-red-400">
    
    <form class="max-w-3xl mx-auto bg-white px-10 py-10 rounded-lg w-1/3 flex flex-col" action="processReservation.php" method="POST">
        <input type="hidden" name="id_menu" value="<?php echo $_GET['id_menu']; ?>">
        <div class="relative z-0 w-full mb-5 group">
            <input type="datetime-local" name="date" id="date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="date" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date</label>
        </div>
        <div class="relative z-0 w-full mb-10 group">
            <input type="text" name="nb" id="nb" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Number of people</label>
        </div>
        <div class="p-6 shadow-md rounded-lg w-2/3 mb-10 self-center relative">
            <?php
            include "dbcon.php";
                $sql = "SELECT m.url_img, m.name, u.username from menu m,users u where id_menu=? and m.id_user=u.id_user";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("i",$_GET["id_menu"]);
                $stmt->execute();
                $el = $stmt->get_result();
                $el = $el->fetch_assoc();
                if ($el['url_img'] != 'assets/images/placeholder.jpg') {
                   $imageBase64 = base64_encode($el['url_img']);
                   $imageType = 'image/jpg';
                   $imageDataUrl = "data:$imageType;base64,$imageBase64";
                }else {
                   $imageDataUrl = '../'.$el['url_img'];
                }
                echo '<img src="'.$imageDataUrl.'" alt="'.$el["name"].'" class="w-full  object-cover mb-4 rounded">
                <h3 class="text-lg font-bold mb-2">'.$el["name"].'</h3>
                <a href="menu.php"><i class="fa-solid fa-minus absolute text-white bg-red-500 px-2 py-1 rounded-full top-[5%] left-[82%] text-2xl"></i></a>
                <p><strong>By : </strong>'.$el["username"].'</p>';
            ?>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>