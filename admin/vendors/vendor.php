
<?php
	//include connection file 
	include_once("../../connection.php");
	
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	$action = isset($params['action']) != '' ? $params['action'] : '';

	$vendorCls = new Vendors($connString);

	switch($action) {
	 case 'edit':
		$vendorCls->updateVendor($params);
	 break;
	 case 'search':
		$vendorCls->getVendors($params);
	 break;
	 default:
		$vendorCls->getVendors($params);
	 return;
	}
	
class Vendors {
	protected $conn;
	protected $data = array();
	//public isExist = 0;
	function __construct($connString) {
		$this->conn = $connString;
		session_start();
	}
	
	public function getVendors($params) {
		
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
	   	   	
		$sql = "select *, product_count from vendor left join (select vendor.vendorid, count(*) as product_count  from vendor_products left join vendor using(vendorid) group by (vendor_products.vendorid)) as temp using(vendorid)".$where;
		$queryRecords = mysqli_query($this->conn, $sql) or die("error to fetch employees data");
		while( $row = mysqli_fetch_assoc($queryRecords) ) { 
			$data[] = $row;
		}
		$json_data = array(
			"rows"            => $data   // total data array
			);
		
		return $json_data;
	}	
	
	function updateVendor($params) {
		$data = array();
		date_default_timezone_set('America/New York');
		$date = date('Y-m-d h:i:s a', time());
		$sql = "Update `vendor` set hq_comments='" . $params["edit_comments"]."', hq_status='" . $params["edit_status"]."', hq_approve_date='".$date."'  WHERE vendorid = '".$params["edit_vendorid"]."'";
		//}		
		echo $result = mysqli_query($this->conn, $sql) or die("error to update owner data");
	}
	

}
?>
	