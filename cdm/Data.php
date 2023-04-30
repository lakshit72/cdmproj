<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header("Content-Type: application/json; charset=UTF-8");

    require 'Database.php';
    $Database = new Database();
    $conn = $Database->dbConnection();

    if(isset($_GET)){

        $sql = "SELECT * FROM img";
        $result = $conn->query($sql);
        $names = array();
        if($conn->num_rows){

            while($row = mysqli_fetch_array($result))
            {               
                $loc[] = $row['IMGLOC'];
            }
            
            echo json_encode([
                "sucess" => 1,
                "data" => $loc
            ]);
            exit;
        }else{
            echo json_encode([
                "sucess" => 0,
                "data" => "No entries"
            ]);
            exit;
        }
        exit;
    }
?>