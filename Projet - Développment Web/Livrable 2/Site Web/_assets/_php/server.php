<?php
session_start();

// Intialize variables
$mail = "";
$pass = "";
$errors = array();

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'projet_devweb');

// Register user
if (isset($_POST['reg_user'])) {
    // Receive all input values from the form
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);

    // Form validation: ensure that the form is correctly filled
    if (empty($mail)) { array_push($errors, "Mail is required"); }
    if (empty($pass)) { array_push($errors, "Password is required"); }
}