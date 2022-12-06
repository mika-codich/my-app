<!doctype html>
<html lang="en">
<head>
    <?php require_once "header.php"; ?>
    <title>LogIn</title>
</head>
<body>
<div class="container mt-5">
    <?php require_once "navbar_menu.php"; ?>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <br>
        <p class="h2 text-center">Войдите в личный кабинет</p>
        <br>
        <div id="errors"></div>

        <!-- ***** Сама форма регистрации ***** -->
        <div id="result"></div>

        <form>
            <div class="form-group">
                <label for="email_id" class="col-form-label">Email : </label>
                <input type="email" class="form-control" id="email_id" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="password_id">Пароль :</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control" id="password_id" placeholder="Пароль">

                    <div class="input-group-append">
                        <a class="input-group-text text-decoration-none text-dark" onclick="passwordShowHide('#show_hide_password')">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <?php if(isset($_COOKIE['name_info'])) : ?>
            <form>
                <button id="log_out" class="btn" style="background-color: #fff3cd; color: #856404;" onclick="logOut()">Выйти из аккаунта</button>
            </form>

        <?php else : ?>

            <div id="btns">
                <button id="done_button" type="button" class="btn btn-primary">Войти</button>
                <br>
                <br>
                <p class="h6"> - Еще нет личного кабинета ? </p>
                <a href="registration.php" class="btn btn-primary">Зарегистрируйтесь !</a>
            </div>

        <?php endif; ?>
        <div id="div_for_php"></div>

        <!-- /// ФОРМА ДЛЯ ВВОДА ДАННЫХ (ВОЙТИ) *** -->
    </div>
    <!-- ///// Сама форма регистрации ***** -->
    <div class="col-lg-2"></div>
</div>
</div>



<br><br><br><br><br>
<script>
    // ***** ВОЙТИ *****
    $("#done_button").bind("click", function() {

        var Email = $("#email_id").val();
        var Password = $("#password_id").val();

        $.ajax ({
            url: "login_action_page.php",
            type: "POST",
            data: ({email: Email, password: Password, this_page : document.location.href}),
            dataType: "html",
            beforeSend: function(){
                $("#result").html("<div class='alert alert-primary'>Проверка...</div>");
            },
            success: function(data){
                if(data != ""){
                    $("#result").html(data);
                }
            }
        });

    });
    // ----- ВОЙТИ -----



    // ***** Ф-ция для того, чтобы скрыть/показать пароль*****
    function passwordShowHide(id){
        if($(id + ' input').attr("type") == "text"){
            $(id + ' input').attr('type', 'password');
            $(id + ' i').addClass( "fa-eye-slash");
            $(id + ' i').removeClass( "fa-eye" );
        } else if($(id + ' input').attr("type") == "password"){
            $(id + ' input').attr('type', 'text');
            $(id + ' i').removeClass( "fa-eye-slash" );
            $(id + ' i').addClass( "fa-eye" );
        }
    }
    // ------ Ф-ция для того, чтобы скрыть/показать пароль-------

    function logOut(){
        $.ajax ({
            url: "log_out_action_page.php",
            type: "POST",
            data: ({the_page : document.location.href}),
            dataType: "html",
            success: function(data){
                if(data != ""){
                    $("#result").html(data);
                }
            }
        });
    }
</script>

</body>
</html>
