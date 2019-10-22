
<?php
	//include connection file 
	include_once("../connection.php");
	
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$ownerCls = new Owners($connString);

	switch($action) {
	 case 'add':
		$ownerCls->insertOwner($params);
	 break;
	 case 'edit':
		$ownerCls->updateOwner($params);
	 break;
	 case 'delete':
		$ownerCls->deleteOwner($params);
	 break;
	 default:
		$ownerCls->getOwners($params);
	 return;
	}
	
class Owners {
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
			$where .=" ( owner_name LIKE '".$params['searchPhrase']."%' ";   
			$where .=" OR owner_address LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT * FROM `vendor_owner` ";
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
	
	function insertOwner($params) {
		//if($this->checkExist($params) == "true"){
		//	echo 0;
		//	return;
		//}else{
			$sql = "INSERT INTO `vendor_owner` (owner_name, owner_pct, owner_address, notes, vendorid) VALUES('" . $params["add_ownername"] . "', '" . $params["add_ownerpct"] . "','" . $params["add_owneraddress"] . "','" . $params["add_notes"] . "','". $_SESSION["vendorid"]."');  ";
		//}		
		
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to insert owner data");
		//}
		
	}
	
	function updateOwner($params) {
		$data = array();
		//if($this->checkExist($params) == "true"){
		//	echo 0;
		//	return;
		//}else{
		$sql = "Update `vendor_owner` set owner_name='" . $params["edit_ownername"]."', owner_address='" . $params["edit_owneraddress"]."', owner_pct='" . $params["edit_ownerpct"]."' WHERE id = '".$params["edit_id"]."'";
		//}		
		echo $result = mysqli_query($this->conn, $sql) or die("error to update owner data");
	}
	
	function deleteOwner($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `vendor_owner` WHERE id='".$params["id"]."'";
		
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
	