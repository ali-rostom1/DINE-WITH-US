<?php
    setcookie('isChef', '', time() - 3600,'/');
    setcookie('user', '', time() - 3600,'/');
    header('location: ../');
?>