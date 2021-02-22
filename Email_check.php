<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>
<?php 

    $email = $_POST["email"]; 
   
    $statement = mysqli_prepare($con, "SELECT email FROM User_Info WHERE email = ?"); 
    
     mysqli_stmt_bind_param($statement, "s", $email); 
     mysqli_stmt_execute($statement); 
     mysqli_stmt_store_result($statement);//결과를 클라이언트에 저장함 
     mysqli_stmt_bind_result($statement, $email);//결과를 $userID에 바인딩함 
     
     $response = array(); 
     $response["success"] = true; 

     while(mysqli_stmt_fetch($statement)){ 
         $response["success"] = false;//회원가입불가를 나타냄 
         $response["email"] = $email; 
     } //데이터베이스 작업이 성공 혹은 실패한것을 알려줌 

     echo json_encode($response); 

 ?> 