<?php

require_once('../model/picture_managment.php');
require_once('../model/connexion.php');

function displayAdd_Picture() {
    require('../templates/add_picture.php');
}

if (isset($_POST['addPicture'])) {
    $addPictures = addPicture();
    require('../templates/add_picture.php');
}
