<!--board_write.php 게시판 글 저장하기 -->
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php

    $user_pid = $_POST["user_pid"];
    $post_pid;
    $nickname;
    $title = $_POST["title"];
    $contents = $_POST["contents"];
    $date_time = date('Y/m/d H:i:s', time());

    $rep_count = 0;
    $result = mq("SELECT nickname FROM User_Info WHERE user_pid = '".$user_pid."'");
    while($row = mysqli_fetch_array($result)){
        $nickname = $row["nickname"];
    }
    
    // auto_increment 초기화
    $mqq = mq("alter table Board auto_increment =1");

    $stmt = mysqli_prepare($con, "INSERT INTO Board VALUES (?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "iissssi", $post_pid, $user_pid, $nickname, $title, $contents, $date_time, $rep_count);
    mysqli_stmt_execute($stmt); 

 

    $response = array();
    $response["success"] = true;
    $response["post_pid"] = $post_pid;

    echo json_encode($response);


   
?>



