<?php
    function redirect(){
        if(isset($_COOKIE["isChef"])){
            if($_COOKIE["isChef"] == "false"){
            header('location: ../');
            exit;
            }
        }else{
            header('location: ../');
            exit;
        }
    }
?>