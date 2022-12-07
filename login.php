<script
			  src="https://code.jquery.com/jquery-3.6.1.js"
			  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
			  crossorigin="anonymous"></script>
<script src="ajax.js"></script>
<noscript><span>У Вас отключён JavaScript...</span></noscript>
<?php

session_start();



if (isset($_POST['jsonlogin'])) 
{   $cartlodin = json_decode( $_POST['jsonlogin'] );
 
    
    $login = $cartlodin->login;
    $password = $cartlodin->password;
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = trim($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);
    $salt = "iu4gr7ku7n2ooms";
    $passwordHash = md5($salt.$password);
  
    

    

    $dbarray = [];
    if (file_exists('db.json'))
    {
       $json = file_get_contents('db.json');
       $dbarray = json_decode($json, true);


        if($dbarray)
        {
            foreach($dbarray as $value)
            {
                if($value['password'] == $passwordHash && $value['login'] == $login)
                {
                    $_SESSION['login'] = $login;
                    $_SESSION['name'] = $value['name'];
                    echo "<p>Здравствуйте, " . $_SESSION['name'] . "!</p></br>
                    <p><input type='button' id='logout' value='Выйти'></p>";

                }
                else echo "<p>Неправильный логин или пароль!</p>";
               
                
                    
                    

               
            
            }

            
        
       
        

        }
    }
        
        

}


if (!isset($_SESSION['login']))
    {
        echo " 
        <form id='formlogin' name='formlogin'>
        <p>Логин<br /><input type='text' id='login' name='login' required='required' minlength='6'></p> 
        <p>Пароль<br /><input type='password' id='password' name='password' required=required minlength='6'></p> 
        <p><input type='submit' id='loginbutton' name='loginbutton' value='Вход'></p>
        </form>
       
        " ;
        echo '<a href="index.php"> На главную</a>';
    }

?>

