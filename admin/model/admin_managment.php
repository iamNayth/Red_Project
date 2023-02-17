<?php


function displayAdmin() 
{
    $database = dbConnect();
    $statement = $database->prepare("SELECT * FROM admin");
    $statement->execute();
    $admins = [];
    while (($row = $statement->fetch())) {
        $admin = [
            'id' => $row['id'],
            'nickname' => $row['nickname'],
            'email' => $row['email'],
        ];
        $admins[] = $admin;
    }
    return $admins;

}
