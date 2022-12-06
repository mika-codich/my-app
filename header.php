<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">


<!-- *********** Подключаем Favicons онлайн *********** -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- /////////// Подключаем Favicons онлайн *********** -->


<!-- *********** Подключаем JQuery 3.5.1 *********** -->
<script src="bootstrap-4.5.3-dist/js/jquery.js"></script>
<!-- /////////// Подключаем JQuery 3.5.1 *********** -->

<!-- *********** Подключаем Bootstrap 4.5.3 *********** -->
<link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">
<script src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
<!-- /////////// Подключаем Bootstrap 4.5.3 *********** -->

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
</script>

<style>
    a {
        color: black;
    }

    a:hover {
        color: black;
        text-decoration: none;
    }
</style>
