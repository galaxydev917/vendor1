
<?php
	//include connection file 
	include_once("../connection.php");
	$db = new dbObj();
	$connString =  $db->getConnstring();

	//$params = $_REQUEST;
	
	$action = $_POST['action'];
	//echo $last_name;
	$businessCls = new Business($connString);
	$businessCls->updateRef($_POST);

	
class Business {
	protected $conn;
	protected $data = array();
	
	function __construct($connString) {
		session_start();
		$this->conn = $connString;
		
	}
	function updateRef($params) {
		$vendorid = $_SESSION["vendorid"];
		
		$sql = "UPDATE vendor SET client1_business = '".$params['client1_business']."', client1_poc = '".$params['client1_poc']."', client1_address = '".$params['client1_address'].
		        "', client1_phone = '".$params['client1_phone']."', client1_email = '".$params['client1_email']."', client2_business = '".$params['client2_business'].
				"', client2_poc = '".$params['client2_poc']."', client2_address = '".$params['client2_address']."', client2_phone = '".$params['client2_phone']."', client2_email = '".$params['client2_email'].
				"', client3_business = '".$params['client3_business']."', client3_poc = '".$params['client3_poc']."', client3_address = '".$params['client3_address'].
				"', client3_phone = '".$params['client3_phone']."', client3_email = '".$params['client3_email']."' WHERE vendorid = '".$vendorid."'";
			
		 $result = mysqli_query($this->conn, $sql) or die("error to update vendor data");	
		 
		 //update session variables
		$_SESSION["client1_business"] = $params['client1_business'];
		$_SESSION["client1_poc"] = $params['client1_poc'];
		$_SESSION["client1_address"] = $params['client1_address'];
		$_SESSION["client1_phone"] = $params['client1_phone'];
		$_SESSION["client1_email"] = $params['client1_email'];
		$_SESSION["client2_business"] = $params['client2_business'];
		$_SESSION["client2_poc"] = $params['client2_poc'];
		$_SESSION["client2_address"] = $params['client2_address'];
		$_SESSION["client2_phone"] = $params['client2_phone'];
		$_SESSION["client2_email"] = $params['client2_email'];
		$_SESSION["client3_business"] = $params['client3_business'];
		$_SESSION["client3_poc"] = $params['client3_poc'];
		$_SESSION["client3_address"] = $params['client3_address'];
		$_SESSION["client3_phone"] = $params['client3_phone'];
		$_SESSION["client3_email"] = $params['client3_email'];

		 echo $result;
	}

}

?>
	