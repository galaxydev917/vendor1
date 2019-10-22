
<?php
	//include connection file 
	include_once("../../../connection.php");
	
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$agreeCls = new Agreement($connString);
	switch($action) {
		 case 'signed':
			$agreeCls->getSignedDate($params);
		 break;
		 case 'load':
			$agreeCls->getLoadData();
		 break;
		 case 'save':
			$agreeCls->updateRegNum($params);
		 break;
	}	
	
class Agreement {
	protected $conn;
	protected $data = array();
	public $agree_signdate;
	//public isExist = 0;
	function __construct($connString) {
		$this->conn = $connString;
		session_start();
	}
	function getSignedDate($params) {
		date_default_timezone_set('America/Los_Angeles');
		$signed_date = date('Y-m-d h:i:s a', time());
		
/*		$date = new DateTime($signed_date);
		$date->setTimeZone(new DateTimeZone('America/Los_Angeles'));

		$signed_timestamp = $date->getTimestamp();*/
		$sql = "Update `vendor` set signed_date='" . $signed_date."', signed=1 WHERE vendorid = '".$params["vendorid"]."' ";
		//}	
	//	echo $sql;	
		$result = mysqli_query($this->conn, $sql) or die("error to update owner data");
		$this->agree_signdate = $signed_date;
		echo $signed_date;
	}
	function getLoadData() {
		$sql = "select vendorid, signed, signed_date from vendor where vendorid = '".$params["vendorid"]."' LIMIT 1";
		$queryRecords = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($queryRecords);
		if($row['vendorid'] != NULL){
			echo $row['signed_date'];
		}else
			echo "unsigned";

	}
	function updateRegNum($params) {
		$data = array();
		$sql = "Update `vendor` set reg_receipt='" . $params["receipt_number"]."' WHERE vendorid = '".$params["vendorid"]."'";
		$result = mysqli_query($this->conn, $sql) or die("error to update owner data");
		
		$sql = "select vendorid, signed, signed_date from vendor where vendorid = '".$params["vendorid"]."' LIMIT 1";
		$queryRecords = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($queryRecords);
		if($row['vendorid'] != NULL){
			echo $row['signed_date'];
		}else
			echo "unsigned";
	}
}	
	/*switch($action) {
	 case 'add':
		$officerCls->insertOfficer($params);
	 break;
	 case 'edit':
		$officerCls->updateOfficer($params);
	 break;
	 case 'delete':
		$officerCls->deleteOfficer($params);
	 break;
	 default:
		$officerCls->getOwners($params);
	 return;
	}
	
class Agreement {
	protected $conn;
	protected $data = array();
	//public isExist = 0;
	function __construct($connString) {
		$this->conn = $connString;
		session_start();
	}
	
	public function getOwners($params) {
		
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
			$where .=" ( officer_name LIKE '".$params['searchPhrase']."%' ";   
			$where .=" OR owner_position LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT * FROM `vendor_officer` ";
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
	
	function insertOfficer($params) {
		//if($this->checkExist($params) == "true"){
		//	echo 0;
		//	return;
		//}else{
			$sql = "INSERT INTO `vendor_officer` (officer_name, owner_position, vendorid) VALUES('" . $params["add_officername"] . "', '" . $params["add_ownerposition"] .  "','" . $_SESSION["vendorid"]."');  ";
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
		$sql = "Update `vendor_officer` set officer_name='" . $params["edit_officername"]."', owner_position='" . $params["edit_ownerposition"]."' WHERE id = '".$params["edit_officerid"]."'";
		//}		

		echo $result = mysqli_query($this->conn, $sql) or die("error to update owner data");
	}
	
	function deleteOfficer($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `vendor_officer` WHERE id='".$params["id"]."'";
		
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

}*/
?>
	