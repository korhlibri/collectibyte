<?php
    $entity = "/collectibyte";

    require_once '../vendor/autoload.php';
    $router = new AltoRouter();
    // use Medoo\Medoo;

    $database = new Medoo\Medoo([
        // [required]
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'collectibyte',
        'username' => 'root',
        'password' => '',
    
        // [optional]
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        'port' => 3306,
    ]);

    $router->map("GET", $entity."/api/articles", function() {
        global $database;
        $data;

        $returned = $database->select(
            "articles",
            "*"
        );

        $error_info = $database->error;
        if($error_info){
            http_response_code(500);
            $data["status"] = "error";
            $data["message"] = "There was a server error";
            $data["data"] = $error_info;
        }
        else{
            http_response_code(200);
            $data["status"] = "success";
            $data["message"] = "The data was gathered successfully";
            $data["data"] = $returned;
        }
        print_r(json_encode($data));
    }, "get_all_articles");

    $match = $router->match();

    // call closure or throw 404 status
    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] );
    } else {
        // no route was matched
        http_response_code(404);
    }
?>