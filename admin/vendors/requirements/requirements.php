
<?php
	//include connection file 
	include_once("../connection.php");
	$db = new dbObj();
	$connString =  $db->getConnstring();

	//$params = $_REQUEST;
	
	$action = $_POST['action'];
	//echo $last_name;
	$businessCls = new Business($connString);
	$businessCls->updateVendor($_POST);

	
class Business {
	protected $conn;
	protected $data = array();
	
	function __construct($connString) {
		session_start();
		$this->conn = $connString;
		
	}
	function updateVendor($params) {
		$vendorid = $_SESSION["vendorid"];
		
		$sql = "UPDATE vendor SET principal_title = '".$params['principal_title']."', last_name = '".$params['last_name']."', first_name = '".$params['first_name']."', business_name = '".$params['business_name']."', address = '".$params['address']."', city = '".$params['city'].
				"', state = '".$params['state']."', zip = '".$params['zip']."', pword = '".$params['pword']."', phone = '".$params['phone'].
				"', fax = '".$params['fax']."', website = '".$params['website']."' WHERE vendorid = '".$vendorid."'";
			
		 $result = mysqli_query($this->conn, $sql) or die("error to update vendor data");	
		 
		 //update session variables
		$_SESSION["pword"] = $params['pword'];
		$_SESSION["first_name"] = $params['first_name'];
		$_SESSION["last_name"] = $params['last_name'];
		$_SESSION["business_name"] = $params['business_name'];
		$_SESSION["address"] = $params['address'];
		$_SESSION["city"] = $params['city'];
		$_SESSION["state"] = $params['state'];
		$_SESSION["zip"] = $params['zip'];
		$_SESSION["phone"] = $params['phone'];
		$_SESSION["fax"] = $params['fax'];
		$_SESSION["website"] = $params['website'];
		$_SESSION["principal_title"] = $params['principal_title'];

		 echo $result;
	}

}

?>
	