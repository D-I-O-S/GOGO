<!--Board 데이터 베이스의 내용 삭제-->
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php";
    
    $bno = $_POST['post_pid'];

    $comsql = mq("DELETE FROM Comments WHERE post_pid= '".$bno."'");
	$sql = mq("DELETE FROM Board WHERE post_pid= '".$bno."'");
 
    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>
