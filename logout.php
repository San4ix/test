<?php 
session_start();

if (!isset ($_SESSION['login']) && !isset ($_SESSION['name'])){
 header('Location: index.php');
exit;
}

if(ini_get ("session.use_cookies"))
{
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"],$params["domain"],
        $params["secure"], $params["httponly"]);
}

 unset($_SESSION['login']);
 unset($_SESSION['name']);
 header('Location: index.php');  
?>


