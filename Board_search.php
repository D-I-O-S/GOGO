<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php";

    // 서치할 단어 불러온다.
    $search = $_POST["search"];

    $sql = mq("SELECT * FROM Board WHERE INSTR(LOWER(title),LOWER('".$search."')) OR INSTR(LOWER(contents),LOWER('".$search."'))");
    
    $response = array();
    $response["success"] = false;

    while($row = mysqli_fetch_array($sql)){
      
        $response["success"] = true;
        array_push($response, array("title"=>$row[3], "nickname"=>$row[2], "date_time"=>$row[5], "post_pid"=>$row[0], "rep_count"=>$row[6]));
    }

    echo json_encode(array("response"=>$response));

?>