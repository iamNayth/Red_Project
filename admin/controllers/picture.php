<?php

require_once('../model/picture_managment.php');
require_once('../model/connexion.php');

function getPicture() {
    $pictures = displayPictures();
    require('../templates/picture.php');
}