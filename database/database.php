<?php
// dung thu vien PDO cua PHP de lam viec voi database(MySql)

// viet ham ket noi toi csdl
function connectionDb(){
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=students_management', 'root', '');
        return $dbh;
    } catch (PDOException $e) {
        // attempt to retry the connection after some timeout for example
        echo "Can not connect to database";
        echo "<br/>";
        echo "<pre>";
        print_r($e);
        die();
    }
}

// ngat ket noi database
function disconnectionDb($connection){
    $connection = null;
}