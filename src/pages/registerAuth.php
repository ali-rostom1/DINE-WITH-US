<?php
    include "dbcon.php";
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $sql = 'SELECT * from users where email = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s',$_POST['email']);
        $stmt->execute();
        $res = $stmt->get_result();
        if(!$res->fetch_assoc()){
            $hashedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $sql = 'INSERT INTO users(username,email,pass,id_role) VALUES(?,?,?,2)';
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('sss',$_POST["name"],$_POST["email"],$hashedPass);
            $stmt->execute();
            $sql = 'SELECT id_user,id_role from users where email = ?';
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('s',$_POST['email']);
            $stmt->execute();
            $res = $stmt->get_result();
            $res = $res->fetch_assoc();

            setcookie("user",$res['id_user'],time() + (86400 * 30),'/');
            setcookie("isChef",$res['id_role']==1 ? 'true' : 'false',time() + (86400 * 30),'/');
            
            header('location: ../');
        }
    }
?>