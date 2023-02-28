<?php

require_once('../model/user_managment.php');
require_once('../model/connexion.php');

function displayUser() {
    $users = getUser();
    require('../templates/users.php');
}