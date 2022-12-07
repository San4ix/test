<script
			  src="https://code.jquery.com/jquery-3.6.1.js"
			  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
			  crossorigin="anonymous"></script>
<script src="ajax.js"></script>
<noscript><span>У Вас отключён JavaScript...</span></noscript>

<?php
session_start();

if (isset ($_SESSION['login']) && isset ($_SESSION['name'])){
 header('Location: index.php');
exit;
}

   if (isset($_POST['jsonreg']))
   {
        $cartreg = json_decode( $_POST['jsonreg'] );
        $login = $cartreg->login;
        $password = $cartreg->password;
        $name = $cartreg->name;
        $email = $cartreg->email;
        $login = stripslashes($login);
        $login = htmlspecialchars($login);
        $login = trim($login);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
        $password = trim($password);
        $salt = "iu4gr7ku7n2ooms";
        $passwordHash = md5($salt.$password);
        $name = stripslashes($name);
        $name = htmlspecialchars($name);
        $name = trim($name);
        $email = stripslashes($email);
        $email = htmlspecialchars($email);
        $email = trim($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    echo "<h1>Проверьте правильность заполнения электронной почты!</h1></br>";
                    echo'<a href="reg.php"> Вернуться к регистрации</a></br>';
                    echo'<a href="index.php"> На главную</a>';
                    exit;

                }
        
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
                        echo "<h1>Такой пользователь или пароль уже существует!</h1></br>";
                        echo'<a href="reg.php"> Вернуться к регистрации</a></br>';
                        echo'<a href="index.php"> На главную</a>';
                        exit;

                    };
                    if($value['email'] == $email)
                    {
                        echo "<h1>Такой Электронный адрес уже существует!</h1></br>";
                        echo'<a href="reg.php"> Вернуться к регистрации</a></br>';
                        echo'<a href="index.php"> На главную</a>';
                        exit;

                    };
                
                }

            }
            
           
           $dbarray[] = array('login' => $login, 'password' => $passwordHash, 'name' => $name, 'email' => $email,);
           
           
           file_put_contents ('db.json', json_encode($dbarray,JSON_FORCE_OBJECT));
           echo"<h1>Новый пользователь успешно зарегестрирован!</h1></br>";
           echo'<a href="login.php"> Войти</a></br>';
           echo'<a href="index.php"> На главную</a>';
        }
    }


        
   else
   {
    echo "<form id='formreg' name ='formreg'> 
    <h1>Регистрация</h1>  
    <p>Логин (токлько латинские буквы, или цифры, минимум 6 символов, без пробелов)<br />
    <input type='text' name='login' id='login' required='required' pattern='(?=.*[^\s])(?=.*[A-Za-z0-9]).{6,}'></p> 

    <p>Пароль(минимум 6 символов , обязательно должен состоять из цифр и букв, без пробелов)<br />
    <input type='password' name='password' id='password' required='required'  pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\s]).{6,}'></p> 

    <p>Подтверждение пароля<br />
    <input type='password' name='confirm_password' id='confirm_password' required='required'  pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\s]).{6,}'></p> 

    <p>Имя пользователя (на русском языке)<br />
    <input type='text' name='name' id='name' required='required' pattern='(?=.*^[А-Яа-яЁё]+$).{2,}'></p>

    <p>Адрес email<br /><input type='email' name='email' id='email' required='required' pattern='([a-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})'></p> 
    <p><input type='submit' name='regbutton' id='regbutton' value='Войти'> <br></p>
    </form>" ;


    echo '<a href="index.php"> На главную</a>';
   }
?>