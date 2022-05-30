<?php
	$mysqli=new mysqli('localhost','root','','theaters');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method == 'GET'){
		$a=array();
		
		if ($_GET['id']==1){
			
			$text="select * from theate where tItle like '%".$_GET['tItle']."%'";
			$result=$mysqli->query($text);
			while ($row = mysqli_fetch_assoc($result))
			{
				$b=array("tItle"=>$row['tItle'],"address"=>$row['address']);
				$a[]=$b;
       
			}
			echo json_encode($a);
		}
    if ($_GET['id']==2){
      $text="select * from performance where tItle like '%".$_GET['tItle']."%'";
    $result=$mysqli->query($text);
    while ($row = mysqli_fetch_assoc($result))
	{
      $b=array("tItle"=>$row['tItle']);
      $a[]=$b;
    }
    echo json_encode($a);
     
    }		
		if ($_GET['id']==3)
		{
			
			$text="select * from theate";
		
			$result=$mysqli->query($text);
			while ($row = mysqli_fetch_assoc($result))
			{
				$b=array("tItle"=>$row['tItle'],"id"=>$row['ID']);
				$a[]=$b;
			}
		}

		echo json_encode($a);
	};
	if ($method == 'POST'){
		
		if ($_POST['id']==1){
			$text="INSERT INTO `theate`(`tItle`, `address`) VALUES ('".$_POST['tItle']."','".$_POST['address']."')";
			$result=$mysqli->query($text);
			echo $result;
		}
		if ($_POST['id']==2){
			$text="INSERT INTO `performance`(`tItle`) VALUES ('".$_POST['tItle']."')";
			$result=$mysqli->query($text);
			echo $result;
		}
		if ($_POST['id']==3)
		{
			$text="INSERT INTO `theater_performance`(`ID_theater`, `ID_performance`) VALUES (".$_POST['ID_theater'].",".$_POST['ID_performance'].")";
			$result=$mysqli->query($text);
			echo $result;
		}
		
	};
?>