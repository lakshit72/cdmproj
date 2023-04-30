<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type:application/json");
    header("Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE");
    header('Access-Control-Allow-Credentials: true');
    header('Content-Type: plain/text');
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods,Access-Control-Allow-Origin, Access-Control-Allow-Credentials, Authorization, X-Requested-With");

        require 'Database.php';
        $Databse = new Database();
        $conn = $Databse->dbConnection();

        if(isset($_POST)){
            
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $sql = sprintf("SELECT * FROM user WHERE USERNAME = '%s'",$decoded["username"]);
            
            $stmt = $conn->stmt_init();
            $stmt->prepare($sql);
            $stmt->execute();
            $res = $stmt->get_result();
            $data = $res->fetch_assoc();
            
            if($data){
                
                $pass = $data['PASSWORD'];
                
                if($pass == $decoded["password"]){
                    echo json_encode([
                            "Sucess" => 1,
                            "msg" => "Login Sucessfull"
                        ]);
                    exit;
                }else{
                    echo json_encode([
                        "Sucess" => 0,
                        "msg" => "Incorrect Password"
                    ]);
                    exit;
                }
            }else{
                echo json_encode([
                    "Sucess" => 0,
                    "msg" => "No user exists with this username"
                ]);
                exit;
            }
        }
            
            ?>