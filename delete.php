<?php
include("classes/Users.php");
$user = new Users();
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $user->delete($id);
}
