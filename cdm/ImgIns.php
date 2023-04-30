<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require 'Database.php';
    $Database = new Database();
    $conn = $Database->dbConnection();

    if(isset($_POST)){

        $fileTmp = $_FILES['file']['tmp_name'];
        $filenew = $_FILES['file']['name'];
        $finaldes = '../images/'.$filenew;

        $sql = sprintf("INSERT INTO img(IMGLOC) VALUES('%s')",$finaldes);

        $stmt = $conn->stmt_init();
        $stmt->prepare($sql);

        move_uploaded_file($fileTmp,'../images/'.$filenew); 
        if($stmt->execute()){
            echo json_encode([
                "sucess"=>1,
                "msg"=>"upload Successfull"
            ]);
        }
    }
    
    ?>