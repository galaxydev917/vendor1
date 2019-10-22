
<?php
	//include connection file 
	include_once("../../connection.php");
	
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$productCls = new Product($connString);
	switch($action) {
	 case 'add':
		$productCls->insertProduct($params);
	 break;
	 case 'edit':
		$productCls->updateProduct($params);
	 break;
	case 'delete':
		$productCls->deleteProduct($params);
	 break;
	 default:
		$productCls->getProducts($params);
	 return;
	}
	
class Product {
	protected $conn;
	protected $data = array();
	//public isExist = 0;
	function __construct($connString) {
		$this->conn = $connString;
		session_start();
	}
	function insertProduct($params) {
		
		//if($this->checkExist($params) == "true"){
		//	echo 0;
		//	return;
		//}else{
			
		$filename = isset($_FILES['file']["name"]) != '' ? $_FILES['file']["name"] : '';
		
/*		if( $filename != '' ){
			$hash_var = microtime(true);
            $file_ext = substr($_FILES['uploadFile']["name"], strrpos($_FILES['uploadFile']["name"], '.') + 1);
            $filename = $hash_var.'.'.$file_ext;
		}	*/
		$sql = "INSERT INTO `vendor_products` (product_name, product_code, product_desc,  links_logo, photofile, vendorid) VALUES('" . $params["product_name"] . "', '" . $params["product_code"] . "','" . $params["product_desc"] . "','" . $params['links_logo']. 
													"','" . $filename."', '". $params["vendorid"]."');";
		//}		
		//echo $sql;
		echo $result = mysqli_query($this->conn, $sql) or die("error to insert owner data");
		//}
		
	}
	public function getProducts($params) {
		
		$this->data = $this->getRecords($params);
		
		echo json_encode($this->data);
	}
	function getRecords($params) {
		$where = "";
	    if( !empty($params['searchParam']) ) {  
			$where .=" WHERE  vendor.vendorid = '".$params['searchParam']."'";
		}
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT vendor_products.*,  vendor.first_name, vendor.last_name FROM vendor_products left join vendor using(vendorid)".$where;;

		$queryRecords = mysqli_query($this->conn, $sql) or die("error to fetch employees data");
		
		while( $row = mysqli_fetch_assoc($queryRecords) ) { 
			$data[] = $row;
		}

		$json_data = array(
			"rows"            => $data   // total data array
			);
		
		return $json_data;
	}
	function updateProduct($params) {
		date_default_timezone_set('America/Los_Angeles');
		$date = date('Y-m-d h:i:s a', time());

		$data = array();
		$sql = "Update `vendor_products` set hq_status='" . $params["hq_status"]."', hq_comments='" . $params["hq_comments"]."',  hq_approve_date = '".$date."' WHERE id = '".$params["edit_id"]."'";
		//echo $sql;		
		echo $result = mysqli_query($this->conn, $sql) or die("error to update owner data");
	}
	function deleteProduct($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `vendor_products` WHERE id='".$params["id"]."'";
		
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

	}*/	

}
?>
	