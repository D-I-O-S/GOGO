
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php";

    // post_pid를 받아온다.
    $post_pid = $_POST['post_pid'];

    $comments_pid;
    $recomments_pid;
    $icon;
    // 댓글의 정보
    $nickname_co;
    $comments;
    $date_time_co;
   
   $response = array();


    $sql2 = mq("SELECT comments_pid, post_pid, user_pid, nickname, comments, date_time FROM Comments");

    while($result = mysqli_fetch_array($sql2)){
  
        $nickname = $result["nickname"];
        $sql = mq("SELECT icon FROM User_Info WHERE nickname = '".$nickname."'");
        while($row = mysqli_fetch_array($sql)){
            $icon = $row["icon"];
        }
        array_push($response, array("comments_pid"=>$result[0], "post_pid"=>$result[1], "user_pid"=>$result[2],"nickname"=>$result[3], "comments"=>$result[4], "date_time"=>$result[5], "icon"=>$icon));
           
    }
    echo json_encode(array("response"=>$response));
?>


    