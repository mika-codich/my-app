<?php
$mysql = new mysqli("localhost", "root", "", "spbu_project" );
$mysql->query("SET NAMES 'utf8' ");

$email_modal = trim($_POST['email_modal']);
$password_modal = $_POST['password_modal'];

if($email_modal == "" or $password_modal == ""){
    echo "<div class='alert alert-warning animate'>Заполните все поля !</div>";
} elseif(strlen($email_modal) <= 5 or strpos($email_modal, "@") == false){
    echo "<div class='alert alert-danger animate'>Вы ввели некорректный email. Нужно, чтобы ваш email содeржал символ '@' и был длиннее 5 символов</div>";
} else {
    $email_to_check1 = $mysql->query("SELECT email FROM users WHERE email = '$email_modal'");
    $email_to_check2 = $email_to_check1->fetch_assoc()['email'];
    if($email_to_check2 == ""){
        echo "<div class='alert alert-danger animate'>Пользователь с таким email еще нет. Проверьте правильность ввода вашего email, либо <a href='reg.php' class='font-weight-bold'>зарегистрируйтесь</a></div>";
    } else {
        $password_to_check1 = $mysql->query("SELECT password FROM users WHERE password = '$password_modal'");
        $password_to_check2 = $password_to_check1->fetch_assoc()['password'];
        if($password_modal != $password_to_check2){
            echo "<div class='alert alert-danger animate'>Вы ввели неверный пароль</div>";
        } else {
            echo "<div class='alert alert-success animate'>Вы успешно вошли в свою учетную запись</div>";
            echo "<script>
                       $('#email_id').val('');
                       $('#password_id').val('');
                  </script>";

            $mysql->query("SELECT password FROM users WHERE password = '$password_modal'");

            setcookie("this_user", $email_modal);

            echo "<script>
                      $('#email_id').val('');
                      $('#password_id').val('');
                      
                      var btn_to_log_out = '<form>' +
                                               '<button id=\"modal_log_out\" class=\"btn btn-warning\" onclick=\"logOut()\">' +
                                                   'Выйти' +
                                               '</button>' +
                                           '</form>';
                      
                      var modal_btn_in_navbar = '<div id=\"modal_btn_in_navbar\" class=\"text-dark btn_with_animation_1_05 mr-5\" data-toggle=\"modal\" data-target=\"#Log_in\">' + 
                                                    '".$email_modal." ' + 
                                                    '<i class=\"fa-regular fa-user\" style=\"font-weight:bold;\"></i>' +
                                                '</div>';

                      $('#the_place_for_modal_btn_in_navbar').html(modal_btn_in_navbar);
                      $('#btns_in_modal').html(btn_to_log_out);
                  </script>";
        }
    }
}

$mysql->close();

?>
<script>
    // alert("Hello There !"); // Оно работает !
</script>
