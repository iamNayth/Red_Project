<?php

function getUser() 
{
    $database = dbConnect();
    $statement = $database->prepare("SELECT * FROM users");
    $statement->execute();
    $users = [];
    while (($row = $statement->fetch())) {
        $user = [
            'id' => $row['id'],
            'gender' => $row['gender'],
            'first_name' => $row['first_name'],
            'name' => $row['name'],
            'email' => $row['email'],
        ];
        $users[] = $user;
    }
    return $users;

}