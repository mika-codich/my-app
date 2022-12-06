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
    $mysql = new mysqli("localhost", "root", "", "big_spbu_project" );
    $mysql->query("SET NAMES 'utf8' ");

    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
?>

<?php if($email == "" or $name == "" or $surname == "" or $password == "" or $password2 == ""): ?>
    <div class='alert alert-warning animate'>Заполните все поля !</div>
<?php elseif(strlen($email) <= 5 or strpos($email, "@") === false or strpos($email, ".") === false): ?>
    <div class='alert alert-danger animate'>Вы ввели некорректный email. Нужно, чтобы ваш email содeржал символ '@' и точку. И должен быть длиннее 5 символов</div>
    <?php echo "<script>alert('". $email ."')</script>";?>
<?php elseif($password != $password2): ?>
    <div class='alert alert-danger animate'>Пароли не совпадают</div>
<?php else: ?>
    <?php
        $email_to_check1 = $mysql->query("SELECT email FROM users WHERE email = '$email'");
        $email_to_check2 = $email_to_check1->fetch_assoc()['email'];
    ?>
    <?php if($email_to_check2 != ""): ?>
        <div class='alert alert-danger animate'>Пользователь с таким email уже существует !</div>
    <?php else: ?>
        <?php
            $mysql->query("INSERT INTO `users` (`email`, `password`, `name`, `surname`) VALUES ('{$email}', '{$password}', '{$name}', '{$surname}')");
        ?>
        <div class='alert alert-success animate'>Вы успешно зарегистрировались ! Теперь вы можете <a href='login.php' style='cursor:pointer; text-decoration: underline;'>Войти</a> в свою учетную запись</div>
        <script>
            $("#user_email").val("");
            $("#user_name").val("");
            $("#user_surname").val("");
            $("#user_password").val("");
            $("#user_password_2").val("");
        </script>
    <?php endif; ?>

<?php endif; ?>

<?php $mysql->close(); ?>
