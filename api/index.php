<?php
    $entity = "/collectibyte";

    error_reporting(0);

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
        $returned;

        $filter_category = $_REQUEST["category"];
        $product = $_REQUEST["product"];

        if($filter_category){
            $returned = $database->select(
                "articles",
                [
                    "[><]article_categories" => ["id_category" => "id"]
                ],
                "*",
                [
                    "article_categories.category" => $filter_category
                ]
            );
        }else{
            $returned = $database->select(
                "articles",
                [
                    "[><]article_categories" => ["id_category" => "id"]
                ],
                "*"
            );
        }

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

    $router->map("GET", $entity."/api/products", function() {
        global $database;
        $data;
        $returned;

        $filter_category = $_REQUEST["category"];
        
        if($filter_category != null){
            $returned = $database->select(
                "products",
                [
                    "[><]product_categories" => ["id_category" => "id"]
                ],
                "*",
                [
                    "product_categories.category" => $filter_category
                ]
            );
        }else{
            $returned = $database->select(
                "products",
                [
                    "[><]product_categories" => ["id_category" => "id"]
                ],
                "*"
            );
        }

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
    }, "get_all_products");

    $router->map("GET", $entity."/api/article/categories", function() {
        global $database;
        $data;

        $returned = $database->select(
            "article_categories",
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
    }, "get_all_article_categories");

    $router->map("GET", $entity."/api/product/categories", function() {
        global $database;
        $data;

        $returned = $database->select(
            "product_categories",
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
    }, "get_all_product_categories");

    $match = $router->match();

    // call closure or throw 404 status
    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] );
    } else {
        // no route was matched
        http_response_code(404);
    }
?>