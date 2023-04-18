<?php 

require_once('../model/db.php');


function displayLogIn() {
    $msg="";
    require('../templates/login.php');
}

function connect() {
    $msg = logIn();
    require('../templates/login.php');
}