<!DOCTYPE html>
<html>
  <head>
    <meta charset=UTF-8>
    <title>Тестовое задание</title>
  </head>
  <body>
 



<script
			  src="https://code.jquery.com/jquery-3.6.1.js"
			  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
			  crossorigin="anonymous"></script>
<script src="ajax.js"></script>
<noscript><span>У Вас отключён JavaScript...</span></noscript>

<h1>Тестовое задание</h1>

<div id = 'result'>


<?php
session_start();

if (isset ($_SESSION['login']) && isset ($_SESSION['name']))
    {
        $name = $_SESSION['name'];
        echo "<p>$name!</p>";
        echo "<p><input type='button' id='logout' value='Выйти'> <br></p>";        

    
    }
   else{echo "<p><input type='button' id='buttonlogin' value='Вход'> <br></p>";
    echo "<p><input type='button' id='buttonreg' value='Регистрация'> <br></p>";}

    

?>

</div>
 </body>
</html>