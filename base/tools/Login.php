<?php

/**
 *
 * 
 * created Feb 28, 2012
 */

$username = $_POST['username'];
$password = $_REQUEST['password'];
//die('Username : ' . $username . ' password : ' . $password);
include_once 'models/Account.class.php';
$account = new Account();
$account->construct();
$user = $account->login($username, $password);

if (!$user) {
    header("Location:index.php");
} else {
    session_start();
    $_SESSION['status'] = 'login';
    header("Location:index.php");
}
    
?>
