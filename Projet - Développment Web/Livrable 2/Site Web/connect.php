<?php
// session start always take place at the beginning of the php
session_start();

// connection between the database and the website
$con = mysqli_connect('localhost', 'root', '', 'db_projetweb');

// username and password are the names of the input in the form
$email = trim($_POST['mail']);

// eliminate the spaces and the special characters
$emailtrip = stripcslashes($email);
$userfinal = htmlspecialchars($emailtrip);

// similar for the password
$password = trim($_POST['password']);

$passwordtrip = stripcslashes($password);
$passfinal = htmlspecialchars($passwordtrip);

// compare the email and the password with the database
$sql = "SELECT * FROM personne WHERE Mail_Pers = `$userfinal` AND Mdp_Pers = `$passfinal`";

// SQL result 
$result = mysqli_query($con, $sql);

// if the result is equal to 1, the user is connected
// is found else is not found

if(mysqli_num_rows($result) >= 1){

    // mail is stored in the session
    $_SESSION['email'] = $userfinal;
    header('Location:reussi.html');
} else {
    $_SESSION["error"] = "Email ou mot de passe incorrect";
    header('Location:Connexion.html');
}
?>
```
