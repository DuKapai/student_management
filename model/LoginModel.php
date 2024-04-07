<?php
// noi xu ly - truy van du lieu
require "database/database.php";

// viet ham kiem tra tai khoan dang nhap cua nguoi dung co ton tai trong database hay khong ?
function checkLoginUser($username, $password){
    // $username va $password : du lieu nguoi dung nhap tu form login
    $db = connectionDb(); // bien ket noi toi CSDL
    $userInfo = []; // mang rong dung chua thong tin tai khoan nguoi dung
    $sql = "SELECT a.*, u.`full_name`, u.`email`, u.`phone`, u.`extra_code` FROM `accounts` AS a INNER JOIN `users` AS u ON a.`user_id` = u.`id` WHERE a.`username` = :user AND a.`password` = :pass AND a.`status` = 1 LIMIT 1 ";
    $statement = $db->prepare($sql); // kiem tra cau lenh sql(chuoi)
    if($statement){
        // kiem tra tham so truyen cau lenh sql
        $statement->bindParam(':user', $username, PDO::PARAM_STR);
        $statement->bindParam(':pass', $password, PDO::PARAM_STR);
        // thuc thi sql
        if($statement->execute()){
            // kiem tra xem co du lieu duoc tra ve ko?
            if($statement->rowCount() > 0){
                $userInfo = $statement->fetch(PDO::FETCH_ASSOC);
            }
        }
    }
    // ngat ket noi toi CSDL
    disconnectionDb($db);
    return $userInfo;
    // $userInfo : tra ve la mang rong thi tai khoan dang nhap ko ton tai va nguoc lai
}