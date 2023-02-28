<?php

require_once('../model/picture_managment.php');
require_once('../model/connexion.php');

function displayPicture() {
    $pictures = getPictures();
    require('../templates/picture.php');
}