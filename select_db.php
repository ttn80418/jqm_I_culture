<?php
header("Access-Control-Allow-Origin:*");//允許別台主機來接收資料 *:全部 
	require_once("dbtools.inc.php");

	$link = creat_connect();

	// $sql = "SELECT book_id, image_name, description FROM product";//學校用

	$sql = "SELECT Event_Image, Event_Date, Event_Title FROM Event";
	//家用
	$result = execute_sql($link, "id7769569_event", $sql);

	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		$myArray=array();
		do{
			$myArray[]=$row;//運用陣列方式抓取全部資料內容
		}while($row=mysqli_fetch_assoc($result));
		echo json_encode($myArray);//encode為解碼 
		// echo $row["book_id"].$row["image_name"].$row["description"];
		// echo json_encode(array("book_id" => $row["book_id"], "image_name" => $row["image_name"], "description" => $row["description"]));//只抓一筆資料
		
	}else {
		echo "查無資料";
	}



?>