<?php


require_once('../model/db.php');
require_once('../admin/model/product_managment.php');


function displayHomepage() {
    require('../templates/homepage.php');
    $products = getProducts();
}