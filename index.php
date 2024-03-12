<?php
    $ref = "./";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="CollectiByte"/>
        <meta name="author" content="korhlibri"/>
        <title>CollectiByte</title>

        <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@3.4.21/dist/vue.global.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

        <link href="<?php echo $ref?>assets/css/style.css" rel="stylesheet">
    </head>
    <body class="bg-dark d-flex flex-column vh-100">
        <?php
            require_once("header.php");
        ?>
        
        <?php
            if ($_REQUEST["view"] == "") {
                echo '<script type="text/javascript">window.location.replace("./home");</script>';
            }
            else if (file_exists("$ref/modules/".$_REQUEST["view"].".php")) {
                include_once "$ref/modules/".$_REQUEST["view"].".php";
            }
            else {
                echo '<script type="text/javascript">window.location.replace("./404");</script>';
            }
        ?>

        <?php
            require_once("footer.php");
        ?>
    </body>
</html>