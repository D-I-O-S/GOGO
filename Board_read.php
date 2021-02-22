<!--board_read.php 데이터 베이스에 있는 게시판 글 내용 보여주기-->

<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php
    
    $post_pid = $_POST["post_pid"];
    $icon;
    $user_pid;
    // db Board를 위한 쿼리를 생성한다.
    $statement = mysqli_prepare($con, "SELECT * FROM Board WHERE post_pid = '".$post_pid."'");
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $post_pid, $user_pid, $nickname, $title, $contents, $date_time, $rep_count);

    $response = array();
    $response["success"] = true;

    $sql = mq("SELECT * FROM Board WHERE post_pid = '".$post_pid."'");

    while($row = mysqli_fetch_array($sql)){
        $user_pid = $row["user_pid"];
    }
    
    $sql = mq("SELECT * FROM Comments WHERE post_pid ='".$post_pid."'");
    $rep_count = mysqli_num_rows($sql);
    
    // db 내용을 파라미터와 패치시킨다.
    while(mysqli_stmt_fetch($statement)) {
 
        $response["success"] = true;
        $response["nickname"] = $nickname;
        $response["title"] = $title;
        $response["contents"] = $contents;
        $response["date_time"] = $date_time;
        $response["rep_count"] = $rep_count;
        $response["user_pid"] = $user_pid;
        
        $stmt = mysqli_prepare($con, "SELECT icon FROM User_Info WHERE user_pid = '".$user_pid."'");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $icon);
        while(mysqli_stmt_fetch($stmt)){
          $response["icon"] = $icon;    
       }
    }

    echo json_encode($response);
?>
