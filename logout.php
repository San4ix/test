<script
			  src="https://code.jquery.com/jquery-3.6.1.js"
			  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
			  crossorigin="anonymous"></script>
<script src="ajax.js"></script>
<noscript><span>У Вас отключён JavaScript...</span></noscript>

<?php 
if (!isset ($_SESSION['login']) && !isset ($_SESSION['name'])){
 header('Location: index.php');
exit;
}
session_start();
if(ini_get ("session.use_cookies"))
{
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"],$params["domain"],
        $params["secure"], $params["httponly"]);
}

 unset($_SESSION['login']);
 unset($_SESSION['name']);
        echo "<p><input type='button' id='buttonlogin' value='Вход'> <br></p>";
        echo "<p><input type='button' id='buttonreg' value='Регистрация'> <br></p>";  
?>


