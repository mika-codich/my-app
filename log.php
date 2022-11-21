<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/ba6a424094.js" crossorigin="anonymous"></script>
    <!-- *********** Подключаем JQuery 3.5.1 *********** -->
    <script src="bootstrap-4.5.3-dist/js/jquery.js"></script>
    <!-- /////////// Подключаем JQuery 3.5.1 *********** -->

    <!-- *********** Подключаем Bootstrap 4.5.3 *********** -->
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">
    <script src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <!-- /////////// Подключаем Bootstrap 4.5.3 *********** -->
</head>
<body>
    <div class="row">

        <div class="col-lg-2">
            <div class="text-center">
                <br>
                <a href="index.php" class="btn btn-success"><i class="fa fa-home"></i> На главную</a>
            </div>

        </div>

        <div class="col-lg-8">
            <br>
            <p class="h2 text-center">Войдите в личный кабинет</p>
            <br>
            <div id="errors"></div>

            <!-- ***** Сама форма регистрации ***** -->
            <div id="result_modal"></div>

            <form>
                <div class="form-group">
                    <label for="email_id" class="col-form-label">Email : </label>
                    <input type="email" class="form-control" id="email_id" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="password_id">Пароль :</label>
                    <div class="input-group" id="show_hide_password_modal">
                        <input type="password" class="form-control" id="password_id" placeholder="Пароль">

                        <div class="input-group-append">
                            <a class="input-group-text text-decoration-none text-dark" onclick="passwordShowHideModal('#show_hide_password_modal')">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <?php if(isset($_COOKIE['this_user'])) : ?>
                <form>
                    <button id="modal_log_out" class="btn btn-warning" onclick="logOut()">Выйти</button>
                </form>

            <?php else : ?>

                <div id="btns_in_modal">
                    <button id="modal_done" type="button" class="btn btn-primary">Войти</button>
                </div>

                <br>
                <p class="h6"> - Еще нет личного кабинета ? </p>
                <a href="reg.php" class="btn btn-primary">Зарегистрируйтесь !</a>

            <?php endif; ?>
            <div id="div_for_php"></div>

            <!-- /// ФОРМА ДЛЯ ВВОДА ДАННЫХ (ВОЙТИ) *** -->
        </div>
            <!-- ///// Сама форма регистрации ***** -->
            <div class="col-lg-2"></div>
        </div>



<br><br><br><br><br>
<script>
    // ***** ВОЙТИ *****
    $("#modal_done").bind("click", function() {

        var Email_modal = $("#email_id").val();
        var Password_modal = $("#password_id").val();

        $.ajax ({
            url: "log_action.php",
            type: "POST",
            data: ({email_modal: Email_modal, password_modal: Password_modal}),
            dataType: "html",
            beforeSend: function(){
                $("#result_modal").html("<div class='alert alert-primary'>Проверка...</div>");
            },
            success: function(data){
                if(data != ""){
                    $("#result_modal").html(data);
                }
            }
        });
    });
    // ----- ВОЙТИ -----



    // ***** Ф-ция для того, чтобы скрыть/показать пароль (в модальном меню)*****
    function passwordShowHideModal(id){
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
    // ------ Ф-ция для того, чтобы скрыть/показать пароль (в модальном меню)-------

    function logOut(){
        $.ajax ({
            url: "log_out.php",
            type: "POST",
            data: ({the_page : document.location.href}),
            dataType: "html",
            success: function(data){
                if(data != ""){
                    $("#result_modal").html(data);
                }
            }
        });
    }
</script>
</body>
</html>
