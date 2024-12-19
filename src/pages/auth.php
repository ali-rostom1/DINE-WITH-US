<?php
    include "dbcon.php";
    if(isset($_POST['email']) && isset($_POST['password'])){
        $sql = 'SELECT * from users where email = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s',$_POST['email']);
        $stmt->execute();
        $res = $stmt->get_result();
        $res = $res->fetch_assoc();
        if(password_verify($_POST['password'],$res["pass"])){
            setcookie("user",$res['id_user'],time() + (86400 * 30),'/');
            setcookie("isChef",$res['id_role']==1 ? 'true' : 'false',time() + (86400 * 30),'/');
            if($_COOKIE["isChef"] == 'true'){
                header("location: admin.php");
                exit;
            }
            header('location: ../');
            exit;
        }else{
           header('location: login.php?error='.urlencode("incorrect Password"));
           exit;
        }
    }
?>