<?php 

require_once('../model/db.php');
require_once('../admin/model/user_managment.php');


function displaySignIn() {
    require('../templates/sign_in.php');
}

function validate_add_user() {
    $users = addUser();
    require('../templates/login.php');
}