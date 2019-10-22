
<?php
	//include connection file 
	include_once("../connection.php");
	
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$salesCls = new Sales($connString);

	switch($action) {
	 case 'add':
		$salesCls->insertSales($params);
	 break;
	 case 'edit':
		$salesCls->updateOfficer($params);
	 break;
	 case 'delete':
		$salesCls->deleteOfficer($params);
	 break;
	 default:
		$salesCls->getSales($params);
	 return;
	}
	
class Sales {
	protected $conn;
	protected $data = array();
	//public isExist = 0;
	function __construct($connString) {
		$this->conn = $connString;
		session_start();
	}
	
	public function getSales($params) {
		
		$this->data = $this->getRecords($params);
		
		echo json_encode($this->data);
	}
	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
		
		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };  
        $start_from = ($page-1) * $rp;
		
		$sql = $sqlRec = $sqlTot = $where = '';
		
		if( !empty($params['searchPhrase']) ) {   
			$where .=" WHERE ";
			$where .="sales_year LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT * FROM `vendor_sales` ";
		$sqlTot .= $sql;
		$sqlRec .= $sql;
		
		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;
		
		
		$qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot employees data");
		$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");
		
		while( $row = mysqli_fetch_assoc($queryRecords) ) { 
			$data[] = $row;
		}

		$json_data = array(
			"current"            => intval($params['current']), 
			"rowCount"            => 10, 			
			"total"    => intval($qtot->num_rows),
			"rows"            => $data   // total data array
			);
		
		return $json_data;
	}	
	
	function insertSales($params) {
		//if($this->checkExist($params) == "true"){
		//	echo 0;
		//	return;
		//}else{
			$sql = "INSERT INTO `vendor_sales` (sales_year, gross, income, vendorid) VALUES('" . $params["add_salesyear"] . "', '" . $params["add_salesgross"] .  "', '".$params["add_salesincome"]."', '" . $_SESSION["vendorid"]."');  ";
		//}		
		
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to insert owner data");
		//}
		
	}
	
	function updateOfficer($params) {
		$data = array();
		//if($this->checkExist($params) == "true"){
		//	echo 0;
		//	return;
		//}else{
		$sql = "Update `vendor_sales` set sales_year='" . $params["edit_salesyear"]."', gross='" . $params["edit_salesgross"]."', income='" .$params["edit_salesincome"]."'  WHERE id = '".$params["edit_salesid"]."'";
		//}		

		echo $result = mysqli_query($this->conn, $sql) or die("error to update owner data");
	}
	
	function deleteOfficer($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `vendor_sales` WHERE id='".$params["id"]."'";
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to delete owner data");
	}	
	/*
	function checkExist($params) {
		
		$sql = $where = '';
		if( !empty($params['action']))
			$action = $params['action'];
		
		if( !empty($params[$action.'_email']) ) {   
			$where .=" WHERE ";
			$where .=" email = '".$params[$action.'_email']."'";
	   }

	   // getting total number records without any search
		$sql = "SELECT * FROM `users` ";
		
		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sql .= $where;
		}
		$queryRecords = mysqli_query($this->conn, $sql) or die($sql);
		
		$row = mysqli_fetch_assoc($queryRecords);
		if(count($row) > 0) return "true";
		else return "false";

	}	
*/
}
?>
	