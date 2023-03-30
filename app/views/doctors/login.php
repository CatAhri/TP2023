<?php
session_start();
//Let's check if the user is already logged in
if(isset($_SESSION['username']) && isset($_SESSION['password']) && ($_SESSION['username'] != '') && ($_SESSION['password'] != ''))
{
    echo 'User '.$_SESSION['username'].' already authentified';
    echo '<br><a href="logout.php" title="login">Log out</a>';
}
else{

    $_SESSION['username'] = '';
    $_SESSION['password'] = '';
    if (isset($_POST['submit']))
    {
    // bouton submit pressé, je traite le formulaire
    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';
    if (($username == "insacvl") && ($password == "azerty"))
    {
    $_SESSION['username'] = "insacvl";
    $_SESSION['password'] = "azerty";
    echo 'User '.$_SESSION['username'].' correctly authentified';
    echo '<br><a href="logout.php" title="login">Log out</a>';
    
    }
    else
    {
    // une erreur de saisie ...?
    echo '<p style="color:#FF0000; font-weight:bold;">Erreur de connexion.</p>';
    }
    }; // fin if (isset($_POST['submit']))
    if (!isset($_POST['submit']))
    {
    // Bouton submit non pressé j'affiche le formulaire
    echo '
    <form id="conn" method="post" action="">
    <p><label for="username">Username :</label><input type="text" id="username" name="username" /></p>
    <p><label for="password">Password :</label><input type="password" id="password" name="password" /></p>
    <p><input type="submit" id="submit" name="submit" value="Submit" /></p>
    </form>';
    }; // fin if (!isset($_POST['submit'])))
}
?> 

