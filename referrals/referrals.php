
<?php
	//include connection file 
	include_once("../connection.php");
	
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$officerCls = new Officers($connString);

	switch($action) {
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
	
class Officers {
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
		$sql = "SELECT * FROM `vendor_refs` ";
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
			$sql = "INSERT INTO `vendor_refs` (poc_title, poc_address, poc_phone, poc_fax, client, poc_name, poc_email, vendorid) VALUES('" . $params["add_clienttitle"] . "','" . $params["add_clientaddress"] . "','" . $params["add_clientphone"] . "','" . $params["add_clientfax"] . "','" . $params["add_clientname"] . "', '" . $params["add_contactname"] .  "','".$params["add_contactemail"]. "', '" . $_SESSION["vendorid"]."');  ";
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
		$sql = "Update `vendor_refs` set poc_title='" . $params["edit_clienttitle"]."', poc_address='" . $params["edit_clientaddress"]."', poc_phone='" . $params["edit_clientphone"]."', poc_fax='" . $params["edit_clientfax"]."', client='" . $params["edit_clientname"]."', poc_name='" . $params["edit_contactname"]."', poc_address='" . $params["edit_contactemail"]."' WHERE id = '".$params["edit_referralsid"]."'";
		//}		

		echo $result = mysqli_query($this->conn, $sql) or die("error to update owner data");
	}
	
	function deleteOfficer($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `vendor_refs` WHERE id='".$params["id"]."'";
		
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
	