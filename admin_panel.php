<!doctype html>
<html lang="en">
<head>
    <?php require_once "header.php"; ?>
    <title>Main</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-2">
            <a href="index.php" class="btn btn-primary btn-sm w-100"><i class="fa fa-home"></i> На сайт</a>
            <br><br>
            <div class="list-group" id="list-tab">
                <a class="list-group-item list-group-item-action small p-3" id="list-home-list" data-toggle="list" href="#add_the_tale_list"><i class="fa fa-plus"></i> Добавить сказку</a>
                <a class="list-group-item list-group-item-action small p-3" id="list-profile-list" data-toggle="list" href="#all_tales_list"><i class="fa fa-list" aria-hidden="true"></i>
                    Все сказки
                </a>
                <a class="list-group-item list-group-item-action small p-3" id="list-messages-list" data-toggle="list" href="#list3"><i class="fa fa-comments"></i> Жалобы или пожелания</a>
            </div>
        </div>

        <div class="col-lg-8 border rounded">


            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="description_list" aria-labelledby="list-profile-list">
                    <p class="display-4 text-center">Админ панель</p>
                </div>
                <div class="tab-pane fade" id="add_the_tale_list" aria-labelledby="list-home-list">
                    <p class="display-4 text-center">Добавляем сказку</p>
                    <br>
                    <div id="result"></div>
                    <label for="name_of_tale">
                        <i class="fa fa-font" aria-hidden="true"></i><i class="fa fa-bold" aria-hidden="true"></i>
                        Название сказки:
                    </label>
                    <br>
                    <input type="text" id="name_of_tale">

                    <div id="number_of_slides_input">
                        <br>
                        <br>
                        <label for="number_of_slides">
                            <i class="fa fa-sort-numeric-desc" aria-hidden="true"></i>
                            <i id="label_quantity_of_slides">Количество слайдов</i>
                            <i class="font-weight-bold text-danger" data-toggle="tooltip" data-placement="right" title="Количество слайдов должно быть не меньше 1" style="cursor: pointer">*</i>
                        </label>
                        <br>
                        <input type="number" step="1" value="1" min="1" id="number_of_slides">
                        <br>
                        <button class="mt-1 btn btn-secondary btn-sm" id="ok_button" onclick="okButton()"><i class="fa fa-check" aria-hidden="true"></i> OK</button>
                        <br>
                        <br>
                    </div>

                    <div id="area_for_slides"></div>

                </div>
                <div class="tab-pane fade" id="all_tales_list" aria-labelledby="list-profile-list">
                    <p class="display-4 text-center">Все сказки</p>
                    <br>
                    <button class="btn btn-success btn-sm" onclick="reloadAndShow();">
                        <i class="fa fa-repeat" aria-hidden="true"></i> Обновить страницу и отобразить все сказки
                    </button>
                    <br>
                    <br>
                    <div id="content_tales">
                        <div class="row">
                            <div class="col-lg-4 mb-4">lorem</div>
                            <div class="col-lg-4 mb-4">lorem</div>
                            <div class="col-lg-4 mb-4">lorem</div>
                            <div class="col-lg-4 mb-4">lorem</div>
                            <div class="col-lg-4 mb-4">lorem</div>
                            <div class="col-lg-4 mb-4">lorem</div>
                        </div>
                    </div>



                </div>
                <div class="tab-pane fade" id="list3" aria-labelledby="list-messages-list">lorem 3</div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="alert alert-secondary">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At corporis deleniti eligendi eveniet facere facilis, fugiat harum magni nisi nobis numquam optio, perspiciatis, quas saepe sequi sint temporibus ut voluptates!
            </div>
        </div>
    </div>
    <br><br>

</div>

<script>
    // Ф-ция, которая меняет значок треугольничка у категорий
    function passwordShowHideModal(id){
        if($(id).attr("class") == "fa fa-chevron-down"){
            $(id).removeClass( "fa-chevron-down" );
            $(id).addClass( "fa-chevron-up");
        } else if($(id).attr("class") == "fa fa-chevron-up"){
            $(id).removeClass( "fa-chevron-up" );
            $(id).addClass( "fa-chevron-down");
        }
    }

    // ***** Добавить сказку *****
    function addTheTale() {

        var Name_of_tale = $("#name_of_tale").val();

        var i = 0;
        var images_array = [];
        var texts_array = [];

        $("[id*='tale_image']").each(function() {
            images_array.push($(this).val());
            i++;
        });

        i = 0;
        $("[id*='tale_text']").each(function() {
            texts_array.push($(this).val());
            i++;
        });


        $.ajax ({
            url: "add_the_tale_action_page.php",
            type: "POST",
            data: ({'name' : Name_of_tale, 'images_array[]': images_array, 'texts_array[]': texts_array}),
            dataType: "html",
            beforeSend: function(){
                            $("#result").html("<div class='alert alert-primary'>Проверка...</div>");
                            up();
                        },
            success: function(data){
                        if(data != ""){
                            $("#result").html(data);
                            up();
                        }
                     }
        });
    }
    // ----- Добавить сказку -----



    // ***** Добавить слайды *****
    var button = '<div id="add_the_tale"><button class="btn btn-success" onclick="addTheTale()">Добавить сказку</button><br><br><br><br></div>';

    var slides_counter = 0;

    function okButton() {
        var number = String($("#number_of_slides").val());
        var add_slides_button = $("#number_of_slides_input").clone();
        $("#number_of_slides_input").remove();
        $("#add_the_tale").remove();

        for(var i = 0; i < number; i++){
            slides_counter++;
            // if(slides_counter > 1){
            //     $("#area_for_slides").append('<hr id="hr_' + (slides_counter-1) + '">');
            // } else{
            //     $("#area_for_slides").append('<br id="br_' + slides_counter + '">');
            // }

            $("#area_for_slides").append(
                $('<div id="slide_number_' + slides_counter +'" class="border rounded p-3 mt-4">')
                    .append('<div class="row">' +
                                '<div class="col-lg-8">' +
                                    '<label for="tale_image"> <i class="text-warning fa fa-file-image-o" aria-hidden="true"></i> Картинка для слайда <span id="label_img_'+slides_counter+'">' + slides_counter + '</span>:' +
                                    '</label>' +
                                '</div>' +
                                '<div class="col-lg-4"><div class="text-right">' +
                                    '<button class="btn btn-secondary btn-sm" onclick="deleteSlide('+ slides_counter +')"><i class="fa fa-times" aria-hidden="true"></i></button>' +
                                '</div></div>' +
                            '</div>')

                    .append('<br><input class="btn btn-warning" id="tale_image" type="file"><br><br>')

                    .append('<label for="the_tale"><i class="fa fa-file-text-o" aria-hidden="true"></i> Текст слайда <span id="label_text_'+slides_counter+'">' + slides_counter + '</span>:</label><br>')

                    .append('<textarea id="tale_text" cols="80" rows="5"></textarea>')
                );
        }

        $('#area_for_slides').append(add_slides_button);
        $("#label_quantity_of_slides").html("Добавить еще слайды:");

        $('#area_for_slides').append(button);
    }
    // ----- Добавить слайды -----


    // ***** Кнопочка удаления слайда *****
    function deleteSlide(slide_number){
        $("#slide_number_" + slide_number).remove();
        // $("#hr_" + slide_number ).remove();

        var img_slides_counter = $("[id*='label_img_']");
        var text_slides_counter = $("[id*='label_text_']");

        // if(img_slides_counter.length == 0) $("#br_1").remove();
        // if((img_slides_counter.length+1) == slide_number) $("#hr_" + (slide_number-1) ).remove();


        for(var i = 0; i < img_slides_counter.length; i++){
            img_slides_counter[i].innerHTML = (i+1);
            text_slides_counter[i].innerHTML = (i+1);
        }

        // var all_slides = $("[id*='slide_number_']");
        // i = 0;
        // $(all_slides).each(function() {
        //     $(this).attr('id', ('slide_number_' + (i+1)));
        //     i++;
        // });

        slides_counter--;
    }
    // ----- Кнопочка удаления слайда -----



    // ***** Ф-ция для плавного подъема страницы вверх *****
    function up() {
        var t;
        var top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
        if(top > 0) {
            window.scrollBy(0,-16);
            t = setTimeout('up()',0.01);
        } else clearTimeout(t);
        return false;
    }
    // ----- Ф-ция для плавного подъема страницы вверх -------


    function reloadAndShow(){
        location.reload();
        $("#description_list").removeClass('show active');
        $("#all_tales_list").addClass('show active');
        return false;
    }

</script>


</body>
</html>
