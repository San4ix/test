<?php
session_start();

if (isset ($_SESSION['login']) && isset ($_SESSION['name'])){
 header('Location: index.php');
exit;
}

   if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['name']) && isset($_POST['email']))
   {
        $login = stripslashes($_POST['login']);
        $login = htmlspecialchars($_POST['login']);
        $login = trim($_POST['login']);
        $password = stripslashes($_POST['password']);
        $password = htmlspecialchars($_POST['password']);
        $password = trim($_POST['password']);
        $name = stripslashes($_POST['name']);
        $name = htmlspecialchars($_POST['name']);
        $name = trim($_POST['name']);
        $email = stripslashes($_POST['email']);
        $email = htmlspecialchars($_POST['email']);
        $email = trim($_POST['email']);

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
                    echo "<h1>Такой пользователь или пароль уже существует!</h1></br>";
                    echo'<a href="reg.php"> Вернуться к регистрации</a></br>';
                    echo'<a href="index.php"> На главную</a>';
                    exit;

                };
                
           }

            }
            
           
           $dbarray[] = array('login' => $login, 'password' => $password, 'name' => $name, 'email' => $email,);
           
           
           file_put_contents ('db.json', json_encode($dbarray,JSON_FORCE_OBJECT));
           echo"<h1>Новый пользователь успешно зарегестрирован!</h1></br>";
           echo'<a href="login.php"> Войти</a></br>';
           echo'<a href="index.php"> На главную</a>';
        }
    }


        
   else
   {
    echo "<form id='reg' action='reg.php' method='post'> 
    <h1>Регистрация</h1>  
    <p>Логин (минимум 6 символов)<br />
        <input type='text' name='login' required='required' minlength='6'></p> 

    <p>Пароль(минимум 6 символов , обязательно должен состоять из цифр и букв)<br />
        <input type='password' name='password' required='required' minlength='6'></p> 

    <p>Подтверждение пароля<br />
        <input type='password' name='confirm_password' required='required'></p> 

    <p>Имя пользователя<br />
        <input type='text' name='name' required='required'></p>

    <p>Адрес email<br /><input type='email' name='email' required='required'></p> 
    <p><input type='submit' name='submit' value='Войти'> <br></p>
    </form>" ;


    echo '<a href="index.php"> На главную</a>';
   }
?>