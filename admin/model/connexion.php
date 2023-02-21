<?php

function dbConnect()
{
    $database = new PDO('mysql:host=localhost;dbname=red_project;charset=utf8', 'root', 'root');
    return $database;
}