<?php
require_once('model/connexion.php');
require_once("model/admin_managment.php");

function admins() {
    $admins = displayAdmin();
    $addAdmin = addAdmin();
    require("templates/admin.php");
}