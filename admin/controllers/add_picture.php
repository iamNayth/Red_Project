<?php

require_once('../model/picture_managment.php');
require_once('../model/connexion.php');

function getAdd_Picture() {
    $addPictures = addPicture();
    require('../templates/add_picture.php');
}

