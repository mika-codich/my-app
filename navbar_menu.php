<div class="row alert alert-secondary">

    <div class="col-lg-4">
        <a href="index.php" class="h5"><i class="fa fa-home" aria-hidden="true"></i> Главная</a>
    </div>

    <div class="col-lg-4">
        <a onclick="passwordShowHideModal('#fa')" class="h5" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;"><i id="fa" class="fa fa-chevron-down"></i> Категории</a>

    </div>
    <div class="col-lg-4">
        <div class="text-right">
            <?php if(isset($_COOKIE['email_info'])) : ?>
               <?="<a class='h5' href='private_cabinet.php'><i class='fa fa-user'></i> ".$_COOKIE['name_info']. " " . $_COOKIE['surname_info']."</a>";?>
            <?php else: ?>
                <a class="h5" href="login.php" id="user_in_navbar" ><i class="fa fa-sign-in"></i> Войти</a>
            <?php endif; ?>
        </div>

    </div>
    <div class="collapse w-100" id="collapseExample">
        <br>
        <div class="row p-3">
            <div class="col-lg-4">
                <div class="border border-dark rounded p-3">
                    <a href="" class="h6"><i class="fa fa-circle"></i> Детям</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="border border-dark rounded p-3">
                    <a href="" class="h6"><i class="fa fa-circle"></i> Подросткам</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="border border-dark rounded p-3">
                    <a href="" class="h6"><i class="fa fa-circle"></i> Взрослым 18+</a>
                </div>
            </div>
        </div>

    </div>
</div>
