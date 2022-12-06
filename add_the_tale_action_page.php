<?php
$mysql = new mysqli("localhost", "root", "", "big_spbu_project" );
$mysql->query("SET NAMES 'utf8' ");

$name = trim($_POST['name']);
?>
<?php if($name == ""): ?>
    <div class='alert alert-warning animate'>Введите название сказки</div>
<?php elseif(strlen($name) > 250): ?>
    <div class='alert alert-danger animate'>
        Вы ввели слишком длинное название сказки! Пожалуйста, сократите его
    </div>
<?php else: ?>
    <?php
        $the_same_name = $mysql->query("SELECT `name_of_tale` FROM  `tales` WHERE `name_of_tale` = '$name'")->fetch_assoc()['name_of_tale'];
    ?>
    <?php if($the_same_name == $name):?>
        <div class='alert alert-warning animate'>
            Сказка с таким же названием уже существует
        </div>
    <?php else: ?>
        <?php $mysql->query("INSERT INTO `tales` (`name_of_tale`) VALUES('{$name}')"); ?>
        <?php
            $id = $mysql->query("SELECT `id` FROM  `tales` WHERE `name_of_tale` = '$name'");
            echo $id->fetch_assoc()['id'];

            for($i = 1; $i <= count($_POST['images_array']); $i++){
                if($_POST['images_array'][$i-1] != ""){
                    $mysql->query("INSERT INTO `images_for_tales` (`id_of_tale`, `path`) VALUES ('{$i}', '{$_POST['images_array'][$i-1]}')");
                }

            }
            for($i = 1; $i <= count($_POST['texts_array']); $i++) {
                if ($_POST['texts_array'][$i - 1] != "") {
                    $mysql->query("INSERT INTO `texts_for_tales` (`id_of_tale`, `text`) VALUES ('{$i}', '{$_POST['texts_array'][$i-1]}')");
                }
            }
        ?>
    <?php endif; ?>



    <?php if($email_to_check2 == ""): ?>
        <div class='alert alert-danger animate'>
            Пользователя с таким email еще нет. Проверьте правильность ввода вашего email, либо
            <a href='registration.php' class='font-weight-bold'>зарегистрируйтесь</a>
        </div>
    <?php else: ?>
        <?php
            $password_to_check1 = $mysql->query("SELECT password FROM users WHERE password = '$password'");
            $password_to_check2 = $password_to_check1->fetch_assoc()['password'];
        ?>

        <?php if($password != $password_to_check2): ?>
            <div class='alert alert-danger animate'>Вы ввели неверный пароль</div>
        <?php else: ?>
            <?php if($password == "admin" and $email == "admin@admin"): ?>
                <div class='alert alert-primary animate'><a href="admin_panel.php"><i class="fa fa-cog"></i> Админ панель</a></div>
            <?php else: ?>
                <div class='alert alert-success animate'>Вы успешно вошли в свою учетную запись</div>
                <script>
                    $('#email_id').val('');
                    $('#password_id').val('');
                </script>
                <?php
                $mysql->query("SELECT password FROM users WHERE password = '$password'");

                $name = $mysql->query("SELECT name FROM users WHERE email = '$email'")->fetch_assoc()['name'];
                $surname = $mysql->query("SELECT surname FROM users WHERE email = '$email'")->fetch_assoc()['surname'];

                setcookie("name_info", $name);
                setcookie("surname_info", $surname);
                setcookie("email_info", $email);

                echo "<script> var user_in_navbar = '". $name . " " . $surname ."'</script>";
                ?>
                <script>
                    $('#email_id').val('');
                    $('#password_id').val('');
                    var btn_to_log_out = '<form>' +
                        '<button id="log_out" class="btn" style="background-color: #fff3cd; color: #856404;" onclick="logOut()">' +
                        'Выйти из аккаунта' +
                        '</button>' +
                        '</form>';

                    var name_surname_in_navbar = '<i class="fa fa-user"></i> ' + user_in_navbar;
                    $('#user_in_navbar').attr('href', 'private_cabinet.php');

                    $('#user_in_navbar').html(name_surname_in_navbar);
                    $('#btns').html(btn_to_log_out);
                </script>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<?php $mysql->close(); ?>

