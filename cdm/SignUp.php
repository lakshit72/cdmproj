<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require 'Database.php';
    $Databse = new Database();
    $conn = $Databse->dbConnection();

    if(isset($_POST)){
        $data = json_decode(file_get_contents("php://input"),true);
        
        $sql = sprintf("INSERT INTO user VALUES('%s','%s','%s')",$data['name'],$data['username'],$data['password']);

        $stmt = $conn->stmt_init();
        $stmt->prepare($sql);

        if($stmt->execute()){
            echo json_encode([
                "sucess" => 1,
                "msg" => "User successfully registered"
            ]);
        }else{
            echo json_encode([
                "sucess" => 0,
                "msg" => "error retry"
            ]);
        }
    }

?>