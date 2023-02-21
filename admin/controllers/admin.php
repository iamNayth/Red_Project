<?php
require_once('model/connexion.php');
require_once("model/admin_managment.php");
function admins() {
    $admins = displayAdmin();
    require("templates/admin.php");
}