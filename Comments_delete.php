<!--댓글 삭제-->
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php";
    
    $bno = $_POST['comments_pid'];
	$sql = mq("DELETE FROM Comments WHERE comments_pid ='".$bno."'");
    
    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>
