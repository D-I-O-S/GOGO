<!--db Comments에 댓글 저장하기-->
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>
<?php

    $post_pid = $_POST['post_pid'];
    $user_pid = $_POST['user_pid'];
    $comments = $_POST['comments'];
    $date_time = date("Y/m/d H:i:s", time());
    $nickname;
    $comments_pid;
    $icon;
//    $nickname = $_POST['nickname'];

    // nickname가져오지 못하면 nickname 가져오기
    $sql = mq("SELECT nickname FROM User_Info WHERE user_pid = '".$user_pid."'");
    while($row = mysqli_fetch_array($sql)){
        $nickname = $row["nickname"];
    }
    

    // auto_increment 초기화
    $mqq = mq("alter table Comments auto_increment =1");


    $stmt = mq("INSERT INTO Comments(post_pid,user_pid,nickname,comments,date_time) values('".$post_pid."','".$user_pid."','".$nickname."','".$comments."','".$date_time."')");
    
    $sql2 = mq("SELECT comments_pid FROM Comments WHERE date_time = '".$date_time."'");
    while($result = mysqli_fetch_array($sql2)){
        $comments_pid = $result["comments_pid"];
    }
    
//    아이콘 불러오기
    $sql3 = mq("SELECT icon FROM User_Info WHERE user_pid = '".$user_pid."'");
    while($row = mysqli_fetch_array($sql3)){
        $icon = $row["icon"];
    }

    $response = array();
    $response["success"] = true;
    $response["comments_pid"] = $comments_pid;
    $response["icon"] = $icon;

    echo json_encode($response);

?>