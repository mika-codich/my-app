<style>
    .animate {
        animation: animate_grow 2s 2s;
    }

    @keyframes animate_grow {
        0% {
            transform: scale3d(1, 1, 1);
        }
        50% {
            transform: scale3d(1.1, 1.1, 1.1);
        }
        100% {
            transform: scale3d(1, 1, 1);
        }
    }
</style>
<?php
$mysql = new mysqli("localhost", "root", "", "spbu_project" );
$mysql->query("SET NAMES 'utf8' ");

$email = trim($_POST['email']);
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$password = $_POST['password'];
$password2 = $_POST['password2'];

if($email == "" or $name == "" or $surname == "" or $password == "" or $password2 == ""){
    echo "<div class='alert alert-warning animate'>Заполните все поля !</div>";
} elseif(strlen($email) <= 5 or strpos($email, "@") == false){
    echo "<div class='alert alert-danger animate'>Вы ввели некорректный email. Нужно, чтобы ваш email содeржал символ '@' и был длиннее 5 символов</div>";
} elseif ($password != $password2){
    echo "<div class='alert alert-danger animate'>Пароли не совпадают</div>";
} else {
    $email_to_check1 = $mysql->query("SELECT email FROM users WHERE email = '$email'");
    $email_to_check2 = $email_to_check1->fetch_assoc()['email'];
    if($email_to_check2 != ""){
        echo "<div class='alert alert-danger animate'>Пользователь с таким email уже существует !</div>";
    } else {
        $mysql->query("INSERT INTO `users` (`email`, `password`, `name`, `surname`) VALUES ('{$email}', '{$password}', '{$name}', '{$surname}')");
        echo "<div class='alert alert-success animate'>Вы успешно зарегистрировались ! Теперь вы можете <a href='log.php' style='cursor:pointer; text-decoration: underline;'>Войти</a> в свою учетную запись</div>";
    }

}


$mysql->close();

?>
