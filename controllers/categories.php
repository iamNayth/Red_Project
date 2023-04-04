<?php

require_once('../model/db.php');
require_once('../admin/model/categorie_managment.php');


function displayCategories() {
  
    $categories = getCategories();
    require('../templates/categories.php');

}  
