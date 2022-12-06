<!doctype html>
<html lang="en">
<head>
    <?php require_once "header.php"; ?>
    <title>Main</title>
</head>
<body>
<div class="container mt-5">
    <?php require_once "navbar_menu.php"; ?>

    <div class="row alert alert-secondary">

    </div>
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
</script>


</body>
</html>
