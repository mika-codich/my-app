<!doctype html>
<html lang="en">
<head>
    <?php require_once "header.php"; ?>
    <title>Main</title>
</head>
<body>
<div class="container mt-5">
    <?php require_once "navbar_menu.php"; ?>

    <?php require_once "private_cabinet_backend.php"; ?>
    <div class="alert alert-secondary">
        <div class="text-center">
            <p class="h3">Ваш личный кабинет</p>
        </div>
        <br>
        <?php if(isset($_COOKIE['email_info'])) : ?>
        <div class="row">
            <div class="col-lg-2">
                <img src="Images/man-2_icon-icons.com_55041.svg" alt="No image...(((" class="img">
                <br>
                <br>
                <p class="h6"><?=$email;?></p>
                <p class="h6"><?=$name;?></p>
                <p class="h6"><?=$surname;?></p>
                <br>


                <form>
                    <button id="log_out" class="btn btn-secondary btn-sm" onclick="logOut()">Выйти из аккаунта</button>
                </form>

            </div>
            <div class="col-lg-8">lorem</div>
            <div class="col-lg-2">
                <button class="w-100 btn btn-primary btn-sm"><i class="fa fa-book"></i> Мои книги и записи</button>
                <button class="w-100 btn btn-primary btn-sm mt-2"><i class="fa fa-heart"></i> Избранные книги</button>
                <button class="w-100 btn btn-primary btn-sm mt-2"><i class="fa fa-bookmark"></i> Недочитанные книги</button>
            </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <div class="text-center">
                        <div id="btns">
                            <a href="login.php" id="done_button" type="button" class="btn btn-success w-100">Войти</a>
                            <br>
                            <br>
                            <p class="h6"> - Еще нет личного кабинета ? </p>
                            <a href="registration.php" class="btn btn-primary w-100">Зарегистрируйтесь !</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>

        <?php endif; ?>
    </div>
</div>

<script>
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
