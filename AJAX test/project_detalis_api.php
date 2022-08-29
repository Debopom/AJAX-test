<?php
    session_start();
    $project_id = $_GET['id'];
	
	$status = 'OK';
	$content = [];

    include_once 'dbconnect.php';

    $sql1 = "SELECT p.*,g.group_name,g.group_category FROM projects AS p JOIN groups AS g on (p.group_id=g.group_id) WHERE project_id = $project_id GROUP BY p.project_id";
    $rs1 = $conn-> query($sql1);
    $result = $rs1->fetch_array();

    
    $sql = "SELECT * FROM updates WHERE project_id = $project_id";
    $rs = $conn-> query($sql);

    while ($row = mysqli_fetch_assoc($rs)) {
		$content[] = $row;
	}
	

	$data = ["status" => $status, "content" => $content];
    //header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	echo json_encode($data);
    
    
?>