<?php
session_start();

if (isset ($_SESSION['login']) && isset ($_SESSION['name'])){
        header('Location: index.php');
exit;
       }
if (isset($_POST['login']) && isset($_POST['password'])) 
    {
    $login = ($_POST['login']);
    $login = stripslashes($_POST['login']);
    $login = htmlspecialchars($_POST['login']);
    $login = trim($_POST['login']);
    $password = ($_POST['password']);
    $password = stripslashes($_POST['password']);
    $password = htmlspecialchars($_POST['password']);
    $password = trim($_POST['password']);

    

    $dbarray = [];
    if (file_exists('db.json'))
    {
       $json = file_get_contents('db.json');
       $dbarray = json_decode($json, true);


        if($dbarray)
        {
            foreach($dbarray as $value)
            {
                if($value['password'] == $password && $value['login'] == $login)
                {
                    $_SESSION['login'] = $login;
                    $_SESSION['name'] = $value['name'];
                    header('Location: index.php');
                    exit;

                }
                
                    

                
            
            }

            
        
       
        

        }
}
        echo "<p>Неверный логин, или пароль</p>";
        echo '<a href="login.php"> Назад</a></br>';
        echo '<a href="index.php"> На главную</a>';

    }


if (empty($login) or empty($password))
    {
        echo "<form id='login' action='login.php' method='post'> 
        <h1>Форма авторизации</h1>  
        <p>Логин<br /><input type='text' name='login' required='required' minlength='6'></p> 
        <p>Пароль<br /><input type='password' name='password' required=required minlength='6'></p> 
        <p><input type='submit' name='submit' value='Войти'> <br></p>
        </form>" ;
        echo '<a href="index.php"> На главную</a>';
    }



?>