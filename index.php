<h1>Тестовое задание</h1>
<?php
session_start();

if (isset ($_SESSION['login']) && isset ($_SESSION['name']))
    {
        $name = $_SESSION['name'];
        echo "<p>Здравствуйте, $name!</p>";        
        echo "<form id='login' action='logout.php' method='post'> 
        <p><input type='submit' name='submit' value='Выйти'> <br></p>
    </form>";
    exit;
    }
    
 





    echo "<form id='login' action='login.php' method='post'> 
    <p><input type='submit' name='submit' value='Вход'> <br></p>
    </form>";
    echo "<form id='login' action='reg.php' method='post'> 
    <p><input type='submit' name='submit' value='Регистрация'> <br></p>
    </form>";
   
    
    

?>