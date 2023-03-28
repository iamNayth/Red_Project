<?php

require_once('../model/picture_managment.php');
require_once('../model/connexion.php');

function deletePictures() {

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $database = dbConnect();
        suppPicture($id, $database); 
        require('../templates/picture.php'); 
    }
    
}