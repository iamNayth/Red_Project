<?php
require_once('../model/connexion.php');
require_once("../model/admin_managment.php");

function displayadmins() {
    $admins = displayAdmin();
    require("../templates/admin.php");
}

if (isset($_POST['addAdmin'])) {
    $addAdmin = addAdmin();
    require('../templates/admin.php');
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $database = dbConnect();
    suppAdmin($id, $database);  
}