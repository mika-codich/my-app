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

        <div class="col-lg-8 align-content-center">
            <br>
            <p class="h2 text-center">Зарегистрируйтесь</p>
            <br>
            <div id="errors"></div>

            <!-- ***** Сама форма регистрации ***** -->
            <form>

                <!-- ** Email **-->
                <div class="form-group">
                    <label for="user_email">Еmail адрес :</label>
                    <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp" placeholder="Ваш email">
                </div>
                <!-- // Email **-->
                <br>
                <!-- ** Имя и фамилия ** -->
                <div class="form-group">
                    <label for="user_name">Ваше имя :</label>
                    <input type="email" class="form-control" id="user_name" placeholder="Ваш имя">
                </div>
                <div class="form-group">
                    <label for="user_surname">Ваша фамилия :</label>
                    <input type="email" class="form-control" id="user_surname" placeholder="Ваша фамилия">
                </div>
                <!-- // Имя и фамилия ** -->
                <br>
                <!-- ** Пароли **-->
                <div class="form-group">
                    <label for="user_password">Пароль :</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control" id="user_password" placeholder="Пароль">

                        <div class="input-group-append">
                            <a class="input-group-text text-decoration-none text-dark" onclick="passwordShowHide('#show_hide_password')">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_password_2">Повторите пароль :</label>
                    <div class="input-group" id="show_hide_password_2">
                        <input type="password" class="form-control" id="user_password_2" placeholder="Повторите пароль">

                        <div class="input-group-append">
                            <a class="input-group-text text-decoration-none text-dark" onclick="passwordShowHide('#show_hide_password_2')">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <button type="button" id="done" class="btn btn-primary btn_with_animation_1_05">Готово</button>
                <div id="inform"></div>
            </form>
            <!-- ///// Сама форма регистрации ***** -->
        </div>

    </div>


<br><br><br><br><br>

<!--Пропишем все проверки для нашей формы на JS ниже-->
<script>
    function functionBeforeSend(){
        $("#errors").html("<div class='alert alert-primary'>Ожидание данных ...</div>");
        up();
    }

    $("#done").bind("click", function() {

        var Email = $("#user_email").val();
        var Name = $("#user_name").val();
        var Surname = $("#user_surname").val();
        var Password = $("#user_password").val();
        var Password2 = $("#user_password_2").val();

        $.ajax ({
            url: "action_page.php",
            type: "POST",
            data: ({email: Email, name: Name, surname: Surname, password: Password, password2: Password2}),
            dataType: "html",
            beforeSend: functionBeforeSend,
            success: function(data1){
                if(data1 != ""){
                    $("#errors").html(data1);
                    up();
                }
            }
        });
    });


    // ***** Ф-ция для плавного подъема страницы вверх *****
    function up() {
        var t;
        var top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
        if(top > 0) {
            window.scrollBy(0,-4);
            t = setTimeout('up()',0.5);
        } else clearTimeout(t);
        return false;
    }
    // ----- Ф-ция для плавного подъема страницы вверх -------


    // ***** Ф-ция для того, чтобы скрыть/показать пароль *****
    function passwordShowHide(id){
        if($(id + ' input').attr("type") == "text"){
            $(id + ' input').attr('type', 'password');
            $(id + ' i').addClass( "fa-eye-slash");
            $(id + ' i').removeClass( "fa-eye" );
        }else if($(id + ' input').attr("type") == "password"){
            $(id + ' input').attr('type', 'text');
            $(id + ' i').removeClass( "fa-eye-slash" );
            $(id + ' i').addClass( "fa-eye" );
        }
    }
    // ------ Ф-ция для того, чтобы скрыть/показать пароль -------

</script>
</body>
</html>
