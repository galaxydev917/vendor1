
<?php
	//include connection file 
	include_once("../connection.php");
	
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	/*if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], '../products/' . $_FILES['file']['name']);
    }	
	echo $_FILES['file']['name'];*/
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
		
		if(!empty($_FILES))
		{
			if (!file_exists('../products/'.$_SESSION["vendorid"])){ 	
				mkdir('../products/'.$_SESSION["vendorid"], 0755, true);	
			}
				

			if(is_uploaded_file($_FILES['file']['tmp_name']))
			{
				$filename = isset($_FILES['file']["name"]) != '' ? $_FILES['file']["name"] : '';
				$result = move_uploaded_file($_FILES['file']['tmp_name'], '../products/'.$_SESSION["vendorid"].'/'. $filename);
			}
		}
			
		$filename = isset($_FILES['file']["name"]) != '' ? $_FILES['file']["name"] : '';
		
/*		if( $filename != '' ){
			$hash_var = microtime(true);
            $file_ext = substr($_FILES['uploadFile']["name"], strrpos($_FILES['uploadFile']["name"], '.') + 1);
            $filename = $hash_var.'.'.$file_ext;
		}	*/
		$sql = "INSERT INTO `vendor_products` (product_name, product_code, product_desc,  links_logo, photofile, vendorid) VALUES('" . $params["product_name"] . "', '" . $params["product_code"] . "','" . $params["product_desc"] . "','" . $params['links_logo']. 
													"','" . $filename."', '". $_SESSION["vendorid"]."');  ";
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
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
		
		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };  
        $start_from = ($page-1) * $rp;
		
		$sql = $sqlRec = $sqlTot = $where = '';
		$where .=" WHERE vendorid = '".$_SESSION["vendorid"]."'";
		if( !empty($params['searchPhrase']) ) {   
			
			$where .=" AND ( product_name LIKE '".$params['searchPhrase']."%' ";   
			$where .=" OR hq_status LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT * FROM `vendor_products` ";
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
	function updateProduct($params) {
		$data = array();
		if(!empty($_FILES))
		{
			if (!file_exists('../products/'.$_SESSION["vendorid"])) 	{
				mkdir('../products/'.$_SESSION["vendorid"], 0755, true);	
				echo "aaaaaa";
			}
			if(is_uploaded_file($_FILES['file']['tmp_name']))
			{
				$filename = isset($_FILES['file']["name"]) != '' ? $_FILES['file']["name"] : '';
				
				$result = move_uploaded_file($_FILES['file']['tmp_name'], '../products/'.$_SESSION["vendorid"].'/'. $filename);
			}
		}
		$filename = isset($_FILES['file']["name"]) != '' ? $_FILES['file']["name"] : '';	
		$sql = "Update `vendor_products` set product_name='" . $params["product_name"]."', product_desc='" . $params["product_desc"]."', photofile='" . $filename."' WHERE id = '".$params["edit_id"]."'";
		//echo $sql;
		//}		
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
	