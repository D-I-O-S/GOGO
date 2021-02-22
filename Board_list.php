
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php

   
    $sql = mq("SELECT MAX(post_pid) AS max_postpid FROM Board");


    $result = mysqli_query($con, "SELECT title, nickname, date_time, post_pid, rep_count FROM Board");

    $response = array();//배열 선언

    while($row = mysqli_fetch_array($result)){
    //response["title"]=$row[0] ....이런식으로 됨.
        
    $post_pid = $row[3];
    $sql = mq("SELECT * FROM Comments WHERE post_pid ='".$post_pid."'");
    $rep_count = mysqli_num_rows($sql);

    $sql3 = mq("UPDATE Board SET rep_count = '".$rep_count."' WHERE post_pid ='".$post_pid."'");

    array_push($response, array("title"=>$row[0], "nickname"=>$row[1], "date_time"=>$row[2], "post_pid"=>$row[3], "rep_count"=>$row[4]));
    }
    //response라는 변수명으로 JSON 타입으로 $response 내용을 출력

    echo json_encode(array("response"=>$response)); 

?>

